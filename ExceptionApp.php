<?php
/**
 * 
 */
class ExceptionApp
{	
	public $erro_type;
	public $msn;
	
	function __construct($erro_type, $msn)
	{
		$this->$erro_type = $erro_type;
		$this->$msn = $msn;
	}

}
?>