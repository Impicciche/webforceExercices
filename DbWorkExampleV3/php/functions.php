<?php 


function ProcessUploadedFile($FileObj){
		$UpLoadDir = "../storage/";

		//var_dump($FileObj);
		//echo exec('whoami');
	
		$name = basename($_FILES["image"]["name"]);
        	move_uploaded_file($FileObj['tmp_name'], $UpLoadDir."/".$FileObj['name']);
		return $UpLoadDir."/".$FileObj['name'];
}        
        
        
function CreateToken(){
	$cipher = "aes-128-gcm";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $key = gethostname();
    $UniqId = bin2hex(random_bytes(32));
    //echo "UniqId $UniqId<br/>";
    $ciphertext = openssl_encrypt($UniqId, $cipher, $key, $options=0, $iv, $tag);
	return [$ciphertext,$cipher,$iv, $tag];
}

function DecryptToken($TokenToValidate) {
	return openssl_decrypt($TokenToValidate[0], $TokenToValidate[1], gethostname(), $options=0, $TokenToValidate[2], $TokenToValidate[3]);
}


