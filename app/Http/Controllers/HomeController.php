<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\tracking;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $response = Http::get('https://api.kawalcorona.com/')->json();
        foreach ($response as $key) {
            $data[] = [
                    'nama_negara' => $key['attributes']['Country_Region'], 
                    'kasus' =>$key['attributes']['Confirmed'],
                    'aktif' =>$key['attributes']['Active'],
                    'sembuh' =>$key['attributes']['Recovered'],
                    'meninggal' =>$key['attributes']['Deaths']
                ];
        }

        $tracking = DB::table('trackings')
                    
                    ->join('rws' ,'trackings.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kel', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->rightjoin('provinsis' ,'kotas.id_prov', '=', 'provinsis.id')
                    ->select(
                        DB::raw('provinsis.id'),
                        DB::raw('provinsis.nama_prov as nama_prov'),
                        DB::raw('SUM(trackings.positif) as positif'),
                        DB::raw('SUM(trackings.sembuh) as sembuh'),
                        DB::raw('SUM(trackings.meninggal) as meninggal'),
                        DB::raw('SUM(trackings.dirawat) as dirawat'),
                        DB::raw('trackings.positif + trackings.sembuh + trackings.meninggal + trackings.dirawat as total'))
                    ->groupby('provinsis.id', 'trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
                    ->get();
        
        return view('admin.index', compact('data','tracking'));
    }
    public function index1()
    {
        //Global
        $data = [];
        $response = Http::get('https://api.kawalcorona.com/')->json();
        if($response == NULL){
            $data[] = [
                'nama_negara' => 0, 
                'kasus' =>0,
                'aktif' =>0,
                'sembuh' =>0,
                'meninggal' =>0
            ];
        }
        else{
        foreach ($response as $key) {
                $data[] = [
                        'nama_negara' => $key['attributes']['Country_Region'], 
                        'kasus' =>$key['attributes']['Confirmed'],
                        'aktif' =>$key['attributes']['Active'],
                        'sembuh' =>$key['attributes']['Recovered'],
                        'meninggal' =>$key['attributes']['Deaths']
                    ];
            }
        }
        


        //Indonesia
        $tracking = DB::table('provinsis')
                    ->select(
                        'kode_prov',
                        'nama_prov',
                        DB::raw('SUM(trackings.positif) as positif'),
                        DB::raw('SUM(trackings.sembuh) as sembuh'),
                        DB::raw('SUM(trackings.meninggal) as meninggal'),
                        DB::raw('SUM(trackings.dirawat) as dirawat')
                        )
                        ->join('kotas' ,'kotas.id_prov', '=', 'provinsis.id')
                        ->join('kecamatans' ,'kecamatans.id_kota', '=', 'kotas.id')
                        ->join('kelurahans' ,'kelurahans.id_kec', '=', 'kecamatans.id')
                        ->join('rws' ,'rws.id_kel', '=', 'kelurahans.id')
                        ->join('trackings' ,'trackings.id_rw', '=', 'rws.id')
                        ->groupby('kode_prov','nama_prov')
                        ->get();

        return view('index', compact('data', 'tracking'));
    }
    
    public function charts()
    {
        return view('admin.charts');
    }
    public function tables()
    {
        return view('admin.tables');
    }
}