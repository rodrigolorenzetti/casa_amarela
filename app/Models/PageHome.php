<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageHome extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'page_home';
}
