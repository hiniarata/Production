<?php

class ProductionViewEventListener extends BcViewEventListener {

// 登録先イベントの定義
    public $events = array(
        'header',
    );

    public function header(CakeEvent $event){
        //管理画面のみで実装
        if (!BcUtil::isAdminSystem()) {
            return;
        }
        //出力内容に追記
        $View = $event->subject();
        return $event->data['out']. $View->element('Production.production_contact');
    }
}
