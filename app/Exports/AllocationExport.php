<?php

namespace App\Exports;

use App\Models\Allocations;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllocationExport implements  FromCollection ,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    

    public function collection()
    {
        //return $this->collage->all();
        return Allocations::all();
    }

    
    public function map($allocation): array
    {
        return[
            $allocation->index_no,
            $allocation->full_name,
            $allocation->sex,
            $allocation->registration_no,
            $allocation->reg_no,
            $allocation->collage,
            $allocation->course,
            $allocation->yos,
            $allocation->account_number,
            $allocation->ma,
            $allocation->books_stationary,
            $allocation->tution_free,
            $allocation->field,
            $allocation->research,
            $allocation->srf,
            $allocation->total
        ];
    }

    public function headings(): array
    {
        return[
            'Index no',
            'Full name',
            'Sex',
            'Form four index no',
            'Reg no',
            'College',
            'Course',
            'Yos',
            'Account number',
            'Meals and accommodation',
            'Books and stationary',
            'tution fees',
            'Field',
            'Research',
            'srf',
            'Total'
        ];
    }
}
