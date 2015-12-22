<?php
/**
 * ユーザライブラリ
 */
class MY_user {

    public $_session;
    public $ci;
    // {{{ public cunction __construct()
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->ci =& get_instance();
        $this->_session = $this->ci->session->get_userdata();
        $this->ci->load->model( 'User' );
    }

    // }}}

    // {{{ public function is_login()
    /**
     * ログイン状態判定
     */
    public function is_login()
    {
        if ( isset( $this->_session['user_email'] ) && ! is_null( $this->_session['user_email'] ) ) {
            return true;
        }
        return false;
    }

    // }}}

    // {{{ public function set_login( $post )
    /**
     * ログイン状態にする
     * @params array $post  postデータ
     */
    public function set_login( $post )
    {
        $user = $this->ci->User->getByUserEmailAndPassword( $post['user_email'], $post['password'] );
        $user['is_logged_in'] = true;
        $this->ci->session->set_userdata( $user );
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
