<?php

require 'connection.php';
require 'get_ip.php';
require 'UserInformation.php';
 if(isset($_POST["submit"])){
   $LatitudeValue = $_POST["latitude"];
   $LongitudeValue = $_POST["longitude"];
   $IPAdresseValue = get_ip_address();
$query=@unserialize(file_get_contents('http://ip-api.com/php/'.$IPAdresseValue));
if(isset($query))
{
    $OperatingSystem= UserInfo::get_os();
    $Browser = UserInfo::get_browser();
    $Device = UserInfo::get_device();
    $ISP = $query['isp']; 
    $Country = $query['country'];
    $RegionName = $query['regionName'];
    $City =  $query['city'];
    $ZIP = $query['zip'];


   $query = "INSERT INTO tb_data VALUES ('','$IPAdresseValue','$LatitudeValue','$LongitudeValue','$OperatingSystem','$Browser','$Device','$ISP','$Country','$RegionName','$City','$ZIP')";
   mysqli_query($conn,$query);
   echo 
   "
   <script>
   alert('The Location Parameters is sent');
   document.location.href='index.php';
   </script>

   "
   ;
 }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>IP Tracker</title>
</head>
<body onload="getLocation();">
   <form class="myForm" action="index.php" method="POST" autocomplete="off">
      <input type="hidden" name="latitude" value="">
      <input type="hidden" name="longitude" value="">
      <button type="submit" name="submit"> Go</button>
   </form>
   <script type="text/javascript">
      function getLocation()
      {
         if(navigator.geolocation)
         {
            navigator.geolocation.getCurrentPosition(showPosition,showError);
         }
      }

      function showPosition(position)
      {
         document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
         document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;

      }
      function showError(error)
      {
         switch(error.code)
         {
            case error.PERMISSION_DENIED:
               alert("You Must Allow The Request for GeoLocation");
               location.reload();
               break;
         }
      }
   </script>
</body>
</html>