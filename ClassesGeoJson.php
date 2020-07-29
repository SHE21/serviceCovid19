<?php
/**
 * 
 */
class Crs
{	public $type;
	public $properties;
	
	function __construct($type, $properties)
	{
		$this->type = $type;
		$this->properties = $properties;
	}
}

/**
 * 
 */
class Properties
{
	public $name;
	
	function __construct($name)
	{
		$this->name = $name;
	}
}
?>