<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * パスワード等を忘れた場合クラス
 */
class Forgot extends MY_Controller {

    // {{{ public function __construct()
    /** 
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
        // モデルロード
        $this->load->model( 'Usertmp' );
    }

    // }}}

    // {{{ public function index()
    /**
     * パスワードを忘れた
     */
    public function index()
    {
        $is_posted = false;
        $user_email = $this->input->post( 'user_email' ) ? $this->input->post( 'user_email' ) : null;
        if ( ! is_null( $user_email ) ) {
            $this->_set_validation();
            if ( $this->form_validation->run() ) {
                $is_posted = true;
                // 仮データ作成
                $key = hash( 'sha512', uniqid() );
                $params = array(
                    'key' => $key,
                    'user_email' => $user_email,
                );
                $this->Usertmp->insert( $params );

                // メール送信
                $message = sprintf( 
                    '<a href="%s%s/changepass/?key=%s&u=%s">こちらからパスワードを変更してください</a>',
                    base_url(),
                    strtolower( __CLASS__ ),
                    $key,
                    $user_email
                );
                $this->my_mail->mail_send( $user_email, my_const::MAIL_SUBJECT_TMPPASS, $message );
            }
        }
        $this->smarty->assign( 'is_posted', $is_posted );
        $this->smarty->assign( 'user_email', $user_email );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function changepass()
    /**
     * パスワード変更ページ
     */
    public function changepass()
    {
        $is_post = false;
        $message = null;
        $post = $this->input->post();
        // フォームからのデータがある場合パスワード変更処理
        if ( $post ) {
            $this->_set_validation_changepass();
            if ( $this->form_validation->run() ) {
                $is_post = true;
                $user_email = $post['user_email'];
                $params = array(
                    'password'   => $post['password']
                );
                $where = array( 'user_email' => $user_email );
                // トランザクション開始
                $this->db->trans_begin();
                // パスワード更新
                $this->User->update( $params, $where );
                // 仮データ物理削除
                $user_tmp = $this->Usertmp->getByUserEmailAndKey( $user_email, $post['key'] );
                $delete_tmp = $this->Usertmp->physical_delete( $user_tmp['tmp_id'] );
                if ( ! $delete_tmp ) {
                    // 仮データの削除に失敗した場合ロールバック
                    $this->db->rollback();
                    $message = my_const::REGIST_FAILURE;
                }
                // トランザクションコミット
                $this->db->trans_commit();
            }
        } else {
            // フォームからのデータがない場合フォームを表示
            $key        = $this->input->get( 'key' );
            $user_email = $this->input->get( 'u' );
            $user_tmp = $this->Usertmp->getByUserEmailAndKey( $user_email, $key );
            if ( ! $user_tmp ) {
                redirect( 'forgot/error' );
            }
            $this->smarty->assign( 'key', $key );
        }

        $this->smarty->assign( 'message', $message );
        $this->smarty->assign( 'is_post', $is_post );
        $this->smarty->assign( 'user_email', $user_email );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function email()
    /**
     * メールアドレスを忘れた場合
     */
    public function email()
    {
        $nickname = ( $this->input->post( 'nickname' ) ) ? $this->input->post( 'nickname' ) : null;
        $user = null;
        $is_posted = false;
        if ( ! is_null( $nickname ) ) {
            $this->_set_email_validation();
            if ( $this->form_validation->run() ) {
                $is_posted = true;
                $user = $this->User->getByNickname( $nickname );
            }
        }
        $this->smarty->assign( 'user', $user );
        $this->smarty->assign( 'is_posted', $is_posted );
        $this->smarty->assign( 'nickname', $nickname );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function error()
    /**
     * エラーページ
     */
    public function error()
    {
        $message = my_const::INVALID_ACCESS;
        $this->smarty->assign( 'message', $message );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ private function _set_validation()
    /**
     * バリデーション
     */
    private function _set_validation()
    {
        $this->form_validation->set_rules( "user_email", my_const::FORM_MAIL_ADDRESS, "required|valid_email|callback_validate_isset_email" );
    }

    // }}}

    // {{{ private function _set_validation_changepass()
    /**
     * バリデーション
     */
    private function _set_validation_changepass()
    {
        $this->form_validation->set_rules( "user_email", my_const::FORM_MAIL_ADDRESS, "required|valid_email|callback_validate_isset_email" );
        $this->form_validation->set_rules( "password", my_const::FORM_PASSWORD, "required|trim" );
        $this->form_validation->set_rules( "cpassword", my_const::FORM_CONFIRM_PASSWORD, "required|trim|matches[password]" );
    }

    // }}}

    // {{{ private function _set_email_validation()
    /**
     * バリデーション
     */
    private function _set_email_validation()
    {
        $this->form_validation->set_rules( "nickname", my_const::FORM_NICKNAME, "required|callback_validate_isset_nickname" );
    }

    // }}}

    // {{{ public function validate_isset_email()
    /**
     * 登録メールアドレスがあるかチェック
     */
    public function validate_isset_email()
    {
        if ( $this->User->getByUserEmail( $this->input->post( 'user_email' ) ) ) {
            return true;
        } else {
            $this->form_validation->set_message( 'validate_isset_email', my_const::NODATA_MAIL_ADDRESS );
            return false;
        }
    }

    // }}}

    // {{{ public function validate_isset_nickname()
    /**
     * 登録されたニックネームの有無の確認
     */
    public function validate_isset_nickname()
    {
        if ( $this->User->getByNickname( $this->input->post( 'nickname' ) ) ) {
            return true;
        } else {
            $this->form_validation->set_message( 'validate_isset_nickname', my_const::NODATA_NICKNAME );
            return false;
        }
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
