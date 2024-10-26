<?php

namespace App\Http\Controllers\api\Excel;

use App\Exports\TaskExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class ExcelController extends Controller
{
    public function export(Excel $excel)
    {
        return $excel->download(new TaskExport, 'tasks.xlsx');
    }
}
