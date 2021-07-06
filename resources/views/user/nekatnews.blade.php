@extends('user.layout.navbartemplate')
@section('judul_aplikasi','Nekat Payment')
@section('keterangan','News')
@section('content')
<div class="container" style="margin-top: 120px; padding:10px;">
    @foreach ($post as $pt )
    <div class="card" style="margin-top:20px;">
        <div class="card-header" style="background-color: #3498db">
            <h5 style="color: white;">{{$pt->judul_postingan}}</h5>
        </div>

        <div class="card-body">
            <p>{{$pt->isi_postingan}}</p>
        </div>

        <div class="card-footer">
            <small>{{$pt->postby}}</small>
            <div class="card-tools" style="margin-left:920px; margin-top:-23px;">
                <small>{{$pt->created_at}}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
