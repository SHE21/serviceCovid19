<?php
header('Content-type:application/json;');
include_once 'GeoJson.php';
include_once 'ClassesGeoJson.php';
include_once 'FileManager.php';
include_once 'Process.php';
include_once 'ExceptionApp.php';
include_once 'Program.php';

if (isset($_GET['day']) && isset($_GET['month'])) {
	$DAY = $_GET['day'];
	$MONTH = $_GET['month'];

	if ($DAY!=0 && $DAY !=null) {

		if ($MONTH!=0 && $MONTH !=null) {

			$DATE = $DAY."/".$MONTH."/2020";

			$GEOJSON = 'data/json/data_geo_ma.geojson';
			$CSV = "data/csv/".$MONTH."/data_".$DAY."_".$MONTH."_2020.csv";
			$OUTJSON = 'data/json/teste.geojson';

			$PROPS = array('geocodigo', 'municipio', 'confirmados', 'obitos');

			$program = new Program($CSV, $GEOJSON, $OUTJSON, $DATE, $PROPS);

			//echo $program->outFileGeoJson();
			echo $program->getGeoJson();

		}else{
			$error = new ExceptionApp("GET:MAL FORMADO", "malformed protocol");
			echo json_encode(new GeoJson(null, null, $error));
		}

	}else{
		$error = new ExceptionApp("GET:MAL FORMADO", "malformed protocol");
		echo json_encode(new GeoJson(null, null, $error));
	}

}else{
	$error = new ExceptionApp("GET:VARIAVEL INEXISTE", "there is no GET method in the protocol.");
	echo json_encode(new GeoJson(null, null, $error));
}

?>