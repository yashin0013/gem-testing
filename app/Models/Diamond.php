<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_number',
        'type',
        'description',
        'shape_cut',
        'dimension',
        'weight',
        'clarity_grade',
        'color_grade',
        'cut_prop',
        'finish',
        'fluoresc',
        'image',
        'comments',
    ];
    
}
