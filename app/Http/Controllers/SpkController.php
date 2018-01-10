<?php

namespace App\Http\Controllers;

use App\HistoryStok;
use App\Distribution;
use App\Product;
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

    function index()
    {
        $agents = Agent::all();        
        return view('spk.index',compact('agents'));
    }

    function saranDistribusi()
    {
        $agent = Agent::pluck('name','id');
        return view('spk.analisa',compact('agent'));
    }

    public function spk($id)
    {
        $untung = 2000; 
        $produk = Product::where('name','ayam')->get();
        $historystok = $this->historystok->limit(4)->get();
        $distribusi = $this->distribusi->where('agent_id',$id)->limit(4)->get();
        $max = 0;
        $hasilColumn;
        for ($i=0; $i < count($historystok); $i++) { 
            $rataRow = 0;
            for ($j=0; $j < count($distribusi); $j++) { 

                if ( $historystok[$i]->stok <= $distribusi[$j]->qty  ) {
                    $hasilColumn[$i][$j] = ($historystok[$i]->stok * $untung) - (($distribusi[$j]->qty - $historystok[$i]->stok)*$untung);
                    $rataRow = $rataRow + $hasilColumn[$i][$j];                                
                }else{
                    $hasilColumn[$i][$j] = ($distribusi[$j]->qty * $untung) - (($historystok[$i]->stok - $distribusi[$j]->qty)*$produk[0]->harga);
                    $rataRow = $rataRow + $hasilColumn[$i][$j];

                }
                $avg[$i] = $rataRow / count($distribusi);            
                if ($max < $avg[$i]) {
                    $max = $avg[$i];
                    $index = $i;
                }
            }
        }
        $data['stok'] = $historystok[$index];
        $data['max'] = $avg;

        return $data;
        //return view('spk.spk',compact('distribusi','historystok','hasilColumn'));
    }
}
