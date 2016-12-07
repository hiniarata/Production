<?php
/*
* 制作会社お問い合わせプラグイン
* 情報管理モデル
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Production Plugin Project
* @since        ver.0.9.0
*/

/**
 * Include files
 */
App::uses('ProductionApp', 'Production.Model');

/**
 * 設定情報モデル
 *
 * @package baser.plugins.production
 */
class ProductionConfig extends ProductionApp
{
    /**
     * クラス名
     *
     * @var string
     * @access public
     */
    public $name = 'ProductionConfig';

    /**
     * プラグイン名
     *
     * @var string
     * @access public
     */
    public $plugin = 'Production';

    /**
     * DB接続時の設定
     *
     * @var string
     * @access public
     */
    public $useDbConfig = 'plugin';

    /**
     * validate
     *
     * @var array
     */
    /* 新しいバージョンで動かす場合、notEmptyではなくnotBlankを使う。
    public $validate = array(
        'email' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '送信先メールアドレスを入力してください。'
            )),
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '制作会社名を入力してください。'
            )),
    );
    */
    /* 旧バージョンは notBlankが使えない */
    public $validate = array(
        'email' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '送信先メールアドレスを入力してください。'
            )),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '制作会社名を入力してください。'
            )),
    );
}