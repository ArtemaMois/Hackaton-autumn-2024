<?php

namespace App\Exports;

use App\Http\Resources\api\Task\ExcelTaskResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TaskExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{

    public function headings(): array
    {
        return [
            'Название',
            'Описание',
            'Исполнитель',
            'Создатель',
            'Дата создания',
            'Дата последнего изменения'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function collection()
    {
        return ExcelTaskResource::collection(Task::all());
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30
        ];
    }
}
