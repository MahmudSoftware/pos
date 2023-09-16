<?php

namespace App\Exports;

use App\Models\Center;
use App\Models\Farmer;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FarmersExport implements FromCollection, WithHeadings, ShouldAutoSize, Responsable, WithStyles
{

    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'FarmersData.xlsx';


    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];


    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling an entire column.
            'A'  => ['font' => ['size' => 16]],
        ];
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'ID',
            'FIRST NAME',
            'FIRST NAME (BN)',
            'LAST NAME',
            'LAST NAME (BN)',
            "FATHER'S NAME",
            "FATHER'S NAME (BN)",
            'CENTER NAME',
            'UNIT NAME',
            'NATIONAL ID',
            'PHONE NUMBER',
            'STATUS',
            'LOAN STATUS',
            'REMAIN LOAN',
            'INVESTED LOAN AMOUNT',
            'REMAIN CART',
            'TOTAL CANE',
            'SUPPLIED CANE',
            'SUPPLIED CANE CART',
            'VILLAGE',
        ];
    }
    public function collection()
    {
        $formData = Farmer::select('id', 'first_name', 'bn_first_name', 'last_name', 'bn_last_name', 'father_name', 'bn_father_name', 'center_id', 'unit_id', 'nid', 'phone', 'status', 'is_loan', 'remain_loan', 'invested_loan_amount', 'remain_cart', 'total_cane', 'supplied_cane', 'supplied_cane_cart', 'village')->get();

        return $formData;
    }
}
