<?php 

/*

	This file will give you a sample on how to get a Client's Credits from Nitan

	Summary:
		STEP 1: Include the Nihtan_API php class file
		STEP 2: Instantiate the Nihtan_API class
		STEP 3: get_nihtan_money() method

*/



// STEP 1: Include the Nihtan_API php class file
include 'lib/StringEncrypter.php'; 
include 'lib/Nihtan_API.php'; 

// Step 2: Instantiate the Nihtan_API class. On its constructor:
// 		Provide the public key on parameter 1 : String
// 		Provide the secret key on parameter 2 : String
// 		Provide the metadata on parameter 3 : Array
// 			'client_id' => The client username
// 			'client_username' => The client nicname/first name. This will be used in addressing the player/client on the game
// 			'fallback_url' => The URL in where the user will be redirected along with a GET response when the server returns an error
// 			'receiver_url' => The URL in where we will send the transfer money that we received and successfully transacted so that you can deduct/add funds in your end
$params['public_key'] = '7b2bc08226811a42cbd5e70762aac5b7';
$params['secret_key'] = '1b5515594819ffe711c3f9ae53e803d8';
$params['meta'] = array(
			'client_id' => 'ModuleTest',
			'client_username' => 'ModuleTest',
			'fallback_url' => 'http://localhost/work_projects/Nihtan_Vendor_Module/',
			'receiver_url' => 'http://xxx.xxx.xxx.xxx/sample_receiver.php' // Point your domain or IP here then the path to the receiver php file
			);

$api = new Nihtan_API($params); 

// STEP 3: Call the get_nihtan_money() method
//		Returns the client's money in Nihtan
echo $api->get_nihtan_money();


 ?>