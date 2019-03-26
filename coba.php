<?php
// Check for the path elements
// Turn off error reporting
error_reporting(0);
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Report all errors
error_reporting(E_ALL);
// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$con=mysqli_connect("localhost","id7899380_tugas3","tugas3","id7899380_tugas3");
// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		
	$arr = array();
	$sql = "SELECT nim,nama,progdi FROM dt_mhs";
	$result = $con->query($sql);
	if ($result->num_rows> 0) 
		{
		// output data of each row
		while($row = $result->fetch_assoc()) {
echo "NIM: " . $row["nim"]. " - Nama: " . $row["nama"]. " - Progdi: " . $row["progdi"]. "<br>";
			$temp = array(
						"nim" => $row["nim"],
						"nama" =>$row["nama"],
						"progdi" => $row["progdi"]);
					array_push($arr, $temp);
		
		}
		} else {
		echo "0 results";
		}
	
	$con->close();
	$data = json_encode($arr);
	echo "{\"MENAMPILKAN DATA MAHASISWA dengan format JSON\":" . $data . "}";
	}

?>