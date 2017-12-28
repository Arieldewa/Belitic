<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryStok extends Model
{
    //
    protected $table = 'history_stoks';
    protected $fillable = ['id_product', 'stok', 'date'];
}
