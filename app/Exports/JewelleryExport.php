<?php

namespace App\Exports;

use App\Models\Jewellery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JewelleryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jewellery::select(
            'report_number',
            'gross_wt',
            'gold_wt',
            'dia_wt',
            'shape_cut',
            'clarity',
            'color',
            'finish',
            'description'
        )->where('id', 1)->get();
    }

    public function headings(): array
    {
        return [
            'Report Number',
            'Gross Weight',
            'Gold Weight',
            'Diamond Weight',
            'Shape Cut',
            'Clarity',
            'Color',
            'Finish',
            'Description'
        ];
    }
}
