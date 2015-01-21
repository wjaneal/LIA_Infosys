<?php
class Globalhelpers{
//Retrieves the global variable denoted by the key '$variable'
public static function showGlobal($variable){
	$info = DB::table('globals')->get();
	$returnvariable = 'error';
	foreach($info as $item){
		if($item->datakey == $variable || $item->datatext == $variable){
			$returnvariable = $item->datavalue; 
			}
		}
	return $returnvariable;
	}


}

?>
