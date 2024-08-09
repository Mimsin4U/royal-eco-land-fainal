<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    
    public function plotOrder()
    {
        return $this->belongsTo(PlotOrder::class );
    }
}
