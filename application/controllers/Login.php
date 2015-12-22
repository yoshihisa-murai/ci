<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ログインクラス
 */
class Login extends MY_Controller {

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
        if( $this->_user ) {
            redirect( 'top' );
        }
    }

    // }}}

    // {{{ public function index()
    /**
     * ログインページ
     */
    public function index()
    {
        // 別ページからリダイレクトしてきた場合ログイン後に元のページへ遷移
        $redirect_url = $this->input->get( 'r' ) ? $this->input->get( 'r' ) : 'top';
        $post = $this->input->post();
        $user_email = ( isset( $post['user_email'] ) ) ? $post['user_email'] : null;
        if ( $post ) {
            // ログイン成功ならセッションに保持してリダイレクト
            $this->_set_validation();
            if ( $this->form_validation->run() ) {
                // ログイン処理
                $this->my_user->set_login( $post );
                redirect( $redirect_url );
            }
        }
        $this->smarty->assign( 'redirect_url', $redirect_url );
        $this->smarty->assign( 'user_email', $user_email );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function validate_auth()
    /**
     * ログイン可否
     */
    public function validate_auth()
    {
        if ( $this->User->can_log_in() ) {
            return true;
        } else {
            $this->form_validation->set_message( 'validate_auth', my_const::INPUT_DATA_NOT_MATCH );
            return false;
        }
    }

    // }}}

    // {{{ public function logout()
    /**
     * ログアウ
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect( 'top' );
    }

    // }}}

    // {{{ private function _set_validation()
    /**
     * バリデーション
     */
    private function _set_validation()
    {
        $this->form_validation->set_rules( "user_email", my_const::FORM_MAIL_ADDRESS, "required|valid_email|callback_validate_auth" );
        $this->form_validation->set_rules( "password", my_const::FORM_PASSWORD, "required" );
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
