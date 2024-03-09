<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rudraksha extends Model
{
    use HasFactory;

    protected $table = 'rudraksha';

    protected $fillable = [
        'report_number',
        'type',
        'weight',
        'dimension',
        'color',
        'shape',
        'natural_face',
        'artificial_face',
        'test',
        'origin',
        'image',
        'comments',
    ];
    
}
