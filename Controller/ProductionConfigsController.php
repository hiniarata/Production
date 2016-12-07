<?php
/*
* 制作会社問い合わせプラグイン
* 管理コントローラー
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Production Plugin Project
* @since        ver.0.9.0
*/

/**
 * 管理コントローラー
 *
 * @package baser.plugins.production
 */
class ProductionConfigsController extends ProductionAppController {

    /**
     * クラス名
     *
     * @var string
     * @access public
     */
    public $name = 'ProductionConfigs';

    /**
     * コンポーネント
     *
     * @var array
     * @access public
     */
    //4系統
    //public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure', 'Security', 'BcContents');
    public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure', 'Security');

    /**
     * モデル
     *
     * @var array
     * @access public
     */
    public $uses = array('Production.ProductionConfig');

    /**
     * ぱんくずナビ
     *
     * @var string
     * @access public
     */
    public $crumbs = array(
        array('name' => 'プラグイン管理', 'url' => array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')),
        array('name' => '制作会社お問い合わせ管理', 'url' => array('controller' => 'production_configs', 'action' => 'index'))
    );

    /**
     * サブメニューエレメント
     *
     * @var array
     * @access public
     */
    public $subMenuElements = array('production_config');

    /**
     * beforeFilter
     *
     * @return	void
     * @access 	public
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

    /**
     * [ADMIN] 設定画面
     *
     * @return void
     */
    public function admin_index() {

        //データの取り出し
        $productionConfigs = $this->ProductionConfig->find('first');

        //データが送信されているかどうかの確認
        if(!empty($this->request->data)){
            //上書きの設定をしておく。
            if(!empty($productionConfigs)){
                $this->ProductionConfig->id = 1; //常に1
            }
            //保存実行
            if($this->ProductionConfig->save($this->request->data)){
                $this->setMessage('制作会社へのお問い合わせ設定を変更しました。', false, true);
                $this->redirect(array('action' => 'admin_index'));
            //エラーあり
            }else{
                $this->setMessage('入力エラーです。内容を修正してください。', true);
            }

        }else{
            //データのセット
            $this->request->data = $productionConfigs;
        }

        /* 表示設定 */
        $this->pageTitle = '制作会社 お問い合わせ設定';
        $this->render('form');
    }

}
