<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raiva extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    public function zoonose()
    {
        return $this->morphOne(Zoonose::class, 'zoonosable');
    }
}
