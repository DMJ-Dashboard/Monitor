<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanDetail extends Model
{
    use HasFactory;
    protected $connection = 'mysql3';
    protected $table = "tagihandetail";
}
class TagihanDetaillokal extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = "tagihandetail";
}
