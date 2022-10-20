@include('../tools/navbar')
@include('../tools/sidebar')

<title>
  Dashboard
</title>
  

<main id="dashboard" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard
    </h1>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col">

      </div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
  </div>

</main>

<main id="kandidat" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Kandidat
    </h1>
    <div class="mpk-osis-btn btn-group me-2">
      <button onclick="osis()" type="button" id="btn-osis" class="  btn btn-sm btn-secondary disabled" >OSIS</button>
      <button onclick="mpk()" type="button" id="btn-mpk" class=" btn btn-sm ">MPK</button>
    </div>
  </div>
  <div id="swiper" class="container d-flex justify-content-center   swiper text-center">
    <div id="card-group" class="card-group row d-flex" data-index="0" data-status="active"> 
      @foreach($osis as $kandidat)
      <div class="col-4">
        <div class="card " >
          <li class="list-group-item"></li>
          <div class="dropdown">
            <a href="#" data-bs-toggle="dropdown" role="button"> 
              <i class="fa-solid fa-ellipsis-vertical fs-5 drop-toggle" ></i>
            </a>
          {{-- FORM HAPUS --}}
            <form type="hidden" style="display: none" method="post" action="/osis/{{$kandidat->id}}">
              @method('delete')
              @csrf
              <button type="submit" id="hapus_osis" class=" btn btn-info btn-sm">Hapus</button>
            </form>
          {{--  --}}
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/osis/{{$kandidat->id}}/edit">Edit</a></li>              
            <li><a class="dropdown-item" href="" onclick="document.getElementById('hapus_osis').click()">Hapus</a></li>
            </ul>
          </div>
          <img src="{{ asset('storage/'.$kandidat->foto) }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$kandidat->nama}}</h5>
            <div class="d-flex aksi">
              <button type="button" class="me-auto btn btn-success btn-sm">Total Suara : {{$kandidat->suara}}</button>
              <button type="submit" class=" btn btn-info btn-sm">Visi-Misi</button>
            </div>
          </div>
        </div> 
      </div>
      @endforeach
      <div class="col">
        <div class="card" >

          <img src="{{ asset('foto/kandidat/add_pic.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"> Nama Kandidat </h5>
            <a href="tambah-kandidat">
              <button type="button" class=" btn btn-info btn-sm">Tambah</button>
            </a>
          </div>
        </div> 
      </div>
    </div>
    <div id="card-group" class="card-group row " data-index="1" data-status="unknown"> 
      @foreach($mpk as $kandidat)
      <div class="col-3">
        <div class="card" >
          <div class="dropdown">
            <a href="#" data-bs-toggle="dropdown" role="button"> 
              <i class="fa-solid fa-ellipsis-vertical fs-5" ></i>
            </a>
          {{-- FORM HAPUS --}}
          <form type="hidden" style="display: none" method="post" action="/mpk/{{$kandidat->id}}">
            @method('delete')
            @csrf
          <button type="submit" id="hapus_mpk" class=" btn btn-info btn-sm">Hapus</button>
        </form>
        {{--  --}}
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/mpk/{{$kandidat->id}}/edit">Edit</a></li>
              
            <li><a class="dropdown-item" href="" onclick="document.getElementById('hapus_mpk').click()">Hapus</a></li>

            </ul>
          </div>
          <img src="{{ asset('storage/'.$kandidat->foto) }}" class="card-img-top" alt="...">
          <div class="card-body">
              <h5 class="card-title">{{$kandidat->nama}}</h5>
              <div class="d-flex">
                <button type="button" class="me-auto btn btn-success btn-sm">Total Suara : {{$kandidat->suara}}</button>
              <button type="submit" class=" btn btn-info btn-sm">Visi-Misi</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="col">
        <div class="card" >

          <img src="{{ asset('foto/kandidat/add_pic.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"> Nama Kandidat </h5>
            <a href="tambah-kandidat">
              <button type="button" class=" btn btn-info btn-sm">Tambah</button>
            </a>
          </div>
        </div> 
      </div>
    </div>

  </div>
</main>


<main id="pemilih" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Pemilih
    </h1>
  </div>
  <div class="container-fluid kontainer p-3 ">
  <div class="d-flex flex-column my-2">
    <div id="tambahsiswa">
      <form method="POST" action="pemilih" class="d-flex ">
        @csrf
        <input class="form-control form-control-sm me-3" type="text" placeholder="NIPD" name="nipd" aria-label=".form-control-sm example">                  
        <input class="form-control form-control-sm me-3" type="text" placeholder="Nama" name="nama" aria-label=".form-control-sm example">
        <input class="form-control form-control-sm me-3" type="text" placeholder="Email" name="email" aria-label=".form-control-sm example">
        <input class="form-control form-control-sm me-3" type="text" placeholder="password" name="password" aria-label=".form-control-sm example">
        @foreach($last as $latest)
        <input class="form-control form-control-sm me-3" type="text" placeholder="Kelas" @if($latest->kelas == 'admin') value="" @else value="{{ $latest->kelas }}" @endif name="kelas" aria-label=".form-control-sm example" value="{{old('kelas')}}">
        @endforeach
      <button type="submit" class="btn-simpan-pemilih btn btn-success btn-sm text-nowrap me-2">Simpan</button>
      <button  type="button" class="btn-simpan-pemilih btn-tutup pemilih btn btn-danger btn-sm text-nowrap"><i class="fa-solid fa-xmark"></i></button>
      </form>
    </div>
    <div class="mt-3">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
 
  <div class="t-siswa">
    <table class="table table-bordered table-striped bg-light table-hover" >
      <thead class="t-head bg-info">
        <tr class="">
          <th >NIPD / Email</th>
          <th style="width: 220px" >Nama</th>
          <th >Kelas</th>
          <th >Memilih Osis</th>
          <th >Memilih Mpk</th>
          <th >Aksi</th>
      </thead>
      @foreach($users as $pemilih)
        <tr>
          @if($pemilih->nipd == null)
            <td>{{$pemilih->email}}</td>
          
          @else
          <td>{{$pemilih->nipd}}</td>
          @endif
          <td>{{$pemilih->nama}}</td>
          <td>{{$pemilih->kelas}}</td>
          @if($pemilih->osis == 0)
          <td><span class="badge text-bg-danger"><i class="bi bi-x-square"></i></span></td>
          @elseif($pemilih->osis != 0)
          <td><span class="badge text-bg-success"><i class="bi bi-check2-all"></i></span></td>
          @endif
          @if($pemilih->mpk == 0)
          <td><span class="badge text-bg-danger"><i class="bi bi-x-square"></i></span></td>
          @elseif($pemilih->mpk != 0)
          <td><span class="badge text-bg-success"><i class="bi bi-check2-all"></i></span></td>
          @endif
          <td>
            <form action="pemilih/{{$pemilih->id}}" style="display: none" method="post" >
              @method('put')
              @csrf
            <input type="hidden" name="osis" value="0">
            <input type="hidden" name="mpk" value="0">
            <button type="submit" id="reset{{$pemilih->id}}"></button>
            </form>
            <form action="pemilih/{{$pemilih->id}}" style="display: none" method="post" >
              @method('delete')
              @csrf
            <button type="submit" id="hapus{{$pemilih->id}}"></button>
            </form>
            <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</button>
            <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('reset{{$pemilih->id}}').click()"><i class="bi bi-trash-fill"></i> Reset</button>
            <button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('hapus{{$pemilih->id}}').click()"><i class="bi bi-trash-fill"></i> Hapus</button>
          </td>
        </tr>
      @endforeach
      <tbody class="table-group-divider">
      </tbody>
  </table>
  </div>
</div>
</main>





<script>

  let activeIndex = 0;
  const groups = document.getElementsByClassName("card-group");

  let btnOsis = document.getElementById('btn-osis');
  let btnMpk = document.getElementById('btn-mpk');

  function osis(){

    let activeIndex = 1;
    let nextIndex = 0;



    const currentGroup = document.querySelector(`[data-index="${activeIndex}"]`),
      nextGroup = document.querySelector(`[data-index="${nextIndex}"]`);
    currentGroup.dataset.status = "after";

    nextGroup.dataset.status = "active-from-before";

    setTimeout(() => {
    nextGroup.dataset.status = "active";
    activeIndex = nextIndex;
    });

    btnOsis.classList.add('disabled');
    btnOsis.classList.add('btn-secondary');
    btnOsis.classList.remove('btn-outline-secondary');
    btnMpk.classList.remove('disabled');
    btnMpk.classList.remove('btn-secondary');
    btnMpk.classList.add('btn-outline-secondary');
  }

  function mpk(){
    const currentGroup = document.querySelector(`[data-index="${0}"]`),
          nextGroup = document.querySelector(`[data-index="${1}"]`);

    currentGroup.dataset.status = "after";

    nextGroup.dataset.status = "active-from-before";

    setTimeout(() => {
    nextGroup.dataset.status = "active";
    });

    btnMpk.classList.add('disabled');
    btnMpk.classList.add('btn-secondary');
    btnMpk.classList.remove('btn-outline-secondary');
    btnOsis.classList.remove('disabled');
    btnOsis.classList.remove('btn-secondary');
    btnOsis.classList.add('btn-outline-secondary');
  }




</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript">

      let i = 0;

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        let Osisvote1 = parseInt(document.getElementById('osisS1').innerHTML);
        let Osisvote2 = parseInt(document.getElementById('osisS2').innerHTML);
        if( i == 0 ){
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Reza Adhitya',  Osisvote1],
          ['Anisa Arianti',      Osisvote2]
        ]);
      }
        var options = {
          title: 'My Daily Activities',
          pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
        setInterval(() => {
          var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Reza Adhitya',     10],
          ['Anisa Arianti',      12]
        ]);
        i++
          console.log(i)
        }, 3000);
      }
</script>



{{-- <script id="pie-chart">
  let suara = "osis";
  
      var drawPieChart = function(data, colors) {
      var canvas = document.getElementById('pie');
      var ctx = canvas.getContext('2d');
      var x = canvas.width / 2;
          y = canvas.height / 2;
      var color,
          startAngle,
          endAngle,
          total = getTotal(data);
      
      for(var i=0; i<data.length; i++) {
        color = colors[i];
        startAngle = calculateStart(data, i, total);
        endAngle = calculateEnd(data, i, total);
        
        ctx.beginPath();
        ctx.fillStyle = color;
        ctx.moveTo(x, y);
        ctx.arc(x, y, y-100, startAngle, endAngle);
        ctx.fill();
        ctx.rect(canvas.width - 240, y - i * 30, 12, 12);
        ctx.fill();
        ctx.font = "15px roboto";
        ctx.fillText(data[i].label + " - " + data[i].value + " (" + calculatePercent(data[i].value, total) + "%)", canvas.width - 200 - 20, y - i * 30 + 10);
      }
      };
    
    var calculatePercent = function(value, total) {

      return (value / total * 100).toFixed(2);
    };
    
    var getTotal = function(data) {
      var sum = 0;
      for(var i=0; i<data.length; i++) {
        sum += data[i].value;
      }   
      return sum;
    };
    
    var calculateStart = function(data, index, total) {
      if(index === 0) {
        return 0;
      } 
      return calculateEnd(data, index-1, total);
    };
    
    var calculateEndAngle = function(data, index, total) {
      var angle = data[index].value / total * 360;
      var inc = ( index === 0 ) ? 0 : calculateEndAngle(data, index-1, total);

      return ( angle + inc );
    };
    
    var calculateEnd = function(data, index, total) {
      
      return degreeToRadians(calculateEndAngle(data, index, total));
    };
    
    var degreeToRadians = function(angle) {

      return angle * Math.PI / 180
    }
    
    var data = [
      { label: 'Kandidat 1', value: 90 },
      { label: 'Kandidat 2', value: 80 },
      { label: 'Belum Memilih', value: 200 },

    ];
    var colors = [ '#39CCCC', '#3D9970', '#001F3F', '#85144B' ];
    
    drawPieChart(data, colors);
</script> --}}