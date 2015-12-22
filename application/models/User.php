<?php
/**
 * ユーザクラス
 */
class User extends CI_Model {

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
        $this->_table = 'user';
        $this->db->where( 'delete_date', null );
    }

    // }}}

    // {{{ public function getByUserId( $user_id )
    /**
     * データ取得 
     */
    public function getByUserId( $user_id ) {
        $this->db->where( 'user_id', $user_id );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}

    // {{{ public function getByNickname( $nickname )
    /**
     * ニックネームでデータ取得 
     */
    public function getByNickname( $nickname ) {
        $this->db->where( 'nickname', $nickname );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}

    // {{{ public function getByUserEmail( $user_email )
    /**
     * user_emailでデータ取得 
     */
    public function getByUserEmail( $user_email ) {
        $this->db->where( 'user_email', $user_email );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}

    // {{{ public function getByUserEmailAndPassword( $user_email, $password )
    /**
     * user_emailとパスワードでデータ取得 
     */
    public function getByUserEmailAndPassword( $user_email, $password ) {
        $this->db->where( 'user_email', $user_email );
        $this->db->where( 'password', hash( 'sha512', $password ) );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}

    // {{{ public function update( $params, $where ) 
    /**
     * update 
     */
    public function update( $params, $where ) {
        foreach( $params as $key => $val ) {
            if ( !empty( $val ) && $key != 'cpassword' ) {
                $data[$key] = $val;
            }
        }
        foreach( $where as $where_key => $where_val ) {
            $this->db->where( $where_key, $where_val );
        }
        if ( isset( $data['password'] ) ) {
            $data['password'] = hash( 'sha512', $data['password'] );
        }
        $this->db->update( $this->_table, $data );
    }

    // }}}

    // {{{ public function insert( $user_tmp )
    /**
     * insert 
     */
    public function insert( $user_tmp ) {
        $data = array(
            'user_email' => $user_tmp['user_email'],
            'nickname' => $user_tmp['nickname'],
            'password' => hash( 'sha512', $user_tmp['password'] ),
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
        $this->db->set( 'user_email', 'CONCAT(user_email, \'@del_' . $user_id . '\' )', false );
        $this->db->set( 'nickname', 'CONCAT(nickname, \'@del_' . $user_id . '\' )', false );
        $this->db->where( 'user_id', $user_id );
        $this->db->update( $this->_table );
    }

    // }}}

    // {{{ public function can_log_in()
    /**
     * ログイン可不可判定
     */
    public function can_log_in()
    {
        $is_login = $this->getByUserEmailAndPassword( $this->input->post( 'user_email' ), $this->input->post( 'password' ) );
        if ( $is_login ) {
            return true;
        } else {
            return false;
        }
    }

    // }}}

//---------------基本使っては行けない-----------------
    // {{{ public function physical_delete( $user_id ) 
    /**
     * physical delete 
     */
    public function physical_delete( $user_id ) {
        $this->db->where( 'user_id', $user_id );
        $this->db->delete( $this->_table, $params );
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
