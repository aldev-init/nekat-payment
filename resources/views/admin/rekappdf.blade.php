{{-- Halaman Yang Akan Di Print PDF --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Rekap Kelas {{$currentClass->kelas}}</title>
</head>
<body>
    <p style="text-align: center; font-size: 25px;">Nekat Payment</p>
    <p style="text-align: center; font-size: 25px;">Rekap Pembayaran Kelas</p>
    <hr>
    <p>Rekap Pembayaran Kelas {{$currentClass->kelas}}</p>
    <p>{{$oldsemester}}</p>
    <p>Tahun: {{$oldtahun}}</p>
    <table class="table"  style="border: 1px solid black;">
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
            <td style="padding: 5px;">{{$dt->nama_lengkap}}</td>
            <td style="padding: 5px;">{{$dt->kelas}}</td>
            <td style="padding: 5px;">{{$dt->jurusan}}</td>
            <td style="padding: 5px;">{{$dt->bulan}}</td>
            <td style="padding: 5px;">{{$dt->nama_pembayaran}}</td>
            <td style="padding: 5px;">{{$dt->nominal_pembayaran}}</td>
            <td style="padding: 5px;">{{$dt->created_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
