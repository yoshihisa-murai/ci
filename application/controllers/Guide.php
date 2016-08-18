<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Guideページクラス
 */
class Guide extends MY_Controller {

    // {{{ public function __construct()
    /**
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
    }
    // }}}

    // {{{ public function appinstall()
    /**
     * 泥炭のインストール方法
     */
    public function appinstall()
    {
        $this->view( __FUNCTION__ );
    }
    // }}}

    // {{{ public function appinstall()
    /**
     * 泥炭のインストール方法
     */
    public function startup()
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
