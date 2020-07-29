<?php
/**
 * 
 */
class Process
{

	public static function getArrayFeatures($features, $arrayFeat, $props)
	{
		$i = 0;
		$feature = array();

		$t = T::setProps($props, $arrayFeat);

		foreach ($features as $e){

			$e->properties = $t[$i];
			$e->geometry;

			$feature[$i] = $e;

			$i++;
		}

		return $feature;
	}
}

class T
{
	public static function setProps($prop, $data)
	{

		$result = array();

		for ($j=0; $j < count($data); $j++) { 

			$t = new T();

			$i = 0;
			foreach ($prop as $key) {
				$t->$key = $data[$j][$i];
				$i++;
			}
			$i = 0;

			$result[$j] = $t;
		}

		return $result;
	}
}

?>