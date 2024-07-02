<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use App\Models\Articulo;

class GenExcel extends Controller
{
    public function exportarExcel(Request $request)
    {
        // Obtener la ruta y el nombre del archivo de la solicitud
        $ruta = $request->input('ruta');
        $nombre = $request->input('nombre');

        // Obtener los datos de la tabla "articulos" desde la base de datos
        $articulos = Articulo::all();

        // Crear una instancia de la hoja de cálculo y agregar los datos de los artículos
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Ambiente');
        $sheet->setCellValue('C1', 'Categoría');
        $sheet->setCellValue('D1', 'Marca');
        $sheet->setCellValue('E1', 'Número de Serie');
        $sheet->setCellValue('F1', 'Artículo');
        $sheet->setCellValue('G1', 'Fecha de Adquisición');
        $sheet->setCellValue('H1', 'Stock en Uso');
        $sheet->setCellValue('I1', 'Stock Almacenado');
        $sheet->setCellValue('J1', 'Stock Dañado');

        $row = 2;
        foreach ($articulos as $articulo) {
            $sheet->setCellValue('A' . $row, $articulo->id);
            $sheet->setCellValue('B' . $row, $articulo->ambiente->nombre);
            $sheet->setCellValue('C' . $row, $articulo->categoria->nombre);
            $sheet->setCellValue('D' . $row, $articulo->marca->nombre);
            $sheet->setCellValue('E' . $row, $articulo->nroserie);
            $sheet->setCellValue('F' . $row, $articulo->articulo);
            $sheet->setCellValue('G' . $row, $articulo->fechaadq);
            $sheet->setCellValue('H' . $row, $articulo->Stock_en_uso);
            $sheet->setCellValue('I' . $row, $articulo->Stock_almacenado);
            $sheet->setCellValue('J' . $row, $articulo->stock_dañado);

            $row++;
        }

        // Guardar la hoja en la ruta y el nombre especificados
        $rutaCompleta = $ruta . '/' . $nombre . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($rutaCompleta);

        return response()->json(['success' => true]);
    }
}
