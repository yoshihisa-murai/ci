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
        $this->smarty->assign( 'is_login', $this->_is_login );
        $this->smarty->assign( 'user', $this->_user );
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
