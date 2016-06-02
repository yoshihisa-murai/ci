<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * netellerページクラス
 */
class Neteller extends MY_Controller {

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
    }

    // }}}

    // {{{ public function index()
    /**
     * トップページ
     */
    public function index()
    {
        $this->view( __FUNCTION__ );
    }

    // }}}

    // {{{ public function regist()
    /**
     * 口座開設ページ
     */
    public function regist()
    {
        $this->view( __FUNCTION__ );
    }

    // }}}
     
    // {{{ public function authority()
    /**
     * 本人確認ページ
     */
    public function authority()
    {
        $this->view( __FUNCTION__ );
    }

    // }}}
     
    // {{{ public function payment()
    /**
     * 入金ページ
     */
    public function payment()
    {
        $this->view( __FUNCTION__ );
    }

    // }}}
     
    // {{{ public function payoutatm()
    /**
     * 出金(ATM)ページ
     */
    public function payoutatm()
    {
        $this->view( __FUNCTION__ );
    }

    // }}}
     
    // {{{ public function payout()
    /**
     * 出金ページ
     */
    public function payout()
    {
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
