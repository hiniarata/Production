<?php
/*
* 制作会社問い合わせプラグイン
* コントローラー
*
* PHP 5.4.x
*
* @copyright    Copyright (c) hiniarata co.ltd
* @link         https://hiniarata.jp
* @package      Production Plugin Project
* @since        ver.0.9.0
*/

/**
 * コントローラー
 *
 * @package baser.plugins.production
 */
class ProductionsController extends ProductionAppController {

    /**
     * クラス名
     *
     * @var string
     * @access public
     */
    public $name = 'Productions';

    /**
     * コンポーネント
     *
     * @var array
     * @access public
     */
    public $components = array('BcAuth', 'Cookie', 'Email', 'BcEmail', 'BcAuthConfigure', 'Security');

    /**
     * モデル
     *
     * @var array
     * @access public
     */
    public $uses = array('Production.ProductionConfig', 'SiteConfig');

    /**
     * ぱんくずナビ
     *
     * @var string
     * @access public
     */
    public $crumbs = array(
    );

    /**
     * サブメニューエレメント
     *
     * @var array
     * @access public
     */
    public $subMenuElements = array('production');

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

        //設定データ取得
        $productionConfigs = $this->ProductionConfig->find('first');
        $this->set('productionConfigs', $productionConfigs);

        //サイト設定取得
        $siteConfig = $this->SiteConfig->find('all');

        //データが送信されているかどうかの確認
        if(!empty($this->request->data)){

            /* MEMO
             * Emailコンポーネントを継承したBcEmailコンポーネントを利用したいと思ったが、
             * 上手く動いてくれなかった。
             * 素のEmailコンポーネントだと、おそらくプラグイン内のテンプレートを読み込めない様子なので、
             * とりあえずベタ書きすることにした。
             **/
            $this->Email->charset = 'utf-8';
            //お客様
            $this->Email->to = $productionConfigs['ProductionConfig']['email'];
            //Fromメールアドレス
            $this->Email->from = $siteConfig['5']['SiteConfig']['value'];
            //メールタイトル
            $this->Email->subject = "お問い合わせを受けました";

            $msg = date('Y-m-d H:i;s'). '送信
--------------------------------

お問い合わせを受けました

--------------------------------

 ■WEBサイト：'. $this->request->data['Production']['uri'] .'

 ■お問い合わせ内容：
 '. $this->request->data['Production']['text'] .'
            
--------------------------------
以上
';
            //送信
            //$this->Email->send($msg);
            if($this->Email->send($msg)){
                $this->setMessage($productionConfigs['ProductionConfig']['name'].'へのお問い合わせを送信しました。', false, true);
                $this->redirect(array('action' => 'admin_index'));
            }else{
                $this->setMessage('送信エラーです。一旦、お電話等で制作会社へお問い合わせください。', true);
            }


        }

        /* 表示設定 */
        $this->pageTitle = '制作会社へのお問い合わせ';
        $this->render('form');
    }

}
