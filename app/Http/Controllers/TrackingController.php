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
        $error = [];
        for ($i=0; $i < $request->num ; $i++) {
            if ($request->meninggal[$i] > $request->positif[$i] ) {
                return redirect()->back()->with(['error' => 'Jumlah Meninggal Pada Data ke-'.$i.' Melebihi Positif']);
            }
            elseif ($request->positif[$i] < $request->dirawat[$i]) {
                return redirect()->back()->with(['error' => 'Jumlah Dirawat Pada Data ke-'.$i.' Melebihi Positif']);

            }
            else if ($request->positif[$i] < $request->sembuh[$i]) {
                return redirect()->back()->with(['error' => 'Jumlah sembuh Pada Data ke-'.$i.' Melebihi Positif']);

            }
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
        $tracking->id_rw = $request->id_rw[0];
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
}
