<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SampleTransactionsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect([
            ['21/03/2020 10:20:11', 'Any text there', 100.00, 'Deposit', 'client_id_1'],
            ['20/03/2020 20:20:11', 'Any text there', -50.00, 'Withdraw', 'client_id_1'],
            ['19/03/2020 18:10:11', 'Another transaction', 200.00, 'Deposit', 'client_id_1'],
            ['18/03/2020 15:30:11', 'Another transaction', -70.00, 'Withdraw', 'client_id_1'],
        ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'date', 'content', 'amount', 'type', 'client_id'
        ];
    }
}
