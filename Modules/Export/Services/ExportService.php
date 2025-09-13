<?php

namespace Modules\Export\Services;

use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportService
{
    /**
     * Export client data to Excel
     *
     * @param Collection $clients
     * @param string $filename
     * @return BinaryFileResponse
     */
    public function exportToExcel(Collection $clients, string $filename): BinaryFileResponse
    {
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        // Set document properties
        $spreadsheet->getProperties()
            ->setCreator('Trademark Management System')
            ->setLastModifiedBy('System')
            ->setTitle('Client Export')
            ->setSubject('Client Data Export')
            ->setDescription('Export of client trademark data')
            ->setKeywords('trademark client export')
            ->setCategory('Export');

        // Define headers
        $headers = [
            'A1' => 'No',
            'B1' => 'Main Code',
            'C1' => 'Sub Code', 
            'D1' => 'Filling Date',
            'E1' => 'Trademark Name',
            'F1' => 'Owner Name',
            'G1' => 'TM Types',
            'H1' => 'Class',
            'I1' => 'Application Number',
            'J1' => 'Owner Address',
            'K1' => 'Owner Phone',
            'L1' => 'Agent Name',
            'M1' => 'Local Mark',
            'N1' => 'Foreign Mark',
            'O1' => 'Remark'
        ];

        // Set headers
        foreach ($headers as $cell => $header) {
            $worksheet->setCellValue($cell, $header);
        }

        // Style the header row
        $headerStyle = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4472C4']
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ]
            ]
        ];

        $worksheet->getStyle('A1:O1')->applyFromArray($headerStyle);

        // Set data rows
        $row = 2;
        foreach ($clients as $index => $client) {
            $worksheet->setCellValue('A' . $row, $index + 1);
            $worksheet->setCellValue('B' . $row, $client->main_code ?? '');
            $worksheet->setCellValue('C' . $row, $client->sub_code ?? '');
            $worksheet->setCellValue('D' . $row, $client->filling_date ? $client->filling_date->format('Y-m-d') : '');
            $worksheet->setCellValue('E' . $row, $client->trademark_name ?? '');
            $worksheet->setCellValue('F' . $row, $client->owner->name ?? '');
            $worksheet->setCellValue('G' . $row, $client->tm_types_label ?? '');
            $worksheet->setCellValue('H' . $row, $client->class ?? '');
            $worksheet->setCellValue('I' . $row, $client->application_number ?? '');
            $worksheet->setCellValue('J' . $row, $client->owner_address ?? '');
            $worksheet->setCellValue('K' . $row, $client->owner_phone ?? '');
            $worksheet->setCellValue('L' . $row, $client->agent->name ?? '');
            $worksheet->setCellValue('M' . $row, $client->local_mark ?? '');
            $worksheet->setCellValue('N' . $row, $client->foreign_mark ?? '');
            $worksheet->setCellValue('O' . $row, $client->remark ?? '');
            
            $row++;
        }

        // Style data rows
        if ($clients->count() > 0) {
            $dataStyle = [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_LEFT,
                    'vertical' => Alignment::VERTICAL_CENTER
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'CCCCCC']
                    ]
                ]
            ];

            $worksheet->getStyle('A2:O' . ($row - 1))->applyFromArray($dataStyle);
        }

        // Auto-size columns
        foreach (range('A', 'O') as $column) {
            $worksheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Set row height for header
        $worksheet->getRowDimension(1)->setRowHeight(25);

        // Freeze first row
        $worksheet->freezePane('A2');

        // Create writer
        $writer = new Xlsx($spreadsheet);

        // Save to temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'export_');
        $writer->save($tempFile);

        // Return file response
        return response()->download($tempFile, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }
}