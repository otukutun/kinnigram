<?php
App::uses('AppModel', 'Model');
/**
 * Nice Model
 *
 * @property Kintore $Kintore
 * @property User $User
 */
class Nice extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Kintore' => array(
			'className' => 'Kintore',
			'foreignKey' => 'kintore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
