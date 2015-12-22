<?php
/**
 * メールライブラリ
 */
class MY_mail {

    // {{{ public function mail_send( $to, $subject, $message )
    /**
     * CIのメールライブラリのラッパー
     */
    public function mail_send( $to, $subject, $message )
    {
        // ライブラリロード
        $ci =& get_instance();
        $config =& get_config();
        $ci->load->library( 'email' );

        $ci->email->from( $config['info_mail'], '送信元' );
        $ci->email->to( $to );
        $ci->email->subject( $subject );
        $ci->email->message( $message );
        $ci->email->send();
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
