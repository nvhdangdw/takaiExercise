<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ExcelImportController extends Controller
{
    /**
     * Show the form to import an Excel file.
     *
     * @return \Illuminate\View\View
     */
    public function showImportForm()
    {
        return view('import');
    }

    /**
     * Handle the import of the Excel file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);
        $path = $request->file('file')->getRealPath();
        Excel::import(new TransactionsImport,$path, null, \Maatwebsite\Excel\Excel::XLSX);

        //Convert the date format from d/m/Y H:i:s to Y-m-d H:i:s
        
        $data = Excel::toCollection(new TransactionsImport, $path, null, \Maatwebsite\Excel\Excel::XLSX)->first();

        $convertedData = $data->map(function($row) {
            $date = \DateTime::createFromFormat('d/m/Y H:i:s', $row[0]);
            return [
                'date' => $date ? $date->format('Y-m-d H:i:s') : null,
                'content' => $row[1],
                'amount' => $row[2],
                'type' => $row[3],
                'client_id' => $row[4],
            ];
        });

        DB::table('transactions')->insert($convertedData->toArray());

        return redirect('/import')->with('success', 'Transactions imported successfully.');
    }

    /**
     * Download the sample Excel file.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadSampleExcel()
    {
        return Excel::download(new SampleTransactionsExport, 'sample_transactions.xlsx');
    }
}
