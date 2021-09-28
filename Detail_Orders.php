<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Orders extends Model
{
    protected $table = 'detail_orders';
    public $timestamps = false;
    protected $fillable = ['id_orders','id_product','qty','subtotal'];
}
