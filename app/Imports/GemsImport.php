<?php

namespace App\Imports;

use App\Models\Gem;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class GemsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(Collection $row)
    {
        Validator::make($row->toArray(), [
            '*.report_number' => 'required',
            '*.weight' => 'required',
            '*.dimension' => 'required',
            '*.color' => 'required',
            '*.shape_cut' => 'required',
            '*.optic_char' => 'required',
            '*.refractive_index' => 'required',
            '*.specific_gravity' => 'required',
            '*.microscope_view' => 'required',
            '*.species' => 'required',
            '*.comments' => 'required',
        ])->validate();

        return new Gem([
            'report_number'     => $row['report_number'],
            'weight'     => $row['weight'],
            'dimension'     => $row['dimension'],
            'color'     => $row['color'],
            'shape_cut'     => $row['shape_cut'],
            'optic_char'     => $row['optic_char'],
            'refractive_index'     => $row['refractive_index'],
            'specific_gravity'     => $row['specific_gravity'],
            'microscope_view'     => $row['microscope_view'],
            'species'     => $row['species'],
            'comments'     => $row['comments'],
            'image'     => "img"
        ]);
    }
}
