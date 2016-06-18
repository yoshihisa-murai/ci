<?php
/**
 * エラーコードクラス
 */
class MY_errCode
{
	public $message_title;
	public $message_detail;

	public function __construct( $params = array() )
	{
    // FIXME:これ絶対に通らない処理。先にfatalが走る
		if( empty( $params['error_id'] ) )
		{
			$this->message_title = "エラーが発生しました。";
			$this->message_detail = "予期せぬエラーが発生しました。<br />心当たりの無い場合はお問い合わせ下さい。";
		}
		else
		{
			if( $params['error_id'] == "1" )
			{
				//入金
				if( $params['cash_kind'] == 1 )
				{
					$this->message_title = "入金完了";
					$this->message_detail = "入金処理が完了致しました。引き続きネオカジノをお楽しみください。";
				}
				//出金
				if( $params['cash_kind'] == 2 )
				{
					$this->message_title = "出金完了";
					$this->message_detail = "出金処理が完了致しました。引き続きネオカジノをお楽しみください。";
				}
			}
			elseif( $params['error_id'] == "1x" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「1x」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "2" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「2」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "3" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「3」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "4" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「4」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "5x" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「5x」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "6" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「6」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "7x" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「7x」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "7a" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「7a」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "7b" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「7b」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "7c" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「7c」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "8" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「8」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "9" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「9」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			elseif( $params['error_id'] == "10" )
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = 'エラーコード「10」のエラーが発生しました。<a href="callcenter.php">こちらより</a>お問い合わせ下さい。';
			}
			else
			{
				$this->message_title = "エラーが発生しました。";
				$this->message_detail = "予期せぬエラーが発生しました。<br />心当たりの無い場合はお問い合わせ下さい。";
			}
		}
	}
}
