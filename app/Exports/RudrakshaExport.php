<?php

namespace App\Exports;

use App\Models\Rudraksha;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RudrakshaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Rudraksha::select(
            'report_number',
            'name',
            'weight',
            'dimension',
            'color',
            'shape',
            'natural_face',
            'artificial_face',
            'test',
            'origin',
            'comments',
            'image'
        )->where('id', 1)->get();
    }

    public function headings(): array
    {
        return [
            'Report Number',
            'Name',
            'Weight',
            'Dimension',
            'Color',
            'Shape',
            'Natural Face',
            'Artificial Face',
            'Test',
            'Origin',
            'Comments',
            'Images',
        ];
    }
}
