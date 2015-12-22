<?php
/**
 * 一時ユーザクラス
 */
class Usertmp extends CI_Model {

    // {{{
    /**
     * テーブル
     */
    protected $_table;
    // }}}

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->_table = 'user_tmp';
        $this->db->where( 'delete_date', null );
    }

    // }}}

    // {{{ public function getByUserEmail( $user_email )
    /**
     * データ取得 
     */
    public function getByUserEmail( $user_email ) {
        $this->db->where( 'user_email', $user_email );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}

    // {{{ public function getByUserEmailAndKey( $user_email, $key )
    /**
     * データ取得 
     */
    public function getByUserEmailAndKey( $user_email, $key ) {
        $this->db->where( 'user_email', $user_email );
        $this->db->where( 'key', $key );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}

    // {{{ public function is_valid_key( $key )
    /**
     * データ取得 
     */
    public function is_valid_key( $key ) {
        $this->db->where( 'key', $key );
        $res = $this->db->get( $this->_table );

        if ( count( $res ) == 1 ) {
            return $res->row_array();
        }
        return false;
    }

    // }}}

    // {{{ public function insert( $params ) 
    /**
     * insert 
     */
    public function insert( $params ) {
        if ( empty( $params ) ) {
            return false;
        }
        foreach( $params as $k => $v ) {
            $data[$k] = $v;
        }
        $data['insert_date'] = date( 'Y-m-d H:i:s' );
        return $this->db->insert( $this->_table, $data );
    }

    // }}}

    // {{{ public function delete( $where ) 
    /**
     * logical delete 
     */
    public function delete( $user_id ) {
        $params['delete_date'] = now();
        $this->db->where( 'user_id', $user_id );
        $this->db->update( $this->_table, $params );
    }

    // }}}

//---------------基本使っては行けない-----------------
    // {{{ public function physical_delete( $tmp_id ) 
    /**
     * physical delete 
     */
    public function physical_delete( $tmp_id ) {
        $this->db->where( 'tmp_id', $tmp_id );
        return $this->db->delete( $this->_table );
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
