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
        $this->_set_validation();

        $kiyaku = array( '1' => '' );
        $this->smarty->assign( 'form_attr', $this->_config['form_attr'] );
        $this->smarty->assign( 'pref', $this->_config['pref'] ); 
        $this->smarty->assign( 'use_language', $this->_config['use_language'] ); 
        $this->smarty->assign( 'currency_unit', $this->_config['currency_unit'] ); 
        $this->smarty->assign( 'country', $this->_config['country'] ); 
        $this->smarty->assign( 'country_num', $this->_config['country_num'] ); 
        $this->smarty->assign( 'sex', $this->_config['sex'] ); 
        $this->smarty->assign( 'kiyaku', $kiyaku ); 
        if ( $this->form_validation->run() == false ) {
            $error_msg = $this->form_validation->error_string();
            $this->smarty->assign( 'error_msg', $error_msg );
            $this->view( __FUNCTION__ );
        } else {
            $this->smarty->assign( 'post', $this->input->post() ); 
            $this->view( 'confirm' );
        }
    }

    // }}}

    // {{{ public function complete()
    /**
     * 本登録( 仮登録メールからの遷移専用ページ )
     */
    public function complete()
    {
        $post = $this->input->post();

        // トランザクション開始
        $this->db->trans_begin();
        $last_insert_id = $this->User->insert( $post );
        if ( $last_insert_id > 0 ) {
            $this->my_gamemoney->set_firstdata( $last_insert_id, $post );
        }
 
        if ( $this->db->trans_status() === false ) {
            // ロールバック
            $this->db->trans_rollback();
        }
        // コミット
        $this->db->trans_commit();

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
        $this->form_validation->set_rules( "user_email", my_const::FORM_MAIL_ADDRESS, "required|trim|valid_email|is_unique[user.user_email]|htmlspecialchars" );
        $this->form_validation->set_rules( "c_user_email", my_const::FORM_CONFIRM_MAIL, "required|trim|matches[user_email]|htmlspecialchars" );
        $this->form_validation->set_rules( "nickname", my_const::FORM_NICKNAME, "required|trim|is_unique[user.nickname]|htmlspecialchars" );
        $this->form_validation->set_rules( "password", my_const::FORM_PASSWORD, "required|trim|min_length[8]|htmlspecialchars" );
        $this->form_validation->set_rules( "name1", my_const::FORM_NAME1, "required|trim|htmlspecialchars" );
        $this->form_validation->set_rules( "name2", my_const::FORM_NAME2, "required|trim|htmlspecialchars" );
        $this->form_validation->set_rules( "birth_year", my_const::FORM_BIRTH_YEAR, "required|trim|htmlspecialchars|exact_length[4]|greater_than[1920]" );
        $this->form_validation->set_rules( "birth_month", my_const::FORM_BIRTH_MONTH, "required|trim|htmlspecialchars|exact_length[2]|less_than[12]" );
        $this->form_validation->set_rules( "birth_date", my_const::FORM_BIRTH_DATE, "required|trim|htmlspecialchars|exact_length[2]|less_than[31]" );
        $this->form_validation->set_rules( "sex", my_const::FORM_SEX, "required|trim|htmlspecialchars|exact_length[1]|less_than[2]" );
        $this->form_validation->set_rules( "mobile1", my_const::FORM_MOBILE1, "required|trim|htmlspecialchars|exact_length[3]|numeric" );
        $this->form_validation->set_rules( "mobile2", my_const::FORM_MOBILE2, "required|trim|htmlspecialchars|exact_length[4]|numeric" );
        $this->form_validation->set_rules( "mobile3", my_const::FORM_MOBILE3, "required|trim|htmlspecialchars|exact_length[4]|numeric" );
        $this->form_validation->set_rules( "kiyaku", my_const::FORM_KIYAKU, "required" );
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
