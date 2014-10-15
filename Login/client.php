<?php
	//memulai 
	error_reporting(E_ALL);
	ini_set('display_error',1);
	session_start ( );
	
	//panggil library
	require_once('nusoap/lib/nusoap.php');
	
	//mendefinisikan alamat url service yang disediakan oleh client 
	$url = 'http://localhost/ws.git/Login/server.php?wsdl';
	
	$client = new nusoap_client($url, 'WSDL');
	
	//soapclient('http://localhost/Login/server.php?wsdl',true);
	$username = isset($_POST["username"]) ? $_POST["username"] : 'admin' ;
	$password = isset($_POST["password"]) ? $_POST["password"] : 'admin' ;
	$result = $client->call('login_ws', array('username'=>$username, 'password'=>$password));
	if ($result=="Login Berhasil") {
		$_SESSION['username'] = $username;
		//header ("location:index.php");
	} else{
		header ("location:login.php");
	}
?>
	