<?php
	function db_connect()
	{
		$db_user   = "sas";
		$db_pass   = "DHe4843cMYS";
		$db_dbname = "WarInc";
		$db_apikey = "ACOR4823G%sjYU*@476xnDvYaK@!56";
		
		$db_serverName     = "localhost,1433";
		$db_connectionInfo = array(
			"UID" => $db_user,
			"PWD" => $db_pass,
			"Database" => $db_dbname
			//"ReturnDatesAsStrings" => true
			);
		$conn = sqlsrv_connect($db_serverName, $db_connectionInfo);

		if(! $conn)
		{
			//echo "Connection could not be established.\n";
			//die( print_r( sqlsrv_errors(), true));

			header("location: /error-db-down.php");
			exit();
		}

		return $conn;
	}
	
	function db_exec($conn, $tsql, $params)
	{
		$stmt  = sqlsrv_query($conn, $tsql, $params);
		if(! $stmt)
		{
			echo "exec failed.\n";
			die( print_r( sqlsrv_errors(), true));
			//@header("location: login-failed.php");
		}

		$member = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
		return $member;
	}

	$conn = db_connect();
?>
