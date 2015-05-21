<?php
class CSRF{

	public static function generate(){
		return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
	}
	function check($token){
		if(isset($_SESSION['token']) && $token == $_SESSION['token']){
			unset($_SESSION['token']);
			return true;
		}
		return false;
	}
}
?>