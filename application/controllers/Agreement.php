<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Agreementページクラス
 */
class Agreement extends MY_Controller {

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

}
/**
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: sw=4 ts=4 fdm=marker
 * vim<600: sw=4 ts=4
 */
