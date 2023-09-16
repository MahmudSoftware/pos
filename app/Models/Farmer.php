<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;
    protected $table = 'farmers';

    protected $fillable = ['office_id', 'season_id','center_id', 'unit_id', 'code', 'first_name', 'bn_first_name', 'last_name', 'bn_last_name', 'father_name', 'bn_father_name', 'phone', 'pass_book_number', 'nid', 'phone_status', 'status', 'is_loan', 'loan_amount', 'remain_loan', 'invested_loan_amount', 'remain_cart', 'total_cane', 'supplied_cane', 'supplied_cane_cart', 'village'];
    public function rel_to_purjee()
    {
        return $this->hasMany(Farmer::class, 'grower_id','id');
    }
    public function rel_to_center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function rel_to_unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
