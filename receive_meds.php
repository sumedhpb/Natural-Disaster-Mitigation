<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Natural-Distater-Mitigation</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script>
      // function showHint() {
      //         var xmlhttp = new XMLHttpRequest();
      //         xmlhttp.onreadystatechange = function() {
      //             if (this.readyState == 4 && this.status == 200) {
      //               //console.log("hi"+this.responseText);
      //                 document.getElementById("txtHint").value = this.responseText;
      //             }
      //         };
      //         xmlhttp.open("GET", "transac_ajax.php?q=" + "", true);
      //         xmlhttp.send();
      // }
      
      function fillIn(){
        var xmlhttp = new XMLHttpRequest();
        var string=document.getElementById("phno");
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    //console.log("hi"+this.responseText);
                    var response=this.responseText;
                    console.log(this.responseText);
                      var arr=response.split(";");
                      document.getElementById('name').value=arr[0];
                      document.getElementById('email_id').value=arr[1];
                      document.getElementById('addr').value=arr[2];
                      console.log(arr[0]);
                  }
              };
              xmlhttp.open("GET", "fillIn_ajax.php?a=" + string, true);
              xmlhttp.send();
      }
      </script>

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Hope</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>


    </nav>  <!-- Top Nav bar ends here -->

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="index.html">
           <i class="fas fa-school"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="food.html">
            <i class="fas fa-utensils"></i>
            <span>Food </span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="medication.html">
            <i class="fas fa-prescription-bottle-alt"></i>
            <span>Medication</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="person_locator.html">
            <i class="fas fa-user-friends"></i>
            <span>Person Finder</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my_status.html">
            <i class="fas fa-building"></i>
            <span>My status</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="need_help.html">
            <i class="fas fa-fw fa-child"></i>
            <span>I need help! </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="can_help.html">
            <i class="fas fa-fw fa-child"></i>
            <span>I can help! </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-donate"></i>
            <span>Donations</span></a>
        </li>
          <!-- <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>
          </div>
        </li> -->
        
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" style="font-size: 30px;color:black;">Medicine available near you </li>
          </ol>
           
		  <?php
$host = "psql-hope.postgres.database.azure.com";
$database = "hope";
$user = "sumedh@psql-hope";
$password = "sumSVR@1";

// Initialize connection object.
$conn= pg_connect("host=$host dbname=$database user=$user password=$password");
if(!$conn)
	echo "Connection failed to the database";

$ph_no=$_POST["ph_no"];
$date=$_POST["date"];
$address=$_POST["address"];
$count=$_POST["count"];
$lat=$_POST["lat"];
$long=$_POST["long"];

$query="Insert into receive_med values('$ph_no','$date','$address','$count','$lat','$long')";

?> 

	<table width="1000" cellpadding="4" cellspacing="2" border="border">
	<tr>
        <th style="background-color:orange;">Phone number</th>
		<th style="background-color:orange;">Date</th>
		<th style="background-color:orange;">Address</th>
    <th style="background-color:orange;">Medicine Type</th>
		<th style="background-color:orange;">No. people - meds available for</th>

		<th style="background-color:orange;">Distance(km)</th>

		
	</tr>
<?php
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}
$query2=pg_query($conn,"Select * from offer_med");
?>
<script>
  var locations=[];
</script>
<?php

if(pg_query($conn, $query))
{
	while($row= pg_fetch_row($query2))
	{ 
		$dis=distance($row[5], $row[6], $lat, $long, "K");
		if($dis<0)
			$dis=-$dis;
	?>
    <script>
     locations.push([<?php echo $row[0];?>,<?php echo $row[5];?>,<?php echo $row[6];?>]);
      </script>
	<tr>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[0];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[1];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[2];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $row[3];?></center></td>
  <td style="background-color:#FFEBC5;"><center><?php echo $row[4];?></center></td>
	<td style="background-color:#FFEBC5;"><center><?php echo $dis?></center></td>
	</tr>
	<?php
	}
}
?>

</table>


<br/><br/>
  <div style="width:900px;height:400px;position:relative;left:5%;" id="map"></div>
                  <!-- <div class="container col-sm-offset-2 col-sm-8">
              <p> Choose the type of transaction: </p>
                <label class="radio-inline">
                  <input type="radio" name="typeof" value="money">Money -->
                <!-- <label class="radio-inline">
                  <input type="radio"  name="typeof" value="stock">Stock
                </label>
                  </div> -->
                   
            
        </center>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALw2fPTrMLpQXUsUtNEMhNHN4a7Z9Ks18&callback=initMap">
    </script>



    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;

      function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:12.945529899999999, lng:77.5694414},
          zoom: 6
        });


        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }


         
   

      for (i = 0; i < locations.length; i++) {  
         marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      }
      }



  // var locations = [
  //     [15.2689,76.3909]
  //   ];


  //     var marker = new google.maps.Marker({
  //   position: locations[0],
  //   map: map,
  //   title: 'Hello World!'
  // });

    
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

    </script>
  
  </body>

</html>



