<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MillYearlySetup extends Model
{
    use HasFactory;
    protected $table = 'mill_yearly_setups';
    protected $guarded = [];

    public function seasonData()
    {
        return $this->belongsTo(YearSetup::class, 'season_id');
    }
    public function officeData()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

}
