<?php
    include 'models/db_config.php';
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$email="";
	$err_email="";
	$password="";
	$err_password="";
	$err_db="";
	
	$hasError=false;
	
	if(isset($_POST["sign_up"])){
		if(empty($_POST["name"])){
			$hasError = true;
			$err_name="Name Required";
		}
		else{
			$name = $_POST["name"];
		}

		if(empty($_POST["uname"])){
			$hasError = true;
			$err_uname="Username Required";
		}
		else{
			$uname = $_POST["uname"];
		}
	
	
	if(empty($_POST["email"])){
			$hasError = true;
			$err_email="Email Required";
		}
		else{
			$email = $_POST["email"];
		}
		
		if(empty($_POST["password"])){
			$hasError = true;
			$err_password="Password Required";
		}
		else{
			$password = $_POST["password"];
		}
		if(!$hasError){
		$rs = insertUser($name,$uname,$_POST["email"],$_POST["password"]);
        if ($rs === true){
			header("location: login.php");
			
		}
		$err_db = $rs;
        }
    }
	else if (isset($_POST["btn_login"])){
		if(empty($_POST["uname"])){
			$hasError = true;
			$err_uname="Username Required";
		}
		else{
			$uname = $_POST["uname"];
		}
		if(empty($_POST["password"])){
			$hasError = true;
			$err_password="Password Required";
		}
		else{
			$password = $_POST["password"];
		}
		if(!$hasError){
			if(authenticateUser($uname,$password)){
				header("Location: dashboard.php");
			}
		    $err_db = "Username password invalid";
		}
		
		
	}

    function insertUser($name,$uname,$uemail,$upass){
        $query="insert into users values (NULL,'$name','$uname','$email','$password')";
		return execute($query);
	}
	
	function authenticateUser($uname,$password){
		$query = "select * from users where username='$uname' and password='$password'";
		$rs = get($query);
		if(count($rs)>0){
			return true;
		}
		return false;
		
	}
	?>