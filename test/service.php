<?php 
	// header("content-type:text/html;charset=utf-8");

	function socket($to_uid,$info)
	{
		// 推送的url地址，上线时改成自己的服务器地址
		$push_api_url = "http://127.0.0.1:2121";
		$post_data = array(
			"type" => "publish",
			"content" => $info,
			"to" => $to_uid,
		);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
		curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
		$return = curl_exec ( $ch );
		curl_close ( $ch );

		return $return;
	}
$a=socket('eson','pettey face');
var_dump($a);