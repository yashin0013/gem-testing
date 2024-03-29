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
            'name',
            'gross_wt',
            'gold_wt',
            'dia_wt',
            'shape_cut',
            'clarity',
            'color',
            'finish',
            'description',
            'image'
        )->where('id', 1)->get();
    }

    public function headings(): array
    {
        return [
            'Report Number',
            'Name',
            'Gross Weight',
            'Gold Weight',
            'Diamond Weight',
            'Shape Cut',
            'Clarity',
            'Color',
            'Finish',
            'Description',
            'Images'
        ];
    }
}
