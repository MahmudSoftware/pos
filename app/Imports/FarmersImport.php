<?php

namespace App\Imports;

use App\Models\Center;
use App\Models\Farmer;
use App\Models\TempFarmer;
use App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;

class FarmersImport implements ToModel
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TempFarmer([
            'center_name'                             => $row[1],
            'unit_number'                             => $row[2],
            'pb_number'                               => $row[3],
            'farmer_name'                             => $row[4],
            'farmer_name_bn'                          => $row[5],
            'farmer_father_name'                      => $row[6],
            'farmer_father_name_bn'                   => $row[7],
            'village'                                 => $row[8],
            'village_bn'                              => $row[9],
            'nid'                                     => $row[10],
            'mobile'                                  => $row[11],
            'mb_ststus'                               => $row[12],
            'total_amount_cane'                       => $row[13],
            'total_amount_sugar_cane_supplied_mt'     => $row[14] ? $row[14] : 0,
            'total_amount_cane_supplied'              => $row[15] ? $row[15] : 0,
            'investade_loan_amount'                   => $row[16] ? $row[16] : 0,
            'status'                                  => $row[17] ? 1 : 0,
            'remain_loan'                             => $row[18],
            'remain_cart'                             => $row[19] ? $row[19] : 0,
            'center_address'                          => "test",
            'cic_name'                                => "test",
            'lone_status'                             => "2432",
            'cic_number'                              => "0202",
            'cda_name'                                => "test",
            'cda_number'                              => "3412",
        ]);

        /*return new TempFarmer([
            'center_name'                             => $row[1],
            'center_address'                          => $row[2],
            'unit_number'                             => $row[3],
            'cic_name'                                => $row[4],
            'cic_number'                              => $row[5],
            'cda_name'                                => $row[6],
            'cda_number'                              => $row[7],
            'pb_number'                               => $row[8],
            'farmer_name'                             => $row[9],
            'farmer_name_bn'                          => $row[10],
            'farmer_father_name'                      => $row[11],
            'farmer_father_name_bn'                   => $row[12],
            'village'                                 => $row[13],
            'village_bn'                              => $row[14],
            'nid'                                     => $row[15],
            'mobile'                                  => $row[16],
            'mb_ststus'                               => $row[17],
            'total_amount_cane'                       => $row[18],
            'total_amount_sugar_cane_supplied_mt'     => $row[19] ? $row[19] : 0,
            'total_amount_cane_supplied'              => $row[20] ? $row[20] : 0,
            'investade_loan_amount'                   => $row[21] ? $row[21] : 0,
            'lone_status'                             => $row[22],
            'status'                                  => $row[23] ? 1 : 0,
            'remain_loan'                             => $row[24],
            'remain_cart'                             => $row[25] ? $row[25] : 0,
        ]);*/

        return new Farmer([
            "first_name" => $row[0],
            "last_name" => $row[1],
            "email" => $row[2],
            "number" => $row[3]
        ]);
    }
}
