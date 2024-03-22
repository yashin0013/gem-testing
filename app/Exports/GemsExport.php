<?php

namespace App\Exports;

use App\Models\Gem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GemsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Gem::select(
            'report_number',
            'name',
            'weight',
            'dimension',
            'color',
            'shape_cut',
            'optic_char',
            'refractive_index',
            'specific_gravity',
            'microscope_view',
            'species',
            'comments',
            'image'
        )->where('id',1)->get();
    }

    public function headings(): array
    {
        return [
            'Report Number',
            'Name',
            'Weight',
            'Dimension',
            'Color',
            'Shape Cut',
            'Optic Char',
            'Refractive Index',
            'Specific Gravity',
            'Microscope View',
            'Species',
            'Comments',
            'Images'
        ];
    }
}
