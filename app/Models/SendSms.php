<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendSms extends Model
{
    use HasFactory;
    protected $table = 'send_sms';
    protected $fillable = ['center_id', 'unit_id', 'sms_id', 'passbook_number', 'to', 'from',];

    public function rel_to_center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function rel_to_unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

}
