<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gem extends Model
{
    use HasFactory;

    protected $fillable = [
    'report_number',
    'weight',
    'dimension',
    'color',
    'shape_cut' ,
    'optic_char' ,
    'refractive_index',
    'specific_gravity',
    'microscope_view',
    'species',
    'comments',
    'image'
];

}
