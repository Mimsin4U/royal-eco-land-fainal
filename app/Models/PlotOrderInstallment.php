<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotOrderInstallment extends Model
{
    use HasFactory;
    protected $fillable = ['plot_order_id','amount'];

    public function plotOrder()
    {
        $this->belongsTo(PlotOrder::class);
    }
}
