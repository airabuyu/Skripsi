<?php

namespace App\Exports;

use App\Models\User;
use App\Models\ExamResult;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Alignment;

class ExamResultExport implements FromCollection, WithHeadings, WithEvents, WithStyles, WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        // $user = ExamResult::with('users')->get();
        // // dd($user);
        // return $user;

        $data = null;

        if(Auth::user()->role_id == 1){

            $data = DB::select("SELECT u.name, e.exam_name, s.score, CONVERT(varchar, e.exam_start_dt, 106),
                            CASE
                                WHEN s.score > 75
                                    THEN 'PASSED'
                                ELSE
                                    'FAILED'
                            END
                            AS RESULT
                            FROM users u
                            INNER JOIN exam_results s ON u.id = s.user_id
                            INNER JOIN exams e ON e.id = s.exam_id
                            ORDER BY u.name ASC, e.exam_start_dt DESC
                            "
                        );
        }
        else{
            $data = DB::select("SELECT u.name, e.exam_name, s.score, CONVERT(varchar, e.exam_start_dt, 106),
                            CASE
                                WHEN s.score > 75
                                    THEN 'PASSED'
                                ELSE
                                    'FAILED'
                            END
                            AS RESULT
                            FROM users u
                            INNER JOIN exam_results s ON u.id = s.user_id
                            INNER JOIN exams e ON e.id = s.exam_id
                            WHERE u.id = ?
                            ORDER BY u.name ASC, e.exam_start_dt DESC
                            ", [Auth::user()->id]);
        }


        return collect($data);
    }

    public function headings(): array
    {
        return ["User Name", "Exam Name", "Score", "Exam Date", "Result"];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->freezePane('A4');
                $event->sheet->getDelegate()->getRowDimension('3')->setRowHeight(35);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(40);


                // $event->sheet->getDelegate()->getStyle('A1:E1')->getAlignment()->setVertical(1);
                // $event->sheet->getDelegate()->getStyle('A1:E1')->getAlignment()->setHorizontal(1);
                // $event->sheet->styleCells(
                //     'A1:E1',
                //     [
                //         'alignment' => [
                //             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                //         ],
                //     ]
                // );

                // $sheet->row(function($row) {
                //     $value = $row->getCell('A')->getValue();
                //     if ($value > 92) {
                //         $row->setBackground(new Fill('#00FF00'));
                //     }
                // });
            },
        ];
    }


    public function startCell(): string
    {
        return 'A3';
    }

    public function styles(Worksheet $sheet)
    {

        // $sheet->mergeCells('A1:E1');

        // $sheet->setCellValue('A1', 'some value');
        // $sheet->getStyle('A1')->getAlignment()->setHorizontal(2);

        // $sheet->getColumnDimension('C')->setBackground(new Fill('#00FF00'));

        // $sheet->row(function($row) {
        //     $value = $row->getColumnDimension('C')->getValue();
        //     if ($value > 95) {
        //         $row->setBackground(new Fill('#00FF00'));
        //     }
        // });

        return [
            3    => ['font' => ['bold' => true]],

        ];
    }

}
