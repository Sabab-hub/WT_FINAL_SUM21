<?php
	require_once 'models/db_config.php';
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$err_db="";
	$pass="";
	$err_pass="";
	$hasError=false;
	

        if (isset($_POST["btn_login"])){
		if(empty($_POST["uname"])){
			$hasError = true;
			$err_uname = "Username Required";
		}
		else{
			$uname = $_POST["uname"];
		}
		if(empty($_POST["pass"])){
			$hasError = true;
			$err_pass = "Password Required";
		}
		else{
			$pass = $_POST["pass"];
		}
		if(!$hasError){
			if(authenticateStudent($uname,$pass)){
				header("Location: dashboard.php");
			}
			$err_db = "Username password invalid";
		}
		
	}
	
	function insertStudent($name, $pass){
		$query = "insert into students values ('$name','$pass')";
		return execute($query);
		
	}
	function authenticateStudent($uname,$pass){
		$query = "select * from students where username='$uname' and password='$pass'";
		$rs = get($query);
		if(count($rs)>0){
			return true;
		}
		return false;
		
	}
	
	
	
?>