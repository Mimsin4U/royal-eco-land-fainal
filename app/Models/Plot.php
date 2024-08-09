<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    public function plotImages()
    {
        return $this->hasMany(PlotImage::class);
    }

    public function plotCategory()
    {
        return $this->belongsTo(PlotCategory::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function plotType()
    {
        return $this->belongsTo(PlotType::class);
    }
}
