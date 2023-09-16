<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearSetup extends Model
{
    use HasFactory;

    protected $table = 'year_setups';

    protected $fillable = ['code', 'name', 'start_date', 'end_date'];

}
