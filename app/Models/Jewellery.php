<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jewellery extends Model
{
    use HasFactory;
    protected $table = 'jewellery';

    protected $fillable = [
        'report_number',
        'type',
        'gross_wt',
        'gold_wt',
        'dia_wt',
        'shape_cut',
        'clarity',
        'color',
        'finish',
        'image',
        'description',
    ];
}
