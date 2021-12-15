<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameRS',
        'adresse',
        'siren',
        'email',
        'tel',
        'comment'  
    ];
}
