<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // {{{ const

    protected $template;
    protected $_user;
    protected $_session;
    protected $_config;
    protected $_is_login;
    //public $_params;

    // }}}

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library( 'MY_User_agent', '', 'agent' );
        $this->smarty->template_dir = APPPATH . 'views/templates';
        $this->smarty->compile_dir  = APPPATH . 'views/templates_c';
//        $this->template = 'layout.tpl';
        $this->_config =& get_config(); 
        //$this->_params = array(        );

        $this->_session = $this->session->get_userdata();
        // ログイン処理
        $this->authentication();
    }

    // }}}

    // {{{ public function view( $template )
    /**
     * テンプレート共通化
     */
    public function view( $template ) {
        if ( isset( $this->_session['user_email'] ) && ! is_null( $this->_session['user_email'] ) ) {
            $is_login = true;
        } else {
            $is_login = false;
        }
        $this->smarty->assign( 'is_login', $is_login );
        $this->smarty->assign( 'config', $this->_config );
        $this->smarty->assign( 'content_tpl', strtolower( get_class( $this ) ) . '/' .  $template . '.tpl' );
        $this->smarty->assign( 'page_title', $this->_config[strtolower( get_class( $this ) )][$template] );
        $this->template = "common/layout.tpl";
    }

    // }}}

    // {{{ public function _output( $output )
    /**
     * output
     */
    public function _output( $output ) {
        if ( strlen( $output ) > 0 ) {
            echo $output;
        } else {
            $this->smarty->display( $this->template );
        }
    }

    // }}}

    // {{{ public function authentication()
    /**
     * ユーザ認証
     */
    public function authentication() {
        // sessionデータからログイン判定を行なう
        $this->_is_login = $this->my_user->is_login();
        if ( $this->_is_login ) {
            // ユーザデータ取得
            $this->_user = $this->User->getByUserId( $this->_session['user_id'] );
        }
    }

    // }}}

    // {{{ public function validate_auth()
    /**
     * ログイン判定
     */
    /*
    public function validate_auth()
    {
        if ( $this->User->can_log_in() ) {
            return true;
        } else {
            $this->form_validation->set_message( 'validate_auth', my_const::INPUT_DATA_NOT_MATCH );
            return false;
        }
    }
     */

    // }}}

    // {{{ private function _set_validation()
    /**
     * バリデーション
     */
    /*
    private function _set_validation()
    {
        $this->form_validation->set_rules( "user_email", my_const::FORM_MAIL_ADDRESS, "required|valid_email|callback_validate_auth" );
        $this->form_validation->set_rules( "password", my_const::FORM_PASSWORD, "required" );
    }
     */

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
