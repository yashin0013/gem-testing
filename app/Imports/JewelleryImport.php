<?php

namespace App\Imports;

use App\Models\Jewellery;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class JewelleryImport implements ToCollection, WithHeadingRow
{
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
            '*.report_number' => 'required|unique:jewellery,report_number',
            '*.name'   => 'required',
            '*.gross_weight'   => 'required',
            '*.gold_weight'    => 'required',
            '*.diamond_weight'     => 'required',
            '*.shape_cut'  => 'required',
            '*.clarity'    => 'required',
            '*.color'      => 'required',
            '*.finish'     => 'required',
            '*.description' => 'required',
        ]);

        $validator->setAttributeNames([
            '*.report_number' => 'Report Number',
            '*.name'   => 'Name',
            '*.gross_weight'   => 'Gross Weight',
            '*.gold_weight'    => 'Gold Weight',
            '*.diamond_weight'     => 'Diamond Weight',
            '*.shape_cut'  => 'Shape Cut',
            '*.clarity'    => 'Clarity',
            '*.color'      => 'Color',
            '*.finish'     => 'Finish',
            '*.description' => 'Description',
        ]);

        if ($validator->fails() || !empty($errors)) {

            $errors = array_merge($errors, $validator->errors()->all());

            $formattedErrors = [];

            foreach ($errors as $error) {
                $formattedErrors[] = 'Row ' . ($index + 1) . ': ' . $error; // Prepend index to error message
                $index++; // Increment index
            }

            $this->validationErrors = $formattedErrors;
        } else {
            foreach ($rows as $row) {
                Jewellery::create([
                    'report_number'   => $row['report_number'],
                    'name'    => $row['name'],
                    'gross_wt'    => $row['gross_weight'],
                    'gold_wt'     => $row['gold_weight'],
                    'dia_wt'      => $row['diamond_weight'],
                    'shape_cut'   => $row['shape_cut'],
                    'clarity'     => $row['clarity'],
                    'color'       => $row['color'],
                    'finish'      => $row['finish'],
                    'description' => $row['description'],
                    'image'     => "img"
                ]);
            }
        }
    }

    public function getValidationErrors()
    {
        return $this->validationErrors;
    }
}
