<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrangersEmail extends Model
{
    use HasFactory;

    protected $fillable=[
        'email',
    ];
}
