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
    @isset($nama)
    <p>Dengan Nama: {{$nama}}</p>
    @endisset
    <p>{{ucfirst($oldsemester)}}</p>
    <p>Tahun: {{$oldtahun}}</p>
    <table class="table"  style="border: 1px solid black;">
        <thead>
          <tr>
            <th scope="col" style="border: 1px solid black;">Nama</th>
            <th scope="col" style="border: 1px solid black;">Kelas</th>
            <th scope="col" style="border: 1px solid black;">Jurusan</th>
            <th scope="col" style="border: 1px solid black;">Bulan</th>
            <th scope="col" style="border: 1px solid black;">Ket.Pembayaran</th>
            <th scope="col" style="border: 1px solid black;">Jmlh.Bayar</th>
            <th scope="col" style="border: 1px solid black;">Tanggal/Waktu</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $dt )
          <tr>
            <td style="padding: 5px;border: 1px solid black;">{{$dt->nama_lengkap}}</td>
            <td style="padding: 5px;border: 1px solid black;">{{$dt->kelas}}</td>
            <td style="padding: 5px;border: 1px solid black;">{{$dt->jurusan}}</td>
            <td style="padding: 5px;border: 1px solid black;">{{$dt->bulan}}</td>
            <td style="padding: 5px;border: 1px solid black;">{{$dt->nama_pembayaran}}</td>
            <td style="padding: 5px;border: 1px solid black;">{{$dt->nominal_pembayaran}}</td>
            <td style="padding: 5px;border: 1px solid black;">{{$dt->created_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
