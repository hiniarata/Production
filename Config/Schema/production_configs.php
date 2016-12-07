<?php


class ProductionConfigsSchema extends CakeSchema {

    public $name = 'ProductionConfigs';

    public $file = 'production_configs.php';

    public $connection = 'plugin';

    public function before($event = array()) {
        return true;
    }

    public function after($event = array()) {
    }

    public $production_configs = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50),
        'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

}
