<?php

namespace App\Exports;


use App\Models\GazetteList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GazetteExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return GazetteList::select('day', 'psl_no', 'current_loan', 'remain_cart')->get();
    }

    public function headings(): array
    {
        return [
            'Day',
            'PSL No',
            'Current Loan',
            'Remaining Cart',
        ];
    }


}

