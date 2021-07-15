<?php
    $uname = "";
    $pass = "";
    $err_uname = "";
    $err_pass = "";
    $hasErr = false;

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["uname"])){
            $hasErr =true;
        }
        else{
            $uname = $_POST["uname"];
        }

        if(!$hasErr){

            if($uname == "Ahanab" && $pass == "1234"){
                $_SESSION["uname"] = $uname;
                header("LOcation : dashBord.php");
            }
            else{
                echo "Invalid user name or password!";
            }
        }
    }
?>


<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            Name : <input type="text" name="uname">
            Passwword : <input type="password" name = "pass">
            <input type="submit" name="submit">
        </fieldset>

    </form>