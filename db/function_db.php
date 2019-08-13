<?php
	include 'login_db.php';

	function get_cadastro($id){
		global $mysqli;
 		$query = "SELECT * FROM `cadastro` WHERE `cd_id` = '$id'";
		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);
		return $row;
	}

	function get_cadastros(){
		global $mysqli;
		$query = "SELECT * FROM `cadastro`";
		//$result = $mysqli->query($query);
		//$row = mysqli_num_rows($result);

	$result = $mysqli->query($query);
    while ($row = $result->fetch_object()){
        $user_arr[] = $row;
    }

		
		//$row = mysqli_fetch_array($result);
		return $user_arr;
	}

	
?>