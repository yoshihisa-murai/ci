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
            'fallback_url' => 'http://test.planx.jp/kjn/payment_complete.php',
            'receiver_url' => 'http://test.planx.jp/kjn/payment_complete.php' // Point your domain or IP here then the path to the receiver php file
        );
        $this->load->library( 'MY_nihtanApi', $params );
        if ( ! $this->my_user->is_login() ) {
            redirect( 'top' );
        }
    }

    // }}}

    // {{{ public function index()
    /**
     * 支払い入力ページ
     */
    public function index()
    {
        $this->smarty->assign( 'user', $this->_user );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function confirm()
    /**
     * 支払い確認ページ
     */
    public function confirm()
    {
        $post = $this->input->post();
        $game_money = $this->Gamemoneylog->getByUserIdList( $this->_user['user_id'], 0, 20 );
        $this->smarty->assign( 'post', $post );
        $this->smarty->assign( 'game_money', $game_money );
        $this->smarty->assign( 'user', $this->_user );
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function complete()
    /**
     * 支払い完了ページ
     */
    public function complete()
    {
        // paramsの設定があるのでconstructで呼べない為、例外的にここでload
        $error_id = 1;
        $cash_kind = 1;
        $params = array( 'error_id' => $error_id, 'cash_kind' => $cash_kind );
        $this->load->library( 'MY_errCode', $params );
        $error_code = $this->my_errcode;
        $post = $this->input->post();
        if ( !$post || isset( $post['back'] ) ) {
            redirect( 'payment' );
        }
        $transfer_amount = $post['pay_number'];
        $transfer_method = 'cash_in';
        $recommender_id = 'test1234';
//        $this->my_nihtanapi->transfer_money_then_redirect( $transfer_amount, $transfer_method, $recommender_id );
        $this->smarty->assign( 'error_code', $error_code );
        $this->smarty->assign( 'user', $this->_user );
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
     * 出金処理 ログを残す
     * 実際の出金はアプリ側で行なう予定なので出金結果からログを登録するだけ
     */
    public function out()
    {
        $history = $this->Gamemoneylog->getByUserIdAtLatest( $this->_user['user_id'] );
        $this->smarty->assign( 'history', $history );
        $this->smarty->assign( 'user', $this->_user );
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function outconfirm()
    /**
     * 出金処理 ログを残す
     * 実際の出金はアプリ側で行なう予定なので出金結果からログを登録するだけ
     */
    public function outconfirm()
    {
        $history = $this->Gamemoneylog->getByUserIdAtLatest( $this->_user['user_id'] );
        $this->smarty->assign( 'history', $history );
        $this->smarty->assign( 'user', $this->_user );
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function outcomplete()
    /**
     * 出金処理 ログを残す
     * 実際の出金はアプリ側で行なう予定なので出金結果からログを登録するだけ
     */
    public function outcomplete()
    {
        $history = $this->Gamemoneylog->getByUserIdAtLatest( $this->_user['user_id'] );
        $this->smarty->assign( 'history', $history );
        $this->smarty->assign( 'user', $this->_user );
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
