<?php
/*

Bluefrog Contents and Support Inc.
Transfer Library

This class is used to transfer data to Nihtan.

*/

date_default_timezone_set('Asia/Hong_Kong');

class MY_nihtanApi {

public $public_key;
public $secret_key;
public $meta;
public $ci;

	/* Live */
	// private $api_url = "http://nihtan.com/server_api/provider/api_transfer.php";

	/* Staging */
	private $api_url = "http://www.nihtan.com/server_api/a/provider/api_transfer.php";

	protected $encryption_key = 'Bluefrog';
	
	public function __construct($params) {
    $this->_config =& get_config(); 
    $this->ci =& get_instance();
    $this->ci->load->library( 'MY_stringEncrypter' );
		$this->public_key = $this->_config['api_params']['public_key'];
		$this->secret_key = $this->_config['api_params']['secret_key'];
		$this->meta = $params['meta'];
	}

	public function transfer_money_then_redirect($transfer_amount, $transfer_method, $recommender_id = '') {

		$encryptor = $this->ci->my_stringencrypter;
		$encryptor->set_key_iv($this->encryption_key, $this->encryption_key);
		$onetime_access_key = md5(rand() . $this->secret_key . rand()) . md5(rand() . $this->secret_key . rand()) . uniqid();

		$encrypted['vendorKey'] = $encryptor->encrypt($this->public_key);
		$encrypted['vendorSecret'] = $encryptor->encrypt($this->secret_key . 'z' . $onetime_access_key . 'z' . time());
		$encrypted['transfer_method'] = $encryptor->encrypt($transfer_method);
		$encrypted['transfer_amount'] = $encryptor->encrypt(strval($transfer_amount));
		$encrypted['client_id'] = $encryptor->encrypt($this->meta['client_id']);
		$encrypted['client_nickname'] = $encryptor->encrypt($this->meta['client_username']);
		$encrypted['vendor_receiver_url'] = $encryptor->encrypt($this->meta['receiver_url']);
		$encrypted['fallbackURL'] = $this->meta['fallback_url'];
		$encrypted['recommender_id'] = $encryptor->encrypt($recommender_id);
		$encrypted['recommender_name'] = 'thisfieldtobedeleted';

		$transfer = curl_init();

		curl_setopt($transfer, CURLOPT_URL, $this->api_url);
		curl_setopt($transfer, CURLOPT_POST, true);
		curl_setopt($transfer, CURLOPT_POSTFIELDS, http_build_query($encrypted));
		curl_setopt($transfer, CURLOPT_FOLLOWLOCATION, true);

		curl_exec($transfer);

	}

	public function get_nihtan_money() {

		$encryptor = $this->ci->my_stringencrypter;
		$encryptor->set_key_iv($this->encryption_key, $this->encryption_key);
		$onetime_access_key = md5(rand() . $this->secret_key . rand()) . md5(rand() . $this->secret_key . rand()) . uniqid();

		$encrypted['vendorKey'] = $encryptor->encrypt($this->public_key);
		$encrypted['vendorSecret'] = $encryptor->encrypt($this->secret_key . 'z' . $onetime_access_key . 'z' . time());
		$encrypted['transfer_method'] = $encryptor->encrypt('find_cash');
		$encrypted['transfer_amount'] = $encryptor->encrypt(strval(0));
		$encrypted['client_id'] = $encryptor->encrypt($this->meta['client_id']);
		$encrypted['client_nickname'] = $encryptor->encrypt($this->meta['client_username']);
		$encrypted['vendor_receiver_url'] = $encryptor->encrypt($this->meta['receiver_url']);
		$encrypted['fallbackURL'] = $this->meta['fallback_url'];

		$find_cash = curl_init();

		curl_setopt($find_cash, CURLOPT_URL, $this->api_url);
		curl_setopt($find_cash, CURLOPT_POST, true);
		curl_setopt($find_cash, CURLOPT_POSTFIELDS, http_build_query($encrypted));
		curl_setopt($find_cash, CURLOPT_RETURNTRANSFER, true);

		$found_cash = curl_exec($find_cash);

		return $found_cash;
		
	}

	public function get_is_recommended() {

		$encryptor = $this->ci->my_stringEncrypter;
		$encryptor->set_key_iv($this->encryption_key, $this->encryption_key);
		$onetime_access_key = md5(rand() . $this->secret_key . rand()) . md5(rand() . $this->secret_key . rand()) . uniqid();

		$encrypted['vendorKey'] = $encryptor->encrypt($this->public_key);
		$encrypted['vendorSecret'] = $encryptor->encrypt($this->secret_key . 'z' . $onetime_access_key . 'z' . time());
		$encrypted['transfer_method'] = $encryptor->encrypt('is_recommended');
		$encrypted['transfer_amount'] = $encryptor->encrypt(strval(0));
		$encrypted['client_id'] = $encryptor->encrypt($this->meta['client_id']);
		$encrypted['client_nickname'] = $encryptor->encrypt($this->meta['client_username']);
		$encrypted['vendor_receiver_url'] = $encryptor->encrypt($this->meta['receiver_url']);
		$encrypted['fallbackURL'] = $this->meta['fallback_url'];

		$has_recommender = curl_init();

		curl_setopt($has_recommender, CURLOPT_URL, $this->api_url);
		curl_setopt($has_recommender, CURLOPT_POST, true);
		curl_setopt($has_recommender, CURLOPT_POSTFIELDS, http_build_query($encrypted));
		curl_setopt($has_recommender, CURLOPT_RETURNTRANSFER, true);

		return curl_exec($has_recommender);
		
	}

	public function validate_recommender($recommender_id) {

		$encryptor = $this->ci->my_stringEncrypter;
		$encryptor->set_key_iv($this->encryption_key, $this->encryption_key);
		$onetime_access_key = md5(rand() . $this->secret_key . rand()) . md5(rand() . $this->secret_key . rand()) . uniqid();

		$encrypted['vendorKey'] = $encryptor->encrypt($this->public_key);
		$encrypted['vendorSecret'] = $encryptor->encrypt($this->secret_key . 'z' . $onetime_access_key . 'z' . time());
		$encrypted['transfer_method'] = $encryptor->encrypt('validate_recommender');
		$encrypted['transfer_amount'] = $encryptor->encrypt(strval(0));
		$encrypted['client_id'] = $encryptor->encrypt($this->meta['client_id']);
		$encrypted['client_nickname'] = $encryptor->encrypt($this->meta['client_username']);
		$encrypted['vendor_receiver_url'] = $encryptor->encrypt($this->meta['receiver_url']);
		$encrypted['fallbackURL'] = $this->meta['fallback_url'];
		$encrypted['recommender_id'] = $encryptor->encrypt($recommender_id);
		$encrypted['recommender_name'] = $encryptor->encrypt('none');

		$recommender_curl = curl_init();

		curl_setopt($recommender_curl, CURLOPT_URL, $this->api_url);
		curl_setopt($recommender_curl, CURLOPT_POST, true);
		curl_setopt($recommender_curl, CURLOPT_POSTFIELDS, http_build_query($encrypted));
		curl_setopt($recommender_curl, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($recommender_curl);

		return $response;
		
	}

}

 ?>
