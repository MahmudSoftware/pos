<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GazetteList extends Model
{
    use HasFactory;

    protected $table = 'gazette_list';
    protected $fillable = ['unit_id','office_id','grower_id','psl_no','purjee_id','day','generate_date','current_loan','remain_cart'];
}
