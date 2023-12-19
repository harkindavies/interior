<?php
	$mypassword = 'what_i_enter';
	$hash1 = password_hash($mypassword,PASSWORD_DEFAULT);
	echo $hash1.'<br/>';
	if (password_verify($mypassword, $hash1)) {
		# code...
		echo"password match<br/>";
	}
	else{
		echo "Password not match<br/>";
	}


//example 2
$option = [
'cost'=> 8,
];
$hash2 = password_hash($mypassword, PASSWORD_BCRYPT, $option);
echo $hash2.'<br/>';
if (password_verify($mypassword, $hash2)) {
		# code...
		echo"password match<br/>";
	}
	else{
		echo "Password not match<br/>";
	}

//example 3
$timeTarget = 0.50;

$cost = 8;
do{
	$cost++;
	$start = microtime(true);
	$hash3= password_hash($mypassword, PASSWORD_BCRYPT, ["cost"=>$cost]);
	$end = microtime(true);
}
while (($end - $start) < $timeTarget);
	echo "appreciate cost found: ".$cost.'<br/>';

	if (password_verify($mypassword, $hash3)) {
		# code...
		echo"password match<br/>";
	}
	else{
		echo "Password not match<br/>";
	}


//example 4
$hash4 = password_hash($mypassword, PASSWORD_ARGON2I);
echo 'argon2i password hashing    '.$hash4.'<br/>';
if (password_verify('$mypassword', $hash4)) {
		# code...
		echo"password match<br/>";
	}
	else{
		echo "Password not match<br/>";
	}
	
?>