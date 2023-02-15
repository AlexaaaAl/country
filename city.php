<?php
$connect = mysqli_connect('localhost', 'root', '' , 'region');
if ( $connect->connect_errno ) {

	echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	die();

}

$id   = (int)$_POST['id'];
$type = $_POST['type']; 
sleep(1);
if ($type == 'city') {
	
	$result = $connect->query('SELECT * 
    	                   FROM city 
    	                   WHERE region_id = '.$id.' 
    	                   ORDER BY name');
	if (!empty($result)) {
		echo "out.options[out.options.length] = new Option('выберите город...','none');\n";
		while ($city = mysqli_fetch_array($result)) {
			echo "out.options[out.options.length] = new Option('".$city['name']."','".$city['city_id']."');\n";
		}
	}
	else {
		echo "out.options[out.options.length] = new Option('нет городов','none');\n";
	}
}
if ($type == 'region') {
	$result = $connect->query('SELECT * 
    	                    FROM region 
    	                    WHERE country_id = '.$id.' 
    	                    ORDER BY name');
	if (!empty($result)) {
		echo "out.options[out.options.length] = new Option('выберите регион...','none');\n";
		while ($region = mysqli_fetch_array($result)) {
			echo "out.options[out.options.length] = new Option('".$region['name']."','".$region['region_id']."');\n";
		}
	}
	else {
		echo "out.options[out.options.length] = new Option('нет регионов','none');\n";
	}
}
?>