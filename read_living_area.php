<!DOCTYPE html>
<html>
<style type="text/css">

table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: center;
}
th {
background-color: #588c7e;
color: white;
}
</style>
<body>
<h4>Here is the Area List</h4> 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brms";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT serial_no,area_name FROM living_area";
$result = $conn->query($sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);
$conn->close();
?>
<table style="width:100% ">
  <thead>
    <th> Serial </th>
    <th> Area Name </th> 
  </thead>
  <tbody>
    <?php 
    foreach($files as $file): ?>
      <tr>
        <td><?php echo $file['serial_no'];?></td>
        <td><?php echo $file['area_name'];?></td>
      </tr>
    <?php endforeach ; ?>
  </tbody>
</body>
</html>

