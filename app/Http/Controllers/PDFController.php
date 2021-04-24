<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Ventas;
use App\Models\DetalleVenta;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $data = [
            'title' => 'Reporte de venta',
            'date' => date('m/d/Y')
        ];

        $venta = Ventas::find($id);
        $detalle = DetalleVenta::where('venta_id', $id)->get();
          
        $pdf = PDF::loadView('admin.verVentas.muestraPDF',compact("detalle","venta"),$data);
    
        return $pdf->download('venta_'.$venta->folio.'.pdf');
    }
}
