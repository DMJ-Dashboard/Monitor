<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PjpPersonilheaderIKAJ extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = "pjppersonilheader";
    protected $primaryKey = 'nobukti';

}
