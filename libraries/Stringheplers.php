<?php
class Stringhelpers{

//Checks for title case in single words:
public static function isTitleCase($word){
	if(ucwords(strtolower($word))==$word){
		return true;
		}
	else
		{
		return false;
		}
	}


}

?>
