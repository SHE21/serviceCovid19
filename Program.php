<?php
/**
 * 
 */
class Program
{
	public $file_data_csv;//entrada de dados csv
	public $file_out_geo_data;//SAÍDA de dados geografico
	public $file_in_geo_data;//ENTRADA de dados geografico
	public $properties_row;
	public $date;

	public $jsonFinal;//String final geojson com dados csv
	
	function __construct($file_data_csv,$file_in_geo_data,$file_out_geo_data,$date, $properties_row)
	{
		$this->file_data_csv = $file_data_csv;
		$this->file_out_geo_data = $file_out_geo_data;
		$this->file_in_geo_data = $file_in_geo_data;
		$this->date = $date;
		$this->properties_row = $properties_row;
		$this->jsonFinal = $this->getGeoJson();
	}

	public function getGeoJson()
	{
		$superArray = FileManager::mainFile($this->file_data_csv);

		if ($superArray!=null) {
			$geo = file_get_contents($this->file_in_geo_data);//aquivo com dados geograficos em geojson
			$jsonDaGeo = json_decode($geo);//transforma o arquivo em um objeto json
			$features = $jsonDaGeo->features;//

			$featArray = Process::getArrayFeatures($features, $superArray, $this->properties_row);

			$geojson = new GeoJson($featArray, $this->date, 1);

			$this->jsonFinal = json_encode($geojson, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);

			return $this->jsonFinal;

		}else{
			$error = new ExceptionApp("FILE: CRIAÇÃO DO ARQUIVO", "exception");
			return json_encode(new GeoJson(null, null, $error));
		}
	}

	public function outFileGeoJson()
	{
		if ($this->file_out_geo_data!=null) {
			return FileManager::createFile($this->file_out_geo_data, stripcslashes($this->jsonFinal));

		}else{
			return "Does not have a directory to save the file";
		}
	}
}
?>