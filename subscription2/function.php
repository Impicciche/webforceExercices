<?php
/**
 * Created by PhpStorm.
 * User: etudiant
 * Date: 07/03/2019
 * Time: 12:31
 */


function encryptData($data)
{
    $cypher = "aes-256-cbc";
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypher));
    $key = base64_encode(gethostname());



    return openssl_encrypt($data,$cypher,$key,0,$iv);
}
?>


