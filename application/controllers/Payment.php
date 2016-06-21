<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 支払情報クラス
 */
class Payment extends MY_Controller {

    // {{{ public function __construct()
    /** 
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
        // モデルロード
        $this->load->model( 'Gamemoneylog' );
        $params['meta'] = array(
            'client_id' => 'ModuleTestID0001',
            'client_username' => 'ModuleTest',
            'fallback_url' => 'http://test.planx.jp/casino/payment/complete',
            'receiver_url' => 'http://test.planx.jp/casino/payment/complete' // Point your domain or IP here then the path to the receiver php file
        );
        $this->load->library( 'MY_nihtanApi', $params );
        if ( ! $this->my_user->is_login() ) {
            redirect( 'top' );
        }
    }

    // }}}

    // {{{ public function index()
    /**
     * 入金ページ
     */
    public function index()
    {
        $post = $this->input->post();
        $error_msg = '';

        $this->smarty->assign( 'user', $this->_user );
        if ( isset( $post['check'] ) ) {
            $this->_set_validation( my_const::PAYMENT_PAYMENT_NUM_INCACH );
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

    // {{{ public function inredirect()
    /**
     * 入金処理
     */
    public function inredirect()
    {
        // 戻るボタンはリダイレクトで処理
        $post = $this->input->post();
        if ( !$post || isset( $post['back'] ) ) {
            redirect( 'payment' );
        }

        // last log
        $log_data = $this->Gamemoneylog->getByUserIdAtLatest( $this->_user['user_id'] );
        // todo:プレイデータのデータを取得
        $current_money = $this->my_nihtanapi->get_nihtan_money();
        // log insert
        $params = array(
            'user_id'    => $this->_user['user_id'],
            'user_email' => $this->_user['user_email'],
            'nickname'   => $this->_user['nickname'],
            'category'   => my_const::LOG_REASON_RECEIVE,
            'num'        => $post['pay_number'],
            'remain'     => $current_money + $post['pay_number'],
            'reason'     => my_const::LOG_REASON_RECEIVE,
        );

        // トランザクション開始
        $this->db->trans_begin();
        $this->Gamemoneylog->insert( $params );
        if ( $this->db->trans_status() === false ) {
            // ロールバック
            $this->db->trans_rollback();
        }
        // コミット
        $this->db->trans_commit();

        $transfer_amount = $post['pay_number'];
        $transfer_method = 'cash_in';
        $this->my_nihtanapi->transfer_money_then_redirect( $transfer_amount, $transfer_method );

        $this->smarty->assign( 'user', $this->_user );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function complete( $succmsg = 1 )
    /**
     * 入金完了ページ
     * @params int $succmsg APIからのリダイレクトクエリ 1:成功 他:失敗
     */
    public function complete( $succmsg = 1 )
    {
        $params = array( 'error_id' => $succmsg, 'cash_kind' => my_const::LOG_REASON_RECEIVE );
        // paramsの設定があるのでconstructで呼べない為、例外的にここでload
        $this->load->library( 'MY_errCode', $params );
        $error_code = $this->my_errcode;
        $this->smarty->assign( 'error_code', $error_code );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function history()
    /**
     * 履歴
     */
    public function history()
    {
        $pagenation = array(
            'start' => $this->input->get( 's' ),
            'number' => $this->input->get( 'n' ),
        );

        $config['total_rows'] = $this->Gamemoneylog->getCountByUserId( $this->_user['user_id'] );
        $config['perpage'] = $pagenation['number'];
        $game_money = $this->Gamemoneylog->getByUserIdList( $this->_user['user_id'], $pagenation['start'], $pagenation['number'] );

        $this->pagination->initialize( $config );
        $pager = $this->pagination->create_links();

        $this->smarty->assign( 'pager', $pager );
        $this->smarty->assign( 'history', $game_money );
        $this->smarty->assign( 'user', $this->_user );
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function out()
    /**
     * 出金処理
     */
    public function out()
    {
        $post = $this->input->post();
        $error_msg = '';

        $this->smarty->assign( 'user', $this->_user );
        if ( isset( $post['check'] ) ) {
            $this->_set_validation( my_const::PAYMENT_PAYMENT_NUM_OUTCACH );
            if ( $this->form_validation->run() ) {
                $this->smarty->assign( 'post', $post );
                $this->view( 'outconfirm' );
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

    // {{{ public function outredirect()
    /**
     * 出金処理 ログを残す
     * 実際の出金はアプリ側で行なう予定なので出金結果からログを登録するだけ
     */
    public function outredirect()
    {
        // last log
        $log_data = $this->Gamemoneylog->getByUserIdAtLatest( $this->_user['user_id'] );
        // log insert
        $params = array(
            'user_id'    => $this->_user['user_id'],
            'user_email' => $this->_user['user_email'],
            'nickname'   => $this->_user['nickname'],
            'category'   => my_const::LOG_REASON_INVESTIMENT,
            'num'        => $post['pay_number'],
            'remain'     => $log_data['remain'] - $post['pay_number'],
            'reason'     => my_const::LOG_REASON_INVESTIMENT,
        );
        $this->db->trans_begin();
        $this->Gamemoneylog->insert( $params );
        if ( $this->db->trans_status() === false ) {
            // ロールバック
            $this->db->trans_rollback();
        }
        // コミット
        $this->db->trans_commit();

        $transfer_amount = $post['pay_number'];
        $transfer_method = 'cash_out';
        $this->my_nihtanapi->transfer_money_then_redirect( $transfer_amount, $transfer_method );

        $this->smarty->assign( 'user', $this->_user );
        $this->view( __FUNCTION__ );

    }
    // }}}

    // {{{ public function outcomplete( $succmsg = 1 )
    /**
     * 出金完了ページ
     * @params int $succmsg APIからのリダイレクトクエリ 1:成功 他:失敗
     */
    public function outcomplete( $succmsg = 1 )
    {
        $params = array( 'error_id' => $succmsg, 'cash_kind' => my_const::LOG_REASON_INVESTMENT );
        // paramsの設定があるのでconstructで呼べない為、例外的にここでload
        $this->load->library( 'MY_errCode', $params );
        $error_code = $this->my_errcode;
        $this->smarty->assign( 'error_code', $error_code );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ private function _set_validation()
    /**
     * バリデーション
     */
    private function _set_validation( $text )
    {
        $this->form_validation->set_rules( "pay_number", $text, "required|is_natural_no_zero|greater_than_equal_to[5]" );
        $this->form_validation->set_rules( "neteller_id", my_const::FORM_NETELLER_ID, "required" );
        $this->form_validation->set_rules( "neteller_pass", my_const::FORM_PASSWORD, "required" );
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
