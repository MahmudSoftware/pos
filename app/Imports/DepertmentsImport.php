<?php

namespace App\Imports;

use App\Models\Depertment;
use App\Service\generate_code;
use Maatwebsite\Excel\Concerns\ToModel;

class DepertmentsImport implements ToModel
{
    private $code;

    public function  __construct($code)
    {
        $this->code = $code;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Depertment([
            'code'     => $this->code,
            'name'    => $row[0],
            'status'    => $row[1] == 'Active' ? 1 : 0,
            'description' => $row[2],
        ]);
    }
}
