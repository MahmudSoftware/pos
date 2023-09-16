<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purjee extends Model
{
    use HasFactory;
    protected $table = 'purjees';
    protected $guarded = [];
    public function farmer(){
        return $this->belongsTo(Farmer::class, 'grower_id','id');
    }
    public function rel_to_center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function rel_to_unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    public function rel_to_mis()
    {
        return $this->belongsTo(MisReport::class, 'id');
    }
}
