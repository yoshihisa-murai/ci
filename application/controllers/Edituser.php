<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 登録情報変更クラス
 */
class Edituser extends MY_Controller {

    // {{{ public function __construct()
    /** 
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
        // ログインしていなければログインページへリダイレクト
        if ( ! $this->my_user->is_login() ) {
            $redirect_url = base_url() . strtolower( __CLASS__ );
            redirect( 'login?r=' . $redirect_url );
        }
    }

    // }}}

    // {{{ public function index()
    /**
     * トップページ
     */
    public function index()
    {

        $post = $this->input->post();
        $input['user_email'] = ( isset( $post['user_email'] ) ) ? $post['user_email'] : null;
        $input['nickname'] = ( isset( $post['nickname'] ) ) ? $post['nickname'] : null;
        $is_posted = false;
        if ( isset( $post['submit'] ) ) {
            unset( $post['submit'] );
            $this->_set_validation();
            if ( $this->form_validation->run() ) {
                $is_posted = true;
                $where = array( 'user_id' => $this->_user['user_id'] );
                $this->User->update( $post, $where );
                foreach( $input as $key => $value ) {
                    $data[$key] = $value;
                }
                // セッションデータ更新
                $this->session->set_userdata( $data );
            }
        }
        $this->smarty->assign( 'user', $this->_user );
        $this->smarty->assign( 'input', $input );
        $this->smarty->assign( 'is_posted', $is_posted );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ private function _set_validation()
    /**
     * バリデーション
     */
    private function _set_validation()
    {
        $this->form_validation->set_rules( "user_email", my_const::FORM_MAIL_ADDRESS, "valid_email|is_unique[user.user_email]" );
        $this->form_validation->set_rules( "nickname", my_const::FORM_NICKNAME, "trim|is_unique[user.nickname]" );
        $this->form_validation->set_rules( "password", my_const::FORM_PASSWORD, "trim|min_length[8]" );
        $this->form_validation->set_rules( "cpassword", my_const::FORM_CONFIRM_PASSWORD, "trim|matches[password]" );
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
