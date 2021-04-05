<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\provinsi;
use App\kota;
use App\kecamatan;
use App\kelurahan;
use App\rw;
use App\tracking;
use Carbon\Carbon;
use PDF;

class PdfController extends Controller
{
    public function indexpdf()
    {
        $select = array('Default','Default','Default');
        return view('admin.laporan.index_pdf', compact('select'));
    }


    public function postpdf(Request $request)
    {
        $raw = array();
        $awal = Carbon::parse($request->awal)->format('Y-m-d');
        $akhir = Carbon::parse($request->akhir)->addDays(1)->format('Y-m-d');
        if ($request->tabel == "prov") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = provinsi::select('kode_prov','nama_prov','created_at')->get();
            }
            else{
                $data = provinsi::select('kode_prov','nama_prov','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_prov'],
                        'nama' => $o['nama_prov'],
                        'tgl' => $o['created_at']];
            }
        }
        elseif ($request->tabel == "kota") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = kota::select('kode_kota','nama_kota','created_at')->get();
            }
            else {
                $data = kota::select('kode_kota','nama_kota','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kota'],
                        'nama' => $o['nama_kota'],
                        'tgl' => $o['created_at']];
            }
        }
        elseif ($request->tabel == "kec") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = kecamatan::select('kode_kec','nama_kec','created_at')->get();
            }
            else {
                $data = kecamatan::select('kode_kec','nama_kec','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kec'],
                        'nama' => $o['nama_kec'],
                        'tgl' => $o['created_at']];
            }
        }
        elseif ($request->tabel == "kel") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = kelurahan::select('kode_kel','nama_kel','created_at')->get();
            }
            else {
                $data = kelurahan::select('kode_kel','nama_kel','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kel'],
                        'nama' => $o['nama_kel'],
                        'tgl' => $o['created_at']];
            }
        }
        elseif ($request->tabel == "rw") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = rw::select('kode_rw','nama_rw','created_at')->get();
            }
            else{
                $data = rw::select('kode_rw','nama_rw','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_rw'],
                        'nama' => $o['nama_rw'],
                        'tgl' => $o['created_at']];
            }
        }
        $select = array($request->tabel, $request->awal, $request->akhir);
        if ($awal > $akhir) {
            return redirect()->back()->with(['error' => 'Tanggal yang dimasukkan tidak valid']);
        }
        else {
            return view('admin.laporan.index_pdf', compact('raw', 'select'));
        }
    }

    // Laporan PDF
    public function laporan(Request $request)
    {
        $raw = array();
        $awal = Carbon::parse($request->awal)->format('Y-m-d');
        $akhir = Carbon::parse($request->akhir)->addDays(1)->format('Y-m-d');
        if ($request->tabel == "prov") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = provinsi::select('kode_prov','nama_prov','created_at')->get();
            }
            else{
                $data = provinsi::select('kode_prov','nama_prov','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_prov'],
                        'nama' => $o['nama_prov'],
                        'tgl' => $o['created_at']];
            }
        }
        elseif ($request->tabel == "kota") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = kota::select('kode_kota','nama_kota','created_at')->get();
            }
            else {
                $data = kota::select('kode_kota','nama_kota','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kota'],
                        'nama' => $o['nama_kota'],
                        'tgl' => $o['created_at']];
            }
        }
        elseif ($request->tabel == "kec") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = kecamatan::select('kode_kec','nama_kec','created_at')->get();
            }
            else {
                $data = kecamatan::select('kode_kec','nama_kec','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kec'],
                        'nama' => $o['nama_kec'],
                        'tgl' => $o['created_at']];
            }
        }
        elseif ($request->tabel == "kel") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = kelurahan::select('kode_kel','nama_kel','created_at')->get();
            }
            else {
                $data = kelurahan::select('kode_kel','nama_kel','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_kel'],
                        'nama' => $o['nama_kel'],
                        'tgl' => $o['created_at']];
            }
        }
        elseif ($request->tabel == "rw") {
            if (is_null($request->awal) && is_null($request->akhir)) {
                $data = rw::select('kode_rw','nama_rw','created_at')->get();
            }
            else{
                $data = rw::select('kode_rw','nama_rw','created_at')->whereBetween('created_at', [$awal, $akhir])->get();
            }
            
            foreach($data as $o){
                $raw[] = ['kode' => $o['kode_rw'],
                        'nama' => $o['nama_rw'],
                        'tgl' => $o['created_at']];
            }
        }
        $select = array($request->tabel, $awal, $akhir);
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
