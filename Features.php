<?php
/**
 * Fetautes de dados
 */
class Features
{
	public $type;
	public $properties;
	public $geometry;


	function __construct($type, $properties, $geometry)
	{
		$this->type = $type;
		$this->properties = $properties;
		$this->geometry = $geometry;
	}
}
?>