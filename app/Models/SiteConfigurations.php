<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfigurations extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'site_configurations';
}
