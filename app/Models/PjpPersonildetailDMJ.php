<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PjpPersonildetailDMJ extends Model
{
    use HasFactory;
    protected $connection = 'mysql3';
    protected $table = "pjppersonildetail";
    protected $primaryKey = 'nobukti';
}
