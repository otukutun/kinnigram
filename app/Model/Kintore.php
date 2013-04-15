<?php
App::uses('AppModel', 'Model');
/**
 * Kintore Model
 *
 * @property Category $Category
 * @property Nice $Nice
 */
class Kintore extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'kintore';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Nice' => array(
			'className' => 'Nice',
			'foreignKey' => 'kintore_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
