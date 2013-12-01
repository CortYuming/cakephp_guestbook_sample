<?php 

class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
		if (isset($event['create'])) {
			switch ($event['create']) {
				case 'greetings':
					App::uses('ClassRegistry', 'Utility');
					$greeting = ClassRegistry::init('Greeting');

					foreach (range(1, 50) as $num) {
						$greeting->create();
						$greeting->save(
							array('Greeting' =>
								array(
									'name' => 'NAME' . (int)$num,
									'comment' => 'COMMENT'. (int)$num,
								)
							)
						);
					}
					break;
			}
		}
	}

	public $greetings = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comment' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
