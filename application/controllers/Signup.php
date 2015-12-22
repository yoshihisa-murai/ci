<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 会員登録クラス
 */
class Signup extends MY_Controller {

    // {{{ public function __construct()
    /** 
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
        // モデルロード
        $this->load->model( 'Usertmp' );
        $this->load->library( 'MY_gamemoney' );
        // ログインしていたらトップページへリダイレクト
        if ( $this->my_user->is_login() ) {
            redirect( 'top' );
        }
    }

    // }}}

    // {{{ public function index()
    /**
     * 会員登録ページ
     */
    public function index()
    {
        // バリデーションエラー時にテキストエリアのデータを保持
        $post = $this->input->post();
        $input['user_email'] = ( isset( $post['user_email'] ) ) ? $post['user_email'] : null;
        $input['nickname'] = ( isset( $post['nickname'] ) ) ? $post['nickname'] : null;

        $is_posted = false;
        if ( $post ) {
            $this->_set_validation();
            if ( $this->form_validation->run() ) {
                $is_posted = true;
                // 仮登録に失敗したらメール送信をしない
                $key = hash( 'sha512', uniqid() );
                $params = array(
                    'user_email' => $post['user_email'],
                    'nickname'   => $post['nickname'],
                    'password'   => $post['password'],
                    'key'        => $key,
                );
                if ( ! $this->Usertmp->insert( $params ) ) {
                    break;
                }
                $message = "<p>会員登録ありがとうございます。</p>";
                $message .= sprintf( '<a href="%ssignup/complete/%s">こちらをクリックして、会員登録を完了してください</a>', base_url(), $key );
                $this->my_mail->mail_send( $post['user_email'], my_const::MAIL_SUBJECT_PREREGIST, $message );
            }
        }
        $this->smarty->assign( 'is_posted', $is_posted );
        $this->smarty->assign( 'input', $input ); 
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function complete()
    /**
     * 本登録( 仮登録メールからの遷移専用ページ )
     */
    public function complete( $key )
    {
        $message = my_const::INVALID_ACCESS;
        // 生成されたURLではなかった場合登録処理はしない
        if ( $user_tmp = $this->Usertmp->is_valid_key( $key ) ) {
            $message = my_const::REGIST_COMPLETE;

            // トランザクション開始
            $this->db->trans_begin();
            $result_ins = $this->User->insert( $user_tmp );
            $user = $this->User->getByUserEmail( $user_tmp['user_email'] );
            $data = array(
                'user_id'      => $user['user_id'],
                'user_email'   => $user['user_email'],
                'nickname'     => $user['nickname'],
                'game_money'   => $user['game_money'],
                'is_logged_in' => true
            );
            $this->session->set_userdata( $data );
 
            if ( $result_ins ) {
                try {
                    $this->Usertmp->physical_delete( $user_tmp['tmp_id'] );
                    $this->my_gamemoney->set_firstdata( $user );
                } catch ( Exception $error ) {
                    $message = my_const::REGIST_FAILURE;
                    // ロールバック
                    $this->db->rollback();
                    $this->smarty->assign( 'message', $message );
                    $this->view( __FUNCTION__ );
                    break;
                }
            }
            // コミット
            $this->db->trans_commit();
       }

        $this->smarty->assign( 'message', $message );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public funciton check_nickname()
    /**
     * ニックネーム重複チェック( ajax )
     */
    public function check_nickname()
    {
        $user = $this->User->getByNickname( $this->input->post( 'nickname' ) );
        if ( $user ) {
            $response = my_const::DUPLICATE_NICKNAME;
        } else {
            $response = my_const::OK;
        }
        return $this->output->set_content_type( 'application/json' )->set_output( json_encode( $response ) );
    }

    // }}}

    // {{{ private function _set_validation()
    /**
     * バリデーションチェック
     */
    public function _set_validation()
    {
        $this->form_validation->set_rules( "user_email", my_const::FORM_MAIL_ADDRESS, "required|trim|valid_email|is_unique[user.user_email]" );
        $this->form_validation->set_rules( "nickname", my_const::FORM_NICKNAME, "required|trim|is_unique[user.nickname]" );
        $this->form_validation->set_rules( "password", my_const::FORM_PASSWORD, "required|trim|min_length[8]" );
        $this->form_validation->set_rules( "cpassword", my_const::FORM_CONFIRM_PASSWORD, "required|trim|matches[password]" );
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
