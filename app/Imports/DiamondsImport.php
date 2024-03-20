<?php

namespace App\Imports;

use App\Models\Diamond;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class DiamondsImport implements ToCollection, WithHeadingRow
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
            '*.report_number' => 'required|unique:diamonds,report_number',
            '*.name'     => 'required',
            '*.description'     => 'required',
            '*.shape_cut'       => 'required',
            '*.dimension'       => 'required',
            '*.weight'          => 'required',
            '*.clarity_grade'   => 'required',
            '*.color_grade'     => 'required',
            '*.cut_prop'        => 'required',
            '*.finish'          => 'required',
            '*.fluoresc'        => 'required',
            '*.comments'        => 'required',
        ]);

        $validator->setAttributeNames([
            '*.report_number' => 'Report Number',
            '*.name'     => 'Name',
            '*.description'     => 'Description',
            '*.shape_cut'       => 'Shape Cut',
            '*.dimension'       => 'Dimension',
            '*.weight'          => 'Weight',
            '*.clarity_grade'   => 'Clarity Grade',
            '*.color_grade'     => 'Color Grade',
            '*.cut_prop'        => 'Cut Prop',
            '*.finish'          => 'Finish',
            '*.fluoresc'        => 'Fluoresc',
            '*.comments'        => 'Comments',
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
                Diamond::create([
                    'report_number'   => $row['report_number'],
                    'name'   => $row['name'],
                    'description'     => $row['description'],
                    'shape_cut'       => $row['shape_cut'],
                    'dimension'       => $row['dimension'],
                    'weight'          => $row['weight'],
                    'clarity_grade'   => $row['clarity_grade'],
                    'color_grade'     => $row['color_grade'],
                    'cut_prop'        => $row['cut_prop'],
                    'finish'          => $row['finish'],
                    'fluoresc'        => $row['fluoresc'],
                    'comments'        => $row['comments'],
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
