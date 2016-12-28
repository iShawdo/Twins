<?php 

function encrypt($string, $key) {
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return base64_encode($result);
}

function decrypt($string, $key) {
	$result = '';
	$string = base64_decode($string);
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}

function valida_rut($numRut, $Dv)
{
	$dv  = $Dv;
	$numero = $numRut;
	$i = 2;
	$suma = 0;
	foreach(array_reverse(str_split($numero)) as $v)
	{
		if($i==8)
			$i = 2;
		$suma += $v * $i;
		++$i;
	}
	$dvr = 11 - ($suma % 11);

	if($dvr == 11)
		$dvr = 0;
	if($dvr == 10)
		$dvr = 'K';
	if($dvr == strtoupper($dv))
		return true;
	else
		return false;
}

function validaRut($numrut, $dv){

	$rut = $numrut.'-'.$dv;
	if(strpos($rut,"-")==false){
		$RUT[0] = substr($rut, 0, -1);
		$RUT[1] = substr($rut, -1);
	}else{
		$RUT = explode("-", trim($rut));
	}
	$elRut = str_replace(".", "", trim($RUT[0]));
	$factor = 2;
	for($i = strlen($elRut)-1; $i >= 0; $i--):
		$factor = $factor > 7 ? 2 : $factor;
	$suma += $elRut{$i}*$factor++;
	endfor;
	$resto = $suma % 11;
	$dv = 11 - $resto;
	if($dv == 11){
		$dv=0;
	}else if($dv == 10){
		$dv="k";
	}else{
		$dv=$dv;
	}
	if($dv == trim(strtolower($RUT[1]))){
		return true;
	}else{
		return false;
	}
}

function my_ucfirst($string, $e ='utf-8') 
{ 
    if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string)) { 
        $string = mb_strtolower($string, $e); 
        $upper = mb_strtoupper($string, $e); 
        preg_match('#(.)#us', $upper, $matches); 
        $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e); 
    } 
    else 
    { 
        $string = ucfirst($string); 
    }

    return $string; 
} 



?>