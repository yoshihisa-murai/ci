<?
$config['api_params']['public_key'] = '7b2bc08226811a42cbd5e70762aac5b7';
$config['api_params']['secret_key'] = '1b5515594819ffe711c3f9ae53e803d8';
$config['api_params']['meta'] = array(
			'client_id' => 'ModuleTest',
			'client_username' => 'ModuleTest',
			'fallback_url' => 'http://localhost/work_projects/Nihtan_Vendor_Module/',
			'receiver_url' => 'http://xxx.xxx.xxx.xxx/sample_receiver.php' // Point your domain or IP here then the path to the receiver php file
			);

if ( ENVIRONMENT !== 'production' ) {
    $config['iwallet_api'] = array(
        'cash_in_request_url' => 'https://test.iwl.world/api/MoneyRequest',
        'cash_out_request_url' => 'https://test.iwl.world/en/settlement.php',
        'user_name' => 'testHaciendaG082016',
        'password' => '047c9MHWD0U',
        'p_num' => '10028',
        'from_account' => '63576856',
        'bank_account' => '3469274',
    );
} else {
    $config['iwallet_api'] = array(
        'cash_in_request_url' => 'https://test.iwl.world/api/MoneyRequest',
        'cash_out_request_url' => 'https://test.iwl.world/en/settlement.php',
        'user_name' => 'testHaciendaG082016',
        'password' => '047c9MHWD0U',
        'p_num' => '10028',
        'from_account' => '63576856',
        'bank_account' => '3469274',
    );
}
