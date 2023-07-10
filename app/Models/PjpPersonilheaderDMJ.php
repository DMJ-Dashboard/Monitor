<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PjpPersonilheaderDMJ extends Model
{
    use HasFactory;
    protected $connection = 'mysql3';
    protected $table = "pjppersonilheader";
    protected $primaryKey = 'nobukti';
}
