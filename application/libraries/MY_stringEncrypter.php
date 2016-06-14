<?php
/**
 * This class converts a UTF-8 string into a cipher string, and vice versa.
 * It uses 128-bit AES Algorithm in Cipher Block Chaining (CBC) mode with a UTF-8 key
 * string and a UTF-8 initial vector string which are hashed by MD5. PKCS7 Padding is used
 * as a padding mode and binary output is encoded by Base64.
 * 
 */
class MY_stringEncrypter
{
	const STRENCRYPTER_BLOCK_SIZE		= 16 ;	// 16 bytes

	private $key;
	private $initialVector;

	private $defaultKey = "Bluefrog";
	private $defaultIV = "Bluefrog";

	/**
	 * Creates a StringEncrypter instance.
	 * 
	 * key: A key string which is hashed by MD5.
	 *      It must be a non-empty UTF-8 string.
	 * initialVector: An initial vector string which is hashed by MD5.
	 *                It must be a non-empty UTF-8 string.
	 */

	public function __construct() {
		// Initialize an encryption key and an initial vector.
		$this->key = md5 ($this->defaultKey, TRUE) ;
		$this->initialVector = md5 ($this->defaultIV, TRUE) ;
	}

	public function set_key_iv($key, $initialVector) {
		if ( !is_string ($key) or $key == "" )
			throw new Exception ("The key must be a non-empty string.") ;

		if ( !is_string ($initialVector) or $initialVector == "" )
			throw new Exception ("The initial vector must be a non-empty string.") ;

		// Initialize an encryption key and an initial vector.
		$this->key = md5 ($key, TRUE) ;
		$this->initialVector = md5 ($initialVector, TRUE) ;
	}

	/**
	 * Encrypts a string.
	 * 
	 * value: A string to encrypt. It must be a UTF-8 string.
	 *        Null is regarded as an empty string.
	 * return: An encrypted string.
	 */
	public function encrypt ($value)
	{
		if ( is_null ($value) )
			$value = "" ;

		if ( !is_string ($value) )
			throw new Exception ("A non-string value can not be encrypted.") ;


		// Append padding
		$value = self::toPkcs7 ($value) ;

		// Encrypt the value.
		$output = mcrypt_encrypt (MCRYPT_RIJNDAEL_128, $this->key, $value, MCRYPT_MODE_CBC, $this->initialVector) ;

		// Return a base64 encoded string of the encrypted value.
		return base64_encode ($output) ;
	}

	/**
	 * Decrypts a string which is encrypted with the same key and initial vector. 
	 * 
	 * value: A string to decrypt. It must be a string encrypted with the same key and initial vector.
	 *        Null or an empty string is not allowed.
	 * return: A decrypted string
	 */
	public function decrypt ($value)
	{
		if ( !is_string ($value) or $value == "" )
			throw new Exception ("The cipher string must be a non-empty string.") ;


		// Decode base64 encoding. 
		$value = base64_decode ($value) ;

		// Decrypt the value.
		$output = mcrypt_decrypt (MCRYPT_RIJNDAEL_128, $this->key, $value, MCRYPT_MODE_CBC, $this->initialVector) ;

		// Strip padding and return.
		return self::fromPkcs7 ($output) ;
	}

	/**
	 * Encodes data according to the PKCS7 padding algorithm. 
	 * 
	 * value: A string to pad. It must be a UTF-8 string.
	 *        Null is regarded as an empty string.
	 * return: A padded string
	 */
	private static function toPkcs7 ($value)
	{
		if ( is_null ($value) )
			$value = "" ;

		if ( !is_string ($value) )
			throw new Exception ("A non-string value can not be used to pad.") ;


		// Get a number of bytes to pad.
		$padSize = self::STRENCRYPTER_BLOCK_SIZE - (strlen ($value) % self::STRENCRYPTER_BLOCK_SIZE) ;

		// Add padding and return.
		return $value . str_repeat (chr ($padSize), $padSize) ;
	}

	/**
	 * Decodes data according to the PKCS7 padding algorithm. 
	 * 
	 * value: A string to strip. It must be an encoded string by PKCS7.
	 *        Null or an empty string is not allowed.
	 * return: A stripped string
	 */
	private static function fromPkcs7 ($value)
	{
		if ( !is_string ($value) or $value == "" )
			throw new Exception ("The string padded by PKCS7 must be a non-empty string.") ;

		$valueLen = strlen ($value) ;

		// The length of the string must be a multiple of block size.
		if ( $valueLen % self::STRENCRYPTER_BLOCK_SIZE > 0 )
			throw new Exception ("The length of the string is not a multiple of block size.") ;


		// Get the padding size.
		$padSize = ord ($value{$valueLen - 1}) ;

		// The padding size must be a number greater than 0 and less equal than the block size.
		if ( ($padSize < 1) or ($padSize > self::STRENCRYPTER_BLOCK_SIZE) )
			throw new Exception ("The padding size must be a number greater than 0 and less equal than the block size.") ;

		// Check padding.
		for ($i = 0; $i < $padSize; $i++)
		{
			if ( ord ($value{$valueLen - $i - 1}) != $padSize )
				throw new Exception ("A padded value is not valid.") ;
		}

		// Strip padding and return.
		return substr ($value, 0, $valueLen - $padSize) ;
	}
}
?>
