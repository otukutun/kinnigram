<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'twitter_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'access_token' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 70, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'access_token_secret' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 70, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'detail' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'age' => array('type' => 'integer', 'null' => true, 'default' => null),
		'email' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'twitter_id' => 1,
			'access_token' => 'Lorem ipsum dolor sit amet',
			'access_token_secret' => 'Lorem ipsum dolor sit amet',
			'detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'age' => 1,
			'email' => 1,
			'created' => '2013-04-15 17:43:17',
			'modified' => '2013-04-15 17:43:17'
		),
	);

}
