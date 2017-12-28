<?php

namespace App\Http\Controllers;

use App\HistoryStok;
use App\Distribution;
use Illuminate\Http\Request;
use Log;
use App\Agent;

class SpkController extends Controller
{
    protected  $historystok;
    protected  $distribusi;

    function __construct()
    {
        $this->historystok = new HistoryStok();
        $this->distribusi = new Distribution();
    }

    function saranDistribusi()
    {
        $agent = Agent::pluck('name','id');
        return view('spk.analisa',compact('agent'));
    }

    public function spk()
    {
        $historystok = $this->historystok->all();
        $distribusi = $this->distribusi->all();
        $max = 0;
        $hasilColumn;
        for ($i=0; $i < count($historystok); $i++) { 
            for ($j=0; $j < count($distribusi); $j++) { 
                $rataRow = 0;

                if ($distribusi[$j]->qty - $historystok[$i]->stok == 0 ) {
                    $hasilColumn[$i][$j] = ($historystok[$i]->stok * 2000) - (($distribusi[$j]->qty - $historystok[$i]->stok)*2000);
                    $rataRow = $rataRow + $hasilColumn[$i][$j];                                
                }elseif ($historystok[$i]->stok - $distribusi[$j]->qty < 0) {
                        $hasilColumn[$i][$j] = ($historystok[$i]->stok * 2000) - (($distribusi[$j]->qty - $historystok[$i]->stok)*2000);
                        $rataRow = $rataRow + $hasilColumn[$i][$j];
                }else{
                    $hasilColumn[$i][$j] = ($historystok[$i]->stok * 2000) - (($distribusi[$j]->qty - $historystok[$i]->stok)*2000);
                    $rataRow = $rataRow + $hasilColumn[$i][$j];

                }
                $avg = $rataRow / count($distribusi);            
                if ($max < $avg) {
                    $max = $avg;
                }
            }
        }
        return $hasilColumn;
        return view('spk.spk',compact('distribusi','historystok','hasilColumn'));
    }
}
