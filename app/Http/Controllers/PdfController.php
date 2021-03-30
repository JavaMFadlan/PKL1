<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\provinsi;
use App\kota;
use PDF;

class PdfController extends Controller
{
    public function provinsi()
    {
        $provinsi = provinsi::all();
        $pdf = PDF::loadview('admin.laporan.provinsi_pdf',compact('provinsi'));
    	return $pdf->download('Laporan-provinsi.pdf');
    }

    public function kota()
    {
        $kota = kota::all();
        $pdf = PDF::loadview('admin.laporan.kota_pdf',compact('kota'));
    	return $pdf->download('Laporan-kota.pdf');
    }
}
