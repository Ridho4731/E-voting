@include('../tools/navbar')

<main id="kandidat" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5 container-fluid w-100">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2 mx-auto my-0 mt-1">
        Perolehan Suara Osis
      </h1>
    </div>
  
    <div id="swiper" class="container-fluid  d-flex   swiper text-center P-5 py-3" style="height:auto">
        <div class="container kontainer" >
            <div id="donutchart" style="width: 100%; height:600px" data-index="0" data-status="active"></div>
          </div>
          @foreach($osis as $data)
          <div id="data{{$data->id}}" class="visually-hidden">{{ $data->suara }}</div>
          @endforeach
    </div>
</main>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript">


      let i = 0;

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
    //     <?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";  //your database password
    // $dbname = "pemilu";  //your database name

    // $con = new mysqli($servername, $username, $password, $dbname);

    // if ($con->connect_error) {
    //     die("Connection failed: " . $con->connect_error);
    // }
    // else
    // {
    //     //echo ("Connect Successfully");
    // }
    // $query = "SELECT nama, suara FROM oses"; // select column
    // $aresult = $con->query($query);

    // ?>
    
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
                    while($row = mysqli_fetch_assoc($aresult)){
                        echo "['".$row["nama"]."', ".$row["suara"]."],";
                    }
                ?>
        ]);
        var options = {
          title: 'My Daily Activities',
          pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
      setInterval(drawChart, 5000);
</script>

  