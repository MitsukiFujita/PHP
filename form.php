<?php
function parse_form(){
	global $in;
	$param = array();
	$param += $_POST;
	foreach($param as $key => $val){
		if(!is_array($val)){
			$enc = mb_detect_encoding($val);
			$val = mb_convert_encoding($val."UFT-8",$enc);
		
			$val = htmlentities($val,ENT_QUOTES,"UTF-8");
			
			$val = str_replace(",","&#44;", $val);
			
			$val = str_replace("¥r¥n","__kaigyou__", $val);
			$val = str_replace("¥r","__kaigyou__", $val);
			$val = str_replace("¥n","__kaigyou__", $val);
			
			$in[$key]=$val;
		}
	}
return $in;
}

parse_form();
$name = $in["name"];
echo "$name";