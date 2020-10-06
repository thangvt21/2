<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Stuff\Entities\Stuff;

class ExportController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    //
    public function collection()
    {
        $stuffs = Stuff::all();
        foreach ($stuffs as $row){
            $stuffs[] = array(
                '0' => $row->id,
                '1' => $row->ma_ccdc,
                '2' => $row->loai,
                '3' => $row->soluong,
                '4' => $row->status,
            );
        }
        return (collect($stuffs));
        // TODO: Implement collection() method.
    }

    public function headings(): array
    {
        return [
            'id',
            'ma_ccdc',
            'loai',
            'soluong',
            'status'
        ];
        // TODO: Implement headings() method.
    }
    public function export(){
        return Excel::download(new ExportController(), 'stuffs.xlsx');
    }
}
