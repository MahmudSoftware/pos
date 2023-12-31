<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

class generate_code
{
    public function code($tableName)
    {
        $nameArr = explode("_",$tableName);
        $prefix = '';
        foreach($nameArr as $key=> $name)
        {
            $prefix = $prefix . strtoupper(substr($name,0,3));

            if($key < count($nameArr) - 1){
                $prefix = $prefix . '_';
            }
        }
        $lastRecord = DB::table($tableName)->orderBy('id', 'DESC')->first();

        $last_id = '';

        if (isset($lastRecord)){
            $last_id = $lastRecord->id;
        }else{
            $last_id = 1;
        }

        $code = $prefix . '-' . $last_id + 1;

        return $code;
    }

    public function prefix($tableName)
    {
        $nameArr = explode("_", $tableName);
        $prefix = '';
        foreach ($nameArr as $key => $name) {
            $prefix = $prefix . strtoupper(substr($name, 0, 3));

            if ($key < count($nameArr) - 1) {
                $prefix = $prefix . '_';
            }
        }
        return $prefix;
    }
}
