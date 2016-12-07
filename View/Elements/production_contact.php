<?php $this->BcBaser->css('Production.production') ?>
<?php $this->BcBaser->link(
    $this->BcBaser->getImg('Production.production_mail_btn.png'),
    array('plugin' => 'production', 'controller' => 'productions', 'action' => 'admin_index'),
    array('id' => 'productionContactBtn', 'escape'=>false),
    false
)?>

