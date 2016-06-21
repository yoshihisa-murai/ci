<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Callcenterページクラス
 */
class Callcenter extends MY_Controller {

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
    }

    // }}}

    // {{{ public function index()
    /**
     * トップページ
     */
    public function index()
    {
        $error_msg = '';
        if ( isset( $post['check'] ) ) {
            $this->_set_validation();
            if ( $this->form_validation->run() ) {
                $this->smarty->assign( 'post', $post );
                $this->view( 'confirm' );
            } else {
                $error_msg = $this->form_validation->error_string();
                $this->smarty->assign( 'error_msg', $error_msg );
                $this->view( __FUNCTION__ );
            }
        } else {
            $this->smarty->assign( 'error_msg', $error_msg );
            $this->view( __FUNCTION__ );
        }
    }

    // }}}

    // {{{ public function complete()
    /**
     * 完了ページ
     */
    public function complete()
    {
        // バリデーションエラー時にテキストエリアのデータを保持
        $post = $this->input->post();

        $this->_set_validation();
        if ( $this->form_validation->run() ) {
            $params = array(
                'name1'         => $post['name1'],
                'name2'         => $post['name2'],
                'email'         => $post['email1'],
                'info_title'    => $post['info_title'],
                'info_textarea' => $post['info_textarea'],
            );
            $message = "<p>お問い合わせありがとうございます。</p>";
            $message .= "<p>お名前:" . $post['name1'] . ' ' . $post['name2'] . '"';
            $message .= "<p>email:" . $post['email'] . '"';
            $message .= "<p>件名:" . $post['info_title'] . '"';
            $message .= "<p>お問い合わせ内容:" . $post['info_textarea'] . '"';
            $this->my_mail->mail_send( $this->config['smtp_user'], my_const::MAIL_SUBJECT_PREREGIST, $message );
        }
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ private function _set_validation()
    /**
     * バリデーション
     */
    private function _set_validation( $text )
    {
        $this->form_validation->set_rules( "name2", my_const::FORM_NAME2, "required|htmlspecialchars|trim" );
        $this->form_validation->set_rules( "name1", my_const::FORM_NAME1, "required|htmlspecialchars|trim" );
        $this->form_validation->set_rules( "email1", my_const::FORM_MAIL_ADDRESS, "required|trim|valid_email|is_unique[user.user_email]|htmlspecialchars" );
        $this->form_validation->set_rules( "email2", my_const::FORM_CONFIRM_MAIL, "required|trim|matches[user_email]|htmlspecialchars" );
        $this->form_validation->set_rules( "info_textarea", my_const::FORM_INFO_TEXTAREA, "required|htmlspecialchars|trim" );
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
