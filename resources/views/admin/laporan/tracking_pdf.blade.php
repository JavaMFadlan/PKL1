<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
        <div class="container-fluid">
                <div class="col">
                    <div class="row">
                        <h1>Data KTracking</h1>
                    </div>
                    <div class="row">
                        <h4>pada tanggal - sampai - </h4>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alamat</th>
                                        <th>Positif <i class="fas fa-frown"></i></th>
                                        <th>Sembuh <i class="fas fa-smile-beam"></i></th>
                                        <th>Meninggal <i class="fas fa-dizzy"></i></th>
                                        <th>dirawat <i class="fas fa-hospital"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($tracking as $data)
                                    <tr>
                                                <td>{{$i++}}</td>
                                                <td>
                                                provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_prov}}</br>
                                                kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}</br>
                                                kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kec}}</br>
                                                kelurahan :{{$data->rw->kelurahan->nama_kel}}</br>
                                                Rw : {{$data->rw->nama_rw}}</br>
                                                </td>
                                                <td>{{$data->positif}}</td>
                                                <td>{{$data->sembuh}}</td>
                                                <td>{{$data->meninggal}}</td>
                                                <td>{{$data->dirawat}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>
                    