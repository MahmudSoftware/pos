<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depertment extends Model
{
    use HasFactory;
    protected $table = 'depertments';
    protected $fillable = ['code', 'name','office_id','description', 'status'];
}
