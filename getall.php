<?php

	include_once("fonoapi-v1.php");

	$apiKey = "bb3a87692295af86bb016dfb6d02f5e119fdf28455c6f412"; // get your token key here - https://fonoapi.freshpixl.com
	$fonoapi = fonoApi::init($apiKey);
		try {
			$brand = "htc";
			$res = $fonoapi::getLatest($brand); // the device you need to get details here
			$file = 'PhoneResult/PhoneNames.txt';
			$counter = 0;
			foreach ($res as $mobile) {
				$counter += 1;
				if (!empty($mobile->DeviceName)) 	echo $counter.') '.$mobile->DeviceName . "<br>";

				// Open the file to get existing content
				$current = file_get_contents($file);
				// Append a new person to the file
				$current .= $counter.') '.$mobile->DeviceName."\n";
				// Write the contents back to the file
				file_put_contents($file, $current);
			/*	if (!empty($mobile->Brand)) 		echo "Brand : ". $mobile->Brand . "<br>";
				if (!empty($mobile->cpu)) 			echo "Cpu : " . $mobile->cpu . "<br>";
				if (!empty($mobile->status)) 		echo "Status : " . $mobile->status . "<br>";
				if (!empty($mobile->dimensions)) 	echo "Dimensions : " . $mobile->dimensions . "<br>";
				if (!empty($mobile->_4g_bands)) 	echo "4g : " .$mobile->_4g_bands . "<br>"; */
			}

		} catch (Exception $e) {
			echo "ERROR : " . $e->getMessage();
		}

?>
