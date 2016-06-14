<?php
/**
 * ユーザクラス
 */
class User extends CI_Model {

    /*
    $params['meta'] = array(
        'client_id' => 'test', // user_id
        'client_username' => 'test', // user_name
        'fallback_url' => '', 
        'receiver_url' => '',
    );
     */

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
        $this->_session = $this->session->get_userdata();
    }

    // }}}

    // {{{ public function getByNickname( $nickname )
    /**
     * ニックネームでデータ取得 
     * used by controller/Forgot.php
     */
    public function getByNickname( $nickname ) {
        $this->db->where( 'nickname', $nickname );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}

    // {{{ public function getByUserId( $user_id )
    /**
     * user_emailでデータ取得 
     * used by core/MY_controller.php
     */
    public function getByUserId( $user_id ) {
        $this->db->where( 'user_id', $user_id );
        $res = $this->db->get( $this->_table );
        return $res->row_array();
    }

    // }}}
 
    // {{{ public function getByUserEmail( $user_email )
    /**
     * user_emailでデータ取得 
     * used by controller/Forgot.php
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
     * used by libraries/MY_User.php
     */
    public function getByUserEmailAndPassword( $user_email, $password ) {
        $this->db->where( 'user_email', $user_email );
        $this->db->where( 'password', hash( 'sha512', $password ) );
        $res = $this->db->get( $this->_table );
        // APIからデータ呼び出して紐付け
//        $this->load->library( 'MY_nihtanApi', array('test'=>'test') );
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

    // {{{ public function insert( $params )
    /**
     * insert 
     */
    public function insert( $params ) {
        $data = array(
            'user_email' => $params['user_email'],
            'nickname' => $params['nickname'],
            'password' => hash( 'sha512', $params['password'] ),
            'name' => $params['name1'] . ' ' . $params['name2'],
            'birth_day' => $params['birth_year'] . $params['birth_month'] . $params['birth_date'],
            'sex' => $params['sex'],
            'language' => $params['use_language'],
            'currency_unit' => $params['currency_unit'],
            'country' => $params['country'],
            'phone_number' => $params['mobile1'] . $params['mobile2'] . $params['mobile3'],
            'zip_code' => $params['zip_code1'] . $params['zip_code2'],
            'address' => $params['add_no1'],
            'address_detail' => $params['add_no2'],
            'insert_date' => date( 'Y-m-d H:i:s' ),
        );
        // ページバック処理やリロードでDBエラーを吐かれると面倒なのでignore
        $insert_query = str_replace( 'INSERT INTO', 'INSERT IGNORE INTO', $this->db->insert_string( $this->_table, $data ) );
        $res = $this->db->query( $insert_query );
        if ( $res == false ) {
            return false;
        }
        return $this->db->insert_id();
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
