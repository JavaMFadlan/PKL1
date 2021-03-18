<?php

namespace App\Http\Controllers;

use App\tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracking = tracking::with('rw')->get();
        return view('admin.tracking.index',compact('tracking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $num = $request->num;
        return view('admin.tracking.create',compact('num'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
        ];  
        $this->validate($request, [
                    'id_rw.*' => 'required',
                    'sembuh.*' => "required",
                    'positif.*' => "required",
                    'meninggal.*' => "required",
                    'dirawat.*' => "required",
        ], $messages
        );
        $data = [];
        for ($i=0; $i < $request->num ; $i++) { 
            $data[] =
            [
            'id_rw' => $request->id_rw[$i],
            'sembuh' => $request->sembuh[$i],
            'positif' => $request->positif[$i],
            'meninggal' => $request->meninggal[$i],
            'dirawat' => $request->dirawat[$i],
            'tanggal' => date('Y-m-d')
            ];
        }
        tracking::insert($data);
        
        return redirect()->route('tracking.index')->with(['message' => 'Berhasil']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $tracking = tracking::findorFail($id);
        return view('admin.tracking.show',compact('tracking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tracking = tracking::findorFail($id);
        return view('admin.tracking.edit',compact('tracking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
        ];  
        $this->validate($request, [
                    'id_rw' => 'required',
                    'sembuh' => "required",
                    'positif' => "required",
                    'meninggal' => "required",
                    'dirawat' => "required",
        ], $messages
        );
        $tracking = tracking::findorFail($id);
        $tracking->id_rw = $request->id_rw;
        $tracking->sembuh = $request->sembuh;
        $tracking->positif = $request->positif;
        $tracking->meninggal = $request->meninggal;
        $tracking->dirawat = $request->dirawat;
        $tracking->update();
        return redirect()->route('tracking.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tracking = tracking::findorfail($id)->delete();
        return redirect()->route('tracking.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }

    public function Cetak_pdf()
    {
        $tracking = DB::table('trackings')
                    ->select('rws.kode_rw',
                            'rws.nama_rw',
                            'kelurahans.nama_kel',
                            'kecamatans.nama_kec',
                            'kotas.nama_kota',
                            'provinsis.nama_prov',
                            DB::raw('trackings.id as id'),
                            DB::raw('SUM(trackings.positif) as positif'),
                            DB::raw('SUM(trackings.sembuh) as sembuh'),
                            DB::raw('SUM(trackings.meninggal) as meninggal'),
                            DB::raw('SUM(trackings.dirawat) as dirawat'))
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->join('provinsis' ,'kotas.id_prov', '=', 'provinsis.id')
                    ->groupby('rws.kode_rw')
                    ->get();
        return view('admin.tracking.index',compact('tracking'));
    }
}
