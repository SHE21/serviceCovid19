<?php
/**
 * 
 */
class FileManager
{

	public static function createFile($filename, $data)
	{
	
		try {
			$file = fopen($filename, 'a');
			fwrite($file, $data);
			fclose($file);

			return 1;

		} catch (Exception $e) {
			return 0;
			
		}
	}

	public static function mainFile($file){
		$arquivo = fopen ($file, 'r');
		$result = array();
		$i = 0;

		try {

			if (!feof($arquivo)) {
				
				while(!feof($arquivo)){
					$linha = stripslashes(fgets($arquivo, 1024));

					$result[$i] = explode(";", str_replace("\n", "",$linha));
					$i++;
				}
			}

		return $result;
			
		} catch (Exception $e) {
			return null;
			
		}

		fclose($arquivo);
	}
}
?>