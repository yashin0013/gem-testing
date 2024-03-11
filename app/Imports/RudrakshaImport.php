<?php

namespace App\Imports;

use App\Models\Rudraksha;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class RudrakshaImport implements ToCollection, WithHeadingRow
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
            '*.report_number' => 'required|unique:rudraksha,report_number',
            '*.weight'          => 'required',
            '*.dimension'       => 'required',
            '*.color'           => 'required',
            '*.shape'           => 'required',
            '*.natural_face'    => 'required',
            '*.artificial_face' => 'required',
            '*.test'            => 'required',
            '*.origin'          => 'required',
            '*.comments'        => 'required',
        ]);

        $validator->setAttributeNames([
            '*.report_number' => 'Report Number',
            '*.weight'          => 'Weight',
            '*.dimension'       => 'Dimension',
            '*.color'           => 'Color',
            '*.shape'           => 'Shape',
            '*.natural_face'    => 'Natural Face',
            '*.artificial_face' => 'Artificial Face',
            '*.test'            => 'Test',
            '*.origin'          => 'Origin',
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
                Rudraksha::create([
                    'report_number'   => $row['report_number'],
                    'weight'          => $row['weight'],
                    'dimension'       => $row['dimension'],
                    'color'           => $row['color'],
                    'shape'           => $row['shape'],
                    'natural_face'    => $row['natural_face'],
                    'artificial_face' => $row['artificial_face'],
                    'test'            => $row['test'],
                    'origin'          => $row['origin'],
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
