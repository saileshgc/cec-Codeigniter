<?php

function xlsBOF() {
	echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0); 
	return;
}

function xlsEOF(){
	echo pack("ss", 0x0A, 0x00);
	return;
}

function xlsWriteNumber($Row, $Col, $Value){
	echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
	echo pack("d", $Value);
	return;
}

function xlsWriteLabel($Row, $Col, $Value ) {
	$L = strlen($Value);
	echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
	echo $Value;
return;
}

function writeXlsCol($Row, $Col, $Value )
 {
   $Value=stripslashes($Value);
   if(is_numeric($Value))
     xlsWriteNumber($Row, $Col, $Value);
   else
   xlsWriteLabel($Row, $Col, $Value);
   
 }

function removespaces($str)
 {
   return str_replace(" ","",$str);
 }