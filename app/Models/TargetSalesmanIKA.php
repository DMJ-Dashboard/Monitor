<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetSalesmanIKA extends Model
{
    use HasFactory;
    protected $connection = 'mysql5';
    protected $table = "target";
    public $timestamps = false;
}
