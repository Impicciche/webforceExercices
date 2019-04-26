<?php 

function CreateSimpleToken(){
	return bin2hex(random_bytes(32));
}

echo "<br>CreateSimpleToken: " .CreateSimpleToken()."<br>";

function CreateToken(){
	$cipher = "aes-128-gcm";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $key = gethostname();
    $UniqId = bin2hex(random_bytes(32));
    echo "UniqId $UniqId<br/>";
    $ciphertext = openssl_encrypt($UniqId, $cipher, $key, $options=0, $iv, $tag);
	return [$ciphertext,$cipher,$iv, $tag];
}

$Token = CreateToken();
var_dump($Token);

function DecryptToken($TokenToValidate) {
	return openssl_decrypt($TokenToValidate[0], $TokenToValidate[1], gethostname(), $options=0, $TokenToValidate[2], $TokenToValidate[3]);
}



//echo openssl_decrypt($Token[0], $Token[1], gethostname(), $options=0, $Token[2], $Token[3]);

echo DecryptToken($Token);
?>
