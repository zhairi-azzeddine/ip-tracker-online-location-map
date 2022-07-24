<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>List Location</title>
   <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="tbl-header">
   <table cellpadding="0" cellspacing="0" border="0">
      <thead>
      <tr>
         <td> Identifier Location</td>
         <td> IP Adresse</td>
         <td> Operating System</td>
         <td> Browser </td>
         <td> Device</td>
         <td> ISP</td>
         <td> Latitude Ligne</td>
         <td> Longitude Ligne</td>
         <td> Country</td>
         <td> Region</td>
         <td> City</td>
         <td> ZIP Code</td>
         <td> Localisation in Maps</td>
      </tr>
      </div>
      </thead>

     
      <?php
      require 'connection.php';
      $rows = mysqli_query($conn,"SELECT * FROM tb_data ORDER BY identifier_location DESC");
      $i=1;
      foreach($rows as $row) :
      ?>

<tbody>
   
<tr>
         <td> <?php echo $i++ ?></td>
         <td> <?php echo $row["internet_protocole__location"]; ?></td>
         <td> <?php echo $row["operating System"]; ?></td>
         <td> <?php echo $row["browser"]; ?> </td>
         <td> <?php echo $row["device"]; ?></td>
         <td> <?php echo $row["isp"]; ?></td>
         <td> <?php echo $row["latitude_location"]; ?></td>
         <td> <?php echo $row["longitude_location"]; ?></td>
         <td> <?php echo $row["country"]; ?></td>
         <td> <?php echo $row["region"]; ?></td>
         <td> <?php echo $row["city"]; ?></td>
         <td> <?php echo $row["zip"]; ?></td>
         <td style="width: 450px; height: 450px"><iframe src='https://www.google.com/maps?q=<?php echo $row["latitude_location"]; ?>,<?php echo $row["longitude_location"]; ?>&hl=es;z=14&output=embed' style = "width: 100%; height: 100%;" ></iframe></td>
      </tr>
      <?php endforeach; ?>;
         </tbody>
      




   </table>
         
</body>

</html>