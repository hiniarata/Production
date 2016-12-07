<?php
/**
* システムナビ
*/

$config['BcApp.adminNavi.production'] = array(
    'name'		=> '制作会社へのお問い合わせ プラグイン',
    'contents'	=> array(
    array('name' => 'お問い合わせフォーム',
        'url' => array(
        'admin' => true,
        'plugin' => 'production',
        'controller' => 'production',
        'action' => 'index')
        )
    )
);
