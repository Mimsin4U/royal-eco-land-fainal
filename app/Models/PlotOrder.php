<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotOrder extends Model
{
    use HasFactory;

    public function installments() {
        return $this->hasMany(PlotOrderInstallment::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }



}
