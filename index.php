<!DOCTYPE html>
<html >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		table, th, td {
			border:1px solid black;
			padding:10px 10px 10px 10px ;
			text-align: center;
		}
	</style>
	<title>Zadanie_2</title>
</head>
<body>
<?php
require_once 'inc/config.php';





$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "zadanie_2";


try {

		if ( isset( $conn ) ) {
			$stmt = $conn->prepare("SELECT * FROM duplicates");
		}
		if ( ! empty( $stmt ) ) {
			$stmt->execute();
		}

	#	// set the resulting array to associative
	if ( ! empty( $stmt ) ) {
		$result = $stmt->FetchAll(PDO::FETCH_ASSOC);
	}
		echo "<table>";
		echo "<tr><th>Id</th><th>Value</th></tr>";
	if ( isset( $result ) ) {
		foreach ($result as $row) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['value'] . "</td>";
			echo "</tr>";
		}
	}
		$conn = null;
		echo "</table>";
	}
	catch(PDOException $e) {
		$error = date('j M Y, G:i') . PHP_EOL;
		$error .= '*****************'	.	PHP_EOL;
		$error .= $e->getMessage() . PHP_EOL;
		file_put_contents('inc/log.txt',$error.PHP_EOL, FILE_APPEND);
	}

