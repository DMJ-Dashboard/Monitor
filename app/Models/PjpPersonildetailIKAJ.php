<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PjpPersonildetailIKAJ extends Model
{
    use HasFactory;
    protected $connection = 'mysql3IKAM';
    protected $table = "pjppersonildetail";
    protected $primaryKey = 'nobukti';
}
