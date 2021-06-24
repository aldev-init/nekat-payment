{{-- Halaman Yang Akan Di Print PDF --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h2>Rekap Pembayaran Kelas {{$currentClass->kelas}}</h2>
    <p>{{$oldsemester}}</p>
    <p>Tahun: {{$oldtahun}}</p>
    <table class="table"  border="1">
        <thead>
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Bulan</th>
            <th scope="col">Ket.Pembayaran</th>
            <th scope="col">Jmlh.Bayar</th>
            <th scope="col">Tanggal/Waktu</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $dt )
          <tr>
            <td>{{$dt->nama_lengkap}}</td>
            <td>{{$dt->kelas}}</td>
            <td>{{$dt->jurusan}}</td>
            <td>{{$dt->bulan}}</td>
            <td>{{$dt->nama_pembayaran}}</td>
            <td>{{$dt->nominal_pembayaran}}</td>
            <td>{{$dt->created_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
