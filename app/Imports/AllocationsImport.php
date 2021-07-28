<?php

namespace App\Imports;

use App\Models\Allocations;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AllocationsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Allocations([
            'index_no' => $row['index_no'],
            'full_name' => $row['full_name'],
            'sex' => $row['sex'],
            'registration_no' => $row['form_four_index_no'],
            'reg_no'=>$row['reg_no'],
            'collage' => $row['college'],
            'course' => $row['course'],
            'yos' => $row['yos'],
            'account_number'=>$row['account_number'],
            'ma' => $row['meals_and_accommodation'],
            'books_stationary' => $row['books_and_stationary'],
            'tution_free' => $row['tution_fees'],
            'field' => $row['field'],
            'research' => $row['research'],
            'srf' => $row['srf'],
            'total' => $row['total']
        ]);
    }
}
