<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PjpPersonilheaderIKAJ extends Model
{
    use HasFactory;
    protected $connection = 'mysql3IKAM';
    protected $table = "pjppersonilheader";
    protected $primaryKey = 'nobukti';

}
