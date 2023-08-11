<?php
include_once __DIR__ . '/../src/autoload.php';

$outFileName = __DIR__ . '/output/' . basename(__FILE__, '.php') . '.xlsx';

use \avadim\FastExcelWriter\Excel;

$colors = [
    1 => '#ffd700',
    2 => '#2c2b2c',
    3 => '#ff9024',
    4 => '#8b4513',
    5 => '#ff0000',
];

$map = [
    ['',  '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',  2,  2],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',  2,  2,  2,  2],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',  2,  2,  2,  2,  2,  2],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',  2,  1,  1,  1,  2,  2,  2],
    ['',  '', '', '',  2,  2,  2,  2,  2,  2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',  2,  1,  1,  1,  1,  2,  2, ''],
    ['',  '', '', '',  2,  2,  2,  3,  3,  3,  2,  2,  2,  2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',  2,  1,  1,  1,  1,  3,  2,  2, ''],
    ['',  '', '', '', '', '',  2,  2,  4,  1,  1,  1,  1,  3,  2,  2,  2,  2, '',  2,  2,  2,  2,  2,  2,  2, '',  2,  2,  1,  1,  1,  1,  3,  3,  2, '', ''],
    ['',  '', '', '', '', '', '',  2,  2,  4,  3,  1,  1,  1,  1,  1,  1,  3,  2,  1,  1,  1,  1,  1,  1,  1,  2,  3,  1,  1,  1,  1,  3,  3,  2, '', '', ''],
    ['',  '', '', '', '', '', '', '',  2,  2,  3,  3,  3,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  3,  3,  3,  2, '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '',  2,  2,  3,  3,  3,  3,  3,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  3,  2,  3,  2, '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '', '',  2,  2,  3,  2,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  3,  2, '', '', '', '', '', ''],
    ['',   2, '', '', '', '', '', '', '', '', '', '', '',  2,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  2, '', '', '', '', '', ''],
    ['',   2,  2, '', '', '', '', '', '', '', '', '', '',  2,  1,  1,  1,  2,  2,  1,  1,  1,  1,  1,  1,  1,  1,  2,  2,  1,  1,  2, '', '', '', '', '', ''],
    ['',   2,  3,  2, '', '', '', '', '', '', '', '',  2,  3,  1,  1,  2,  2, '',  2,  1,  1,  1,  1,  1,  1,  2,  2, '',  2,  1,  3,  2, '', '', '', '', ''],
    ['',   2,  1,  3,  2, '', '', '', '', '', '', '',  2,  1,  1,  1,  2,  2,  2,  2,  1,  1,  1,  1,  1,  1,  2,  2,  2,  2,  1,  1,  2, '', '', '', '', ''],
    ['',   2,  1,  1,  3,  2, '', '', '', '', '', '',  2,  1,  1,  1,  1,  2,  2,  1,  1,  1,  1,  1,  1,  1,  1,  2,  2,  1,  1,  1,  2, '', '', '', '', ''],
    ['',   2,  1,  1,  1,  3,  2, '', '', '', '',  2,  1,  1,  5,  5,  1,  1,  1,  1,  1,  1,  2,  2,  1,  1,  1,  1,  1,  1,  5,  5,  1,  2, '', '', '', ''],
    ['',   2,  1,  1,  1,  1,  3,  2, '', '', '',  2,  1,  5,  5,  5,  5,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  5,  5,  5,  5,  2, '', '', '', ''],
    ['',   2,  1,  1,  1,  1,  1,  3,  2, '', '',  2,  1,  5,  5,  5,  5,  1,  1,  2,  1,  1,  2,  2,  1,  1,  2,  1,  1,  5,  5,  5,  5,  2, '', '', '', ''],
    ['',   2,  1,  1,  1,  1,  1,  1,  3,  2, '',  2,  1,  1,  5,  5,  1,  1,  1,  1,  2,  2,  1,  1,  2,  2,  1,  1,  1,  1,  5,  5,  1,  2, '', '', '', ''],
    ['',   2,  1,  1,  1,  1,  1,  1,  1,  3,  2,  2,  2,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  2, '', '', '', '', ''],
    ['',   2,  1,  1,  1,  1,  1,  1,  1,  1,  3,  2,  2,  3,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  3,  2, '', '', '', '', ''],
    ['',  '',  2,  1,  1,  1,  1,  1,  1,  1,  1,  2, '',  2,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  2, '', '', '', '', '', ''],
    ['',  '', '',  2,  1,  1,  1,  1,  1,  1,  2, '',  2,  3,  1,  1,  1,  1,  1,  1,  1,  3,  3,  3,  3,  1,  1,  1,  1,  1,  1,  3,  2, '', '', '', '', ''],
    ['',  '', '', '',  2,  1,  1,  1,  1,  2, '', '',  2,  2,  1,  1,  1,  1,  1,  1,  1,  1,  3,  3,  1,  1,  1,  1,  1,  1,  1,  1,  2, '', '', '', '', ''],
    ['',  '', '',  2,  1,  1,  1,  1,  2, '', '', '',  2,  1,  1,  1,  1,  1,  1,  2,  1,  1,  1,  1,  1,  1,  2,  1,  1,  1,  1,  1,  2, '', '', '', '', ''],
    ['',  '', '',  2,  1,  1,  1,  1,  1,  2, '',  2,  1,  1,  1,  2,  1,  1,  1,  2,  1,  1,  1,  1,  1,  1,  2,  1,  1,  1,  2,  1,  2, '', '', '', '', ''],
    ['',  '', '', '',  2,  1,  1,  1,  1,  1,  2,  2,  1,  1,  1,  2,  1,  1,  1,  1,  2,  1,  1,  1,  1,  2,  1,  1,  1,  1,  2,  1,  1,  2, '', '', '', ''],
    ['',  '', '', '', '',  2,  1,  1,  3,  3,  4,  2,  1,  1,  1,  3,  2,  1,  1,  1,  2,  1,  1,  1,  1,  2,  1,  1,  1,  2,  3,  1,  1,  2, '', '', '', ''],
    ['',  '', '', '', '', '',  2,  3,  3,  3,  2,  2,  1,  1,  1,  3,  2,  1,  1,  1,  2,  1,  1,  1,  1,  2,  1,  1,  1,  2,  3,  1,  1,  2, '', '', '', ''],
    ['',  '', '', '', '', '', '',  2,  3,  4,  4,  2,  1,  1,  1,  1,  3,  2,  1,  1,  2,  1,  1,  1,  1,  2,  1,  1,  2,  3,  1,  1,  1,  2, '', '', '', ''],
    ['',  '', '', '', '', '',  2,  4,  4,  4,  4,  2,  1,  1,  1,  1,  1,  3,  2,  2,  1,  1,  1,  1,  1,  1,  2,  2,  3,  1,  1,  1,  1,  2, '', '', '', ''],
    ['',  '', '', '', '', '', '',  2,  4,  4,  4,  2,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  2, '', '', '', ''],
    ['',  '', '', '', '', '', '', '',  2,  2,  4,  2,  3,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  2, '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '',  2,  2,  2,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  2, '', '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '', '', '',  2,  3,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  1,  2, '', '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '',  2,  1,  1,  1,  1,  1,  1,  3,  3,  3,  3,  3,  1,  1,  1,  1,  1,  1,  2, '', '', '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '', '',  2,  3,  1,  3,  3,  2,  2,  2,  2,  2,  2,  2,  3,  3,  1,  3,  2, '', '', '', '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '',  2,  1,  1,  1,  2,  2,  2, '', '', '', '', '', '',  2,  2,  1,  1,  1,  2, '', '', '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '',  2,  2,  2,  2,  2, '', '', '', '', '', '', '', '', '',  2,  2,  2,  2,  2, '', '', '', '', '', ''],
    ['',  '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''],
];

$timer = microtime(true);

// Create Excel workbook
$excel = Excel::create(['pikachu']);
$sheet = $excel->getSheet();

$cols = array_fill(0, count($map[0]), 2.2);
$sheet->setColWidths($cols);

foreach ($map as $row) {
    foreach ($row as $cell) {
        if ($cell) {
            $sheet->writeCell('')->applyFillColor($colors[$cell]);
        }
        else {
            $sheet->nextCell();
        }
    }
    $sheet->nextRow();
}

// Save to XLSX-file
$excel->save($outFileName);

echo '<b>', basename(__FILE__, '.php'), "</b><br>\n<br>\n";
echo 'out filename: ', $outFileName, "<br>\n";
echo 'elapsed time: ', round(microtime(true) - $timer, 3), ' sec', "<br>\n";
echo 'memory peak usage: ', memory_get_peak_usage(true), "<br>\n";

// EOF