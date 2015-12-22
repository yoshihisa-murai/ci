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
        if ( ! $this->my_user->is_login() ) {
            redirect( 'login?r=' . base_url() . strtolower( __CLASS__ ) );
        }
    }

    // }}}

    // {{{ public function index()
    /**
     * 支払い情報ページ
     */
    public function index()
    {
        $game_money = $this->Gamemoneylog->getByUserIdList( $this->_user['user_id'], 0, 20 );
        $this->smarty->assign( 'game_money', $game_money );
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
        $this->smarty->assign( 'total', $total );
        $this->smarty->assign( 'game_money', $game_money );
        $this->smarty->assign( 'user', $this->_user );
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function receive()
    /**
     * 入金処理
     * 実際の入金処理自体はアプリで行なうのでここではログを残すのみ
     */
    public function receive()
    {
        $is_posted = false;
        $post = $this->input->post();
        if ( ! empty( $post ) ) {
            $last_data = $this->Gamemoneylog->getByUserIdAtLatest( $this->_user['user_id'] );
            // STAB:
            if ( $this->my_api->set_money( $post['money'] ) ) {
                $data = array(
                    'user_id' => $this->_user['user_id'],
                    'in_money' => $post['money'],
                    'out_money' => 0,
                    'remain_money' => $last_data['remain_money'] + $post['money'],
                    'reason' => my_const::LOG_REASON_RECEIVE,
                );
            } else {
                $data = array(
                    'user_id' => $this->_user['user_id'],
                    'in_money' => $post['money'],
                    'out_money' => $post['money'],
                    'remain_money' => $last_data['remain_money'],
                    'reason' => my_const::LOG_REASON_FAILD,
                );
            }
            $this->Gamemoneylog->insert( $data );
        }
    }
    // }}}

    // {{{ public function investment()
    /**
     * 出金処理 ログを残す
     * 実際の出金はアプリ側で行なう予定なので出金結果からログを登録するだけ
     */
    public function investment()
    {
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
