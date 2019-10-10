<?php 
if(isset($_POST['username'])) {
	echo $_POST['username']; 
} 
if (isset($_COOKIE['email'])) {
    $CookieMail = $_COOKIE['email'];
	echo $CookieMail;
}
?>