<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 退会クラス
 */
class Dropuser extends MY_Controller {

    // {{{ public function __construct()
    /** 
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
        // モデルロード
        $this->load->model( 'Gamemoneylog' );
        // ログインしていなければログインページへリダイレクト
        if ( ! $this->my_user->is_login() ) {
            redirect( 'login' );
        }
    }

    // }}}

    // {{{ public function index()
    /**
     * 退会ページ
     */
    public function index()
    {
        $is_posted = false;
        if ( $this->input->post( 'submit' ) ) {
            $is_posted = true;
            // 論理削除
            $this->User->delete( $this->_user['user_id'] );
            $this->Gamemoney->delete( $this->_user['user_id'] );
            $this->session->sess_destroy();
        }
        $this->smarty->assign( 'is_posted', $is_posted );
        $this->view( __FUNCTION__ );
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
