<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistantSalesManeger extends Model
{
    use HasFactory;

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function jointDirector()
    {
        return $this->belongsTo(JointDirector::class);
    }

    public function seniorManeger()
    {
        return $this->belongsTo(SeniorManeger::class);
    }
}
