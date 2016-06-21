<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * エラークラス
 */
class Errors extends MY_Controller {

    // {{{ public function __construct()
    /** 
     * コンストラクタ
     */
    public function __construct() 
    {
        parent::__construct();
    }

    // }}}

    // {{{ public function error_404()
    /**
     * トップページ
     */
    public function error_404()
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
