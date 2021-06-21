@extends('admin.layout.layout1')
@section('judul_aplikasi','Nekat Payment Admin')
@section('keterangan','Beranda')
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$jumlahsiswa}}</h3>

              <p>Siswa Terdaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$jumlahkelas}}<sup style="font-size: 20px"></sup></h3>

              <p>Kelas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$jumlahjurusan}}</h3>

              <p>Jurusan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
    <hr>
    {{-- ekstras --}}
    <!-- weather widget start -->
 <div id="m-booked-bl-simple-5821"> <div class="booked-wzs-160-110 weather-customize" style="background-color:#137AE9;width:320px;" id="width4"> <div class="booked-wzs-160-110_in"> <div class="booked-wzs-160-data"> <div class="booked-wzs-160-left-img wrz-18"></div> <div class="booked-wzs-160-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>29</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d"><span class="plus">+</span>29&deg;</div> <div class="booked-wzs-day-n"><span class="plus">+</span>19&deg;</div> </div> </div> <div class="booked-wzs-160-info"> <div class="booked-wzs-160-city">Bandung</div> <div class="booked-wzs-160-date">, 08</div> </div> </div> </div> <div class="booked-wzs-center"><span class="booked-wzs-bottom-l"> Lihat Prakiraan 7 Hari</span></div> </a> </div> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); var widgetUrl = location.href; css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-160.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData_5821(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-bl-simple-5821'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=9580;type=1;scode=2;ltid=3457;domid=;anc_id=41930;countday=undefined;cmetric=1;wlangID=27;color=137AE9;wwidth=320;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";widgetSrc += ';ref=' + widgetUrl;widgetSrc += ';rand_id=5821';widgetSrc += ';wstrackId=481504570';var weatherBookedScript = document.createElement("script"); weatherBookedScript.setAttribute("type", "text/javascript"); weatherBookedScript.src = widgetSrc; document.body.appendChild(weatherBookedScript) </script>
 <!-- weather widget end -->

 {{-- jam --}}
 {{-- <div class="container" style="margin-left: 30px;">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
            <h4>Jam</h4>
            <h3 style="display: inline;" id="jam"></h3><h3 style="display: inline;" id="ket"> Am</h3><br>
            <h5 style="display: inline;" id="menit"></h5>
            <h5 style="display: inline;">:</h5>
            <h5 style="display: inline;" id="detik"></h5>
            </div>
            <div class="icon">
              <i class="fas fa-clock fa-lg"></i>
            </div>
          </div>
        </div>
    </div>
 </div>
 <div class="container" style="margin-left: 700px; margin-top:-30px; padding:0px;">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
                <h4>Bulan</h4>
                <h2>Januari</h2>
            </div>
            <div class="icon">
              <i class="fas fa-moon fa-lg"></i>
            </div>
          </div>
        </div>
    </div>
 </div> --}}
  </section>


 {{-- javascript --}}
 <script>
     window.setTimeout("waktu()",500);
     function waktu(){
        var waktu = new Date();
        setTimeout("waktu()",500);
        var jam = document.getElementById('jam').innerHTML = waktu.getHours();
        var menit = document.getElementById('menit').innerHTML = waktu.getMinutes();
        var detik = document.getElementById('detik').innerHTML = waktu.getSeconds();
        var ket = document.getElementById('ket').innerHTML = (jam > 12) ? " Pm" : " Am";
     }

     var message  = '{{Session::get("status")}}';
     var exist = '{{Session::has("status")}}';
     if(exist){
         alert(message);
     }
 </script>
@endsection

{{-- masih bug desain
benarkan cepatt --}}
