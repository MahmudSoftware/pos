<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisReport extends Model
{
    use HasFactory;
    protected $table = 'mis_reports';
    protected $guarded = [];
    public function farmer_to_mis(){
        return $this->belongsTo(Farmer::class, 'id');
    }
    public function center_to_mis(){
        return $this->belongsTo(Center::class, 'id');
    }
    public function unit_to_mis(){
        return $this->belongsTo(Unit::class, 'id');
    }
    public function purjee_to_mis(){
        return $this->belongsTo(Purjee::class, 'grower_id');
    }
}
