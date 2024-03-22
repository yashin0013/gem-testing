<?php

namespace App\Imports;

use App\Models\Gem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;

class GemsImport implements ToCollection, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $validationErrors = [];

    public function collection(Collection $rows)
    {

        $index = 0;
        $uniqueReportNumbers = [];
        $errors = [];

        foreach ($rows as $index => $row) {
            $reportNumber = $row['report_number'];

            // Check if the report number is unique
            if (in_array($reportNumber, $uniqueReportNumbers)) {
                $errors[] = "The Report Number '{$reportNumber}' must be unique.";
            } else {
                // Add the report number to the list of unique report numbers
                $uniqueReportNumbers[] = $reportNumber;
            }
        }

        $validator = Validator::make($rows->toArray(), [
            '*.report_number' => 'required|unique:gems,report_number',
            '*.name' => 'required',
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
            '*.images' => 'required',

        ]);

        $validator->setAttributeNames([
            '*.report_number' => 'Report Number',
            '*.name' => 'Name',
            '*.weight' => 'Weight',
            '*.dimension' => 'Dimension',
            '*.color' => 'Color',
            '*.shape_cut' => 'Shape Cut',
            '*.optic_char' => 'Optical Characteristics',
            '*.refractive_index' => 'Refractive Index',
            '*.specific_gravity' => 'Specific Gravity',
            '*.microscope_view' => 'Microscope View',
            '*.species' => 'Species',
            '*.comments' => 'Comments',
            '*.images' => 'Images',
        ]);

        if ($validator->fails() || !empty($errors)) {

            $errors = array_merge($errors, $validator->errors()->all());

            $formattedErrors = [];

            foreach ($errors as $error) {
                $formattedErrors[] = 'Row ' . ($index + 1) . ': ' . $error; // Prepend index to error message
                $index++; // Increment index
            }

            $this->validationErrors = $formattedErrors;
        }else{
            foreach ($rows as $row) {
                Gem::create([
                'report_number'     => $row['report_number'],
                'name'     => $row['name'],
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
                'image'     => $row['images']
            ]);
        }
    }
    }

    public function getValidationErrors()
    {
        return $this->validationErrors;
    }
}
