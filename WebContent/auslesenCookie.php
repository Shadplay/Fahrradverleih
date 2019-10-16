<?php 
//Falls ein Cookie mit dem Namen email exisitert, dann speichere diesen und gib ihn als Rückgabewert aus
if(isset($_COOKIE['email'])) {
    $CookieMail = $_COOKIE['email'];
	echo $CookieMail;
}
?>