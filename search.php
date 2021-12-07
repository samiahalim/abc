<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'brms';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if(ISSET($_POST['save'])){
$sql = "SELECT h.house_type,p.price, l.area_name
FROM house_type AS h
       LEFT JOIN living_area AS l 
               ON h.serial_fk = l.serial_no
       LEFT JOIN price AS p 
               ON l.serial_no = p.serial_fk_2";
$result = $con->query($sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);
$con->close();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Search Page</title>
		<style type="text/css">
			table {
					border-collapse: collapse;
					width: 100%;
					color: #588c7e;
					font-family: monospace;
					font-size: 15px;
					text-align: center;
				}
			th {
				background-color: #588c7e;
				color: white;
			}
		</style>
	</head>
	<body class="loggedin">
		<div>	
		<table style="width:100% ">
  		<thead>
  			<th> House Category </th> 
    		<th> Price </th> 
    		<th> Area </th>
    		
 		 </thead>
  		<tbody>
    		<?php foreach($files as $file): ?>
      		<tr>
      			<td><?php echo $file['house_type'];?></td>
        		<td><?php echo $file['price'];?></td>
        		<td><?php echo $file['area_name'];?></td>
        		
      		</tr>
    		<?php endforeach ; ?>
  		</tbody>
  	</div>
	</body>
</html>