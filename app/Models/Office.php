<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'offices';

    protected $dates = ['deleted_at'];
    protected $fillable = ['code','prefix','name','mill_name_bn','email','phone', 'logo', 'status','type', 'address','address_bn','description'];
}
