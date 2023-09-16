<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalGazetteList extends Model
{
    use HasFactory;

    public function rel_to_final_unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
