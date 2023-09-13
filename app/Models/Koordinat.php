<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinat extends Model
{
    use HasFactory;

     /**
     * fillable
     *
     * @var array
     */
    protected $table = 'titik_koordinat';
    protected $fillable = [
        'nama_tempat',
        'image',
        'latitude',
        'longitude',
    ];
}
