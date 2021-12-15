<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'adresse',
        'clients_id',
        'admin_id',
        'artisans_id',
        'start',
        'end',
        'status'
    ];
}
