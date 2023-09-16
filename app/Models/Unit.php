<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = ['office_id','center_id','center_nm','name', 'status', 'cic_name', 'cic_number', 'cda_name', 'cda_number'];

    public function rel_to_center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }
    public function rel_to_farmer()
    {
        return $this->hasMany(Farmer::class, 'unit_id','id');
    }
    public function rel_to_final_gazzert_list()
    {
        return $this->hasMany(FinalGazetteList::class, 'unit_id','id');
    }
}
