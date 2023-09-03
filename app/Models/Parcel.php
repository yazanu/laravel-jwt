<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'parcel_code', 'parcel_type', 'deli_type', 'from_branch_id', 'receiver_name', 'receiver_phone_no', 'receiver_address', 'deli_fee'];
}
