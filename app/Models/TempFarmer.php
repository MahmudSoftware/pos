<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempFarmer extends Model
{
    use HasFactory;

    protected $table = 'temp_farmers';

    protected $fillable = ['office_name', 'season_name', 'center_name', 'center_address', 'unit_number', 'cic_name', 'cic_number', 'cda_name', 'cda_number', 'pb_number', 'farmer_name', 'farmer_name_bn', 'farmer_father_name', 'farmer_father_name_bn', 'village', 'village_bn', 'nid', 'mobile', 'total_amount_cane', 'total_amount_cane_supplied', 'total_amount_sugar_cane_supplied', 'investade_loan_amount', 'status', 'remain_loan', 'remain_cart' ];

}
