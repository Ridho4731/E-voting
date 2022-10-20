<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kelas',
        '',
        'foto',
        'visi',
        'misi',
    ];

}
