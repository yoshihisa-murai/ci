<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 文言関連の定数
 */
class MY_const {
    const MAIL_SUBJECT_PREREGIST        = 'お問い合わせを受け付けました。';
    const MAIL_SUBJECT_TMPPASS          = 'パスワード変更';
    const REGIST_COMPLETE               = '会員登録が完了しました。';
    const INVALID_ACCESS                = '不正なアクセスです。';
    const REGIST_FAILURE                = '会員登録処理に失敗しました。';
    const DUPLICATE_NICKNAME            = 'このニックネームは使用されています。';
    const OK                            = 'OK';
    const FORM_MAIL_ADDRESS             = 'メールアドレス';
    const FORM_CONFIRM_MAIL             = 'メールアドレス(確認用)';
    const FORM_NICKNAME                 = 'ニックネーム';
    const FORM_PASSWORD                 = 'パスワード';
    const FORM_NAME1                    = '名';
    const FORM_NAME2                    = '性';
    const FORM_BIRTH_YEAR               = '年';
    const FORM_BIRTH_MONTH              = '月';
    const FORM_BIRTH_DATE               = '日';
    const FORM_SEX                      = '性別';
    const FORM_MOBILE1                  = '電話番号1';
    const FORM_MOBILE2                  = '電話番号2';
    const FORM_MOBILE3                  = '電話番号3';
    const INPUT_DATA_NOT_MATCH          = 'ユーザ名かパスワードが異なります。';
    const NODATA_MAIL_ADDRESS           = '入力されたメールアドレスは登録されていません。';
    const NODATA_NICKNAME               = '入力されたニックネームは登録されていません。';
    const PAYMENT_PAYMENT_NUM_INCACH    = '入金金額';
    const PAYMENT_PAYMENT_NUM_OUTCACH   = '出金金額';
    const FORM_NETELLER_ID              = 'ネッテラーID';
    const FORM_INFO_TEXTAREA            = 'お問い合わせ内容';
    const FORM_KIYAKU                   = 'ご利用規約';

    /**
     * 入出金理由
     */
    const LOG_REASON_FIRST             = 0; // 初期データ
    const LOG_REASON_RECEIVE           = 1; // 入金
    const LOG_REASON_INVESTMENT        = 2; // 出金
    const LOG_REASON_PLAY              = 3; // プレイ由来
    const LOG_REASON_BEFORE_INVESTMENT = 4; // 出金前データ取得
    const LOG_REASON_FAILD             = 9; // 失敗

    const PAGINATION_PER_PAGE = 10; // ページャ
}
