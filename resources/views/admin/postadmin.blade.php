@extends('admin.layout.layout1')
@section('judul_aplikasi','Nekat Payment Admin')
@section('keterangan','Post Admin')
@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Post To <small>Nekat Payment</small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm" action="/admin/post" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Judul</label>
                <input type="text" name="judul_postingan" class="form-control" id="exampleInputEmail1" placeholder="Judul Postingan...">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Isi Postingan</label>
                <textarea name="isi_postingan" id="" cols="30" rows="4" class="form-control" placeholder="Isi Postingan..."></textarea>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Post</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <hr>
    @foreach ($post as $pt )
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: #3498db">
                <h5>{{$pt->judul_postingan}}</h5>
            </div>

            <div class="card-body">
                <p>{{$pt->isi_postingan}}</p>
            </div>

            <div class="card-footer">
                <small>{{$pt->postby}}</small>
            </div>
        </div>
    </div>
  </div>
    @endforeach
@endsection
