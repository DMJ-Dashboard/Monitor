<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SomobileheaderIKA extends Model
{
    use HasFactory;
    protected $connection = 'mysql3IKAM';
    protected $table = "somobileheader";

    public function salesmans()
    {
        return $this->belongsTo(Salesman::class);
    }
}
