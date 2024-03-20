<?php

namespace App\Exports;

use App\Models\Diamond;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiamondsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Diamond::select(
            'report_number',
            'name',
            'description',
            'shape_cut',
            'dimension',
            'weight',
            'clarity_grade',
            'color_grade',
            'cut_prop',
            'finish',
            'fluoresc',
            'comments'
        )->where('id', 1)->get();
    }

    public function headings(): array
    {
        return [
            'Report Number',
            'Name',
            'Description',
            'Shape Cut',
            'Dimension',
            'Weight',
            'Clarity Grade',
            'Color Grade',
            'Cut Prop',
            'Finish',
            'Fluoresc',
            'Comments'
        ];
    }
}
