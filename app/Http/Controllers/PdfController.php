<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\provinsi;
use App\kota;
use App\kecamatan;
use App\kelurahan;
use App\rw;
use App\tracking;
use PDF;

class PdfController extends Controller
{
    public function indexpdf()
    {
        $select = array('Default');
        return view('admin.laporan.index_pdf', compact('select'));
    }


    public function postpdf(Request $request)
    {
        $raw = array();
        if ($request->tabel == "prov") {
            $data = provinsi::select('kode_prov','nama_prov')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_prov'],
                        'nama' => $o['nama_prov']];
            }
        }
        elseif ($request->tabel == "kota") {
            $data = kota::select('kode_kota','nama_kota')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kota'],
                        'nama' => $o['nama_kota']];
            }
        }
        elseif ($request->tabel == "kec") {
            $data = kecamatan::select('kode_kec','nama_kec')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kec'],
                        'nama' => $o['nama_kec']];
            }
        }
        elseif ($request->tabel == "kel") {
            $data = kelurahan::select('kode_kel','nama_kel')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kel'],
                        'nama' => $o['nama_kel']];
            }
        }
        elseif ($request->tabel == "rw") {
            $data = rw::select('kode_rw','nama_rw')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_rw'],
                        'nama' => $o['nama_rw']];
            }
        }
        $select = array($request->tabel);
        return view('admin.laporan.index_pdf', compact('raw', 'select'));
    }


    

    public function laporan(Request $request)
    {
        $raw = array();
        if ($request->tabel == "prov") {
            $data = provinsi::select('kode_prov','nama_prov')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_prov'],
                        'nama' => $o['nama_prov']];
            }
        }
        elseif ($request->tabel == "kota") {
            $data = kota::select('kode_kota','nama_kota')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kota'],
                        'nama' => $o['nama_kota']];
            }
        }
        elseif ($request->tabel == "kec") {
            $data = kecamatan::select('kode_kec','nama_kec')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kec'],
                        'nama' => $o['nama_kec']];
            }
        }
        elseif ($request->tabel == "kel") {
            $data = kelurahan::select('kode_kel','nama_kel')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kel'],
                        'nama' => $o['nama_kel']];
            }
        }
        elseif ($request->tabel == "rw") {
            $data = rw::select('kode_rw','nama_rw')->get();
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_rw'],
                        'nama' => $o['nama_rw']];
            }
        }
        $select = array($request->tabel);
        $pdf = PDF::loadview('admin.laporan.laporan_pdf',compact('raw', 'select'));
    	return $pdf->download($request->tabel.'-laporan.pdf');
    }
    public function kecamatan()
    {
        $kecamatan = kecamatan::all();
        $pdf = PDF::loadview('admin.laporan.kecamatan_pdf',compact('kecamatan'));
    	return $pdf->download('Laporan-kecamatan.pdf');
    }
    public function tracking()
    {
        $tracking = tracking::with('rw')->get();
        $pdf = PDF::loadview('admin.laporan.tracking_pdf',compact('tracking'));
    	return $pdf->stream();
    }
    public function provinsi()
    {
        $provinsi = provinsi::all();
        $pdf = PDF::loadview('admin.laporan.provinsi_pdf',compact('provinsi'));
    	return $pdf->download('Laporan-provinsi.pdf');
    }
}
