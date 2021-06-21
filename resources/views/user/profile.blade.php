<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Profile Nekat Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
    @foreach ($data as $dt )
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="{{asset('images/logo/iconuser.png')}}" alt="Maxwell Admin">
				</div>
				<h5 class="user-name">{{$dt->nama_lengkap}}</h5>
				<h6 class="user-email" style="font-size: 12px">{{$dt->email}}</h6>
			</div>
			<div class="about" style="margin-top:50px;">
				<h5>Profile</h5>
				<p></p>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
    <form action="/editprofile/{{$dt->id}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h4 class="mb-2 text-primary" style="margin-left:-15px;">Data Pribadi</h4>
            </div>
            <div class="row gutters" style="margin-top:20px;">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="nama_lengkap"><strong>Nama Lengkap: </strong></label>
                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Masukan Nama Lengkap" value="{{$dt->nama_lengkap}}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="password"><strong>Password:</strong></label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" value="{{$dt->password}}">
                        <input type="checkbox" id="passwordfeature" onclick="passwordFeature()"> Show Password
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="phone"><strong>Alamat: </strong></label>
                        <textarea name="alamat" id="" cols="30" rows="4" placeholder="Masukan Alamat" class="form-control" id="alamat">{{$dt->alamat}}</textarea>
                        {{-- <input type="text" name="alamat" class="form-control" id="phone" placeholder="Masukan Alamat" value="{{$dt['alamat']}}"> --}}
                    </div>
                </div>
                {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan alamat" value="{{$dt['alamat']}}">
                    </div>
                </div> --}}
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="transform: translate(0px,15px)">
                    <div class="form-group">
                        <label for="Street"><strong>NISN: </strong></label>
                        <p>{{$dt->nisn}}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="margin-top:-135px;">
                    <div class="form-group">
                        <label for="kelas"><strong>Kelas: </strong></label><br>
                        <p>{{$dt->kelas}}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="transform: translate(410px,-60px);">
                    <div class="form-group">
                        <label for="sTate"><strong>NIS: </strong></label>
                        <p>{{$dt->nis}}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="margin-top:-135px;">
                    <div class="form-group">
                        <label for="jurusan"><strong>Jurusan: </strong></label><br>
                        <p>{{$dt->jurusan}}</p>
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                        <a id="submit" name="submit" class="btn btn-secondary" href="/">Batal</a>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
</div>
</div>
</div>
</div>

<style type="text/css">
body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


</style>

<script type="text/javascript">
    //javascript show/hide password
    function passwordFeature(){
        //get element from input checkbox id
        var checkbox = document.getElementById('password').type;
        //condition type input checkbox
        if(checkbox == 'password'){
            document.getElementById('password').type = 'text';
        }else{
            document.getElementById('password').type = 'password';
        }
    }

    var message = '{{Session::get("edit")}}';
    var exist = '{{Session::has("edit")}}';
    if(exist){
        alert(message);
    }
</script>
</body>
</html>

