<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property Reqevent $Reqevent
 */
class Event extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'reqevent_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Reqevent' => array(
			'className' => 'Reqevent',
			'foreignKey' => 'reqevent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
