<?php
	$postData = file_get_contents('php://input');
	$xml = simplexml_load_string($postData);
	$array = json_decode(json_encode((array)$xml),1);
	if(!empty($array)){
		if(isset($array['TrxStsCode']))
		{
			var_dump($_REQUEST['table']);
			echo $mdata = '<?xml version="1.0" encoding="UTF-8"?><rcemsTrxSubReqAck><TrxStsCode>'.$array["TrxStsCode"].'</TrxStsCode></rcemsTrxSubReqAck>';
		}
	}
	/*print_r('<pre>');
		var_dump($array);
	print_r('</pre>');*/
?>