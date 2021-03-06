<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Overallページクラス
 */
class Overall extends MY_Controller {

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
    }
    // }}}

    // {{{ public function aboutus()
    /**
     * トップページ
     */
    public function aboutus()
    {
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function baccarat()
    /**
     * バカラページ
     */
    public function baccarat()
    {
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function poker()
    /**
     * ポーカーページ
     */
    public function poker()
    {
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function sicbo()
    /**
     * シックボーページ
     */
    public function sicbo()
    {
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function toto()
    /**
     * TOTOページ
     */
    public function toto()
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
