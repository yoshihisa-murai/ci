<?php
/**
 * 課金ログライブラリ
 */
class MY_gamemoney {

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
        $this->ci->load->model( 'Gamemoneylog' );
    }

    // }}}

    // {{{ public function set_firstdata( $user )
    /**
     * ログイン状態にする
     * @params array $post  postデータ
     */
    public function set_firstdata( $user_id, $user )
    {
        $data = array(
            'user_id'     => $user_id,
            'user_email'  => $user['user_email'],
            'nickname'    => $user['nickname'],
            'category'    => $user['category'],
            'num'         => $user['num'],
            'remain'      => $user['remain'],
            'reason'      => my_const::LOG_REASON_FIRST,
            'insert_date' => date( 'Y-m-d H:i:s' ),
        );
        return $this->ci->Gamemoneylog->insert( $data );
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
