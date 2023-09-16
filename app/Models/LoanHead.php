<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LoanHead extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    protected $table = 'loan_heads';

    protected $dates = ['deleted_at'];

}
