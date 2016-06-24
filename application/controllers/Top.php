<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * トップページクラス
 */
class Top extends MY_Controller {

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
        // モデルロード
        $this->load->model( 'Gamemoneylog' );
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

    // {{{ public function logout()
    /**
     * ログアウト
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect( 'top' );
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
