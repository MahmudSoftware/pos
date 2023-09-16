<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Center extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'centers';

    protected $dates = ['deleted_at'];

    protected $fillable = ['office_id','code', 'name', 'status', 'address','cart_price'];
}
