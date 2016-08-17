<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * トップページクラス
 */
class Top extends MY_Controller {

    //private $_params;
    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
        // モデルロード
        $this->load->model( 'Gamemoneylog' );
        $params['public_key'] = '7b2bc08226811a42cbd5e70762aac5b7';
        $params['secret_key'] = '1b5515594819ffe711c3f9ae53e803d8';
        $params['meta'] = array(
                'client_id' => 'ModuleTest',
                'client_username' => 'ModuleTest',
                'fallback_url' => 'nihtanapp://',
                'receiver_url' => 'http://test.planx.jp/casino/top' 
        );

        //var_dump($this->_params);
        $this->load->library( 'MY_nihtanApi', $params );
    }

    // }}}

    // {{{ public function index()
    /**
     * トップページ
     */
    public function index()
    {
        $link_to_play = "#";
        if ( $this->agent->is_iOS() ) {
            $link_to_play = "https://build.phonegap.com/apps/2064697/install/eXMsbS-4RzNvKNKS3-AK";
        } elseif ( $this->agent->is_androidOS() ) {
            $link_to_play = "http://www.nihtan.com/download/.Nihtan-release.apk";
        } 
        $this->smarty->assign( 'link_to_play', $link_to_play );
        $this->smarty->assign( 'is_login', $this->_is_login );
        $this->smarty->assign( 'user', $this->_user );
        $this->smarty->assign( 'form_style', array( 'style' => 'margin-top:10px;' ) );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function playapi()
    /**
     * API起動(ゲーム起動用)
     */
    public function playapi()
    {
        $transfer_amount = 0;
        $transfer_method = 'cash_in';
        $this->my_nihtanapi->transfer_money_then_redirect( $transfer_amount, $transfer_method, 'test1234' );
    }

    // }}}
}
/**
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: sw=4 ts=4 fdm=marker
 * vim<600: sw=4 ts=4
 */
