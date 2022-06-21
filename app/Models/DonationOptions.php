<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationOptions extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'donation_options';
}
