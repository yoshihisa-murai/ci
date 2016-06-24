<?php
/**
 * ログクラス
 */
class Gamemoneylog extends CI_Model {

    /**
     * テーブル
     */
    protected $_table;

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->_table = 'game_money_log';
    }

    // }}}

    // {{{ public function getByUserIdAtLatest( $user_id )
    /**
     * データ取得 
     * 最後に登録されたデータのみ取得
     */
    public function getByUserIdAtLatest( $user_id ) {
        $this->db->where( 'user_id', $user_id );
        $this->db->order_by( 'insert_date', 'desc' );
        $this->db->limit( 1 );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}

    // {{{ public function getCountByUserId( $user_id )
    /**
     * データ件数取得 
     */
    public function getCountByUserId( $user_id ) {
        $this->db->where( 'user_id', $user_id );
        $res = $this->db->count_all_results( $this->_table );
        return $res;
    }

    // }}}

    // {{{ public function getByUserIdList( $user_id, $start, $num )
    /**
     * データ取得 
     * 管理ツール用
     */
    public function getByUserIdList( $user_id, $start, $num ) {
        $this->db->where( 'user_id', $user_id );
        $this->db->order_by( 'insert_date', 'desc' );
        $this->db->limit( $num, $start );
        $query = $this->db->get( $this->_table );
        $res = array();
        foreach( $query->result() as $row ) {
            $res[] = $row;
        }
        return $res;
    }

    // }}}

    // {{{ public function insert( $data )
    /**
     * insert 
     */
    public function insert( $data ) {
        $data = array(
            'user_id' => $data['user_id'],
            'user_email' => $data['user_email'],
            'nickname' => $data['nickname'],
            'category' => $data['category'],
            'num' => $data['num'],
            'remain' => $data['remain'],
            'reason' => $data['reason'],
            'insert_date' => date( 'Y-m-d H:i:s' ),
        );
        $res = $this->db->insert( $this->_table, $data );
        if ( $res == false ) {
            return false;
        }
        return true;
    }

    // }}}

    // {{{ public function delete( $user_id ) 
    /**
     * logical delete 
     */
    public function delete( $user_id ) {
        $this->db->set( 'delete_date', date( 'Y-m-d H:i:s' ) );
        $this->db->set( 'user_email', 'CONCAT(user_email, \'@del_' . $log_id . '\' )', false );
        $this->db->set( 'nickname', 'CONCAT(nickname, \'@del_' . $log_id . '\' )', false );
        $this->db->where( 'user_id', $user_id );
        $this->db->update( $this->_table );
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
