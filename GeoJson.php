<?php
/**
 * 
 */
class GeoJson 
{	
	public $status;
	public $type;
	public $name;
	public $date;
	public $crs;
	public $features;

	function __construct($features, $date, $status)
	{
		$this->status = $status;
		$this->type = "FeatureCollection";
		$this->name = "data_geo_ma";
		$this->date = $date;
		$this->crs = new Crs("name", new Properties("urn:ogc:def:crs:OGC:1.3:CRS84"));
		$this->features = $features;
	}
}
?>