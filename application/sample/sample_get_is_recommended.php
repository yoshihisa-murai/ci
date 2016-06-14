<?php 

/*
	This file will give you a sample on how to transfer data to Nihtan

	Summary:
		STEP 1: Include the Nihtan_API php class file
		STEP 2: Instantiate the Nihtan_API class
		STEP 3: Call the transfer_money_then_redirect() method

*/



// STEP 1: Include the Nihtan_API php class file and the Blowfish Encryption Class
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

// STEP 3: Call the transfer_money_then_redirect() method
// 		Provide the transfer amount in parameter 1 : Double(15,2)
// 		Provide the transfer method (either 'cash_in' or 'cash_out') in parameter 2 : String
$transfer_amount = 1;
$transfer_method = 'cash_in';

echo 'Has recommender? ' . $api->get_is_recommended();
echo '<br>';
echo 'Is valid recommender? ' . $api->validate_recommender('test124');


 ?>