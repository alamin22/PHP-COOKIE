<?php
		try {
		$Sourch="mysql:dbhost=localhost;dbname=phpproject";
        $User="root";
        $password="";
        $DB=new pdo($Sourch,$User,$password);

		} catch (PDOException $e) {
			echo"Failed".$e->getMessage();
		}


?>