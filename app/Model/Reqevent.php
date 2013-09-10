<?php
App::uses('AppModel', 'Model');
/**
 * Reqevent Model
 *
 * @property Spec $Spec
 * @property Event $Event
 */
class Reqevent extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

	public $virtualFields = array(

		);

	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		'Spec' => array(
			'className' => 'Spec',
			'foreignKey' => 'spec_id',
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
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'reqevent_id',
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

	public function listForSpecId($spec_id = null) {

		$reqevents = $this->find('list',array(

			'fields' => array(
					'Reqevent.id','Reqevent.name','Reqevent.type'
			),
			'conditions' => array(
			'Reqevent.spec_id' => $spec_id
			)

		));

//$this->log($reqevents,LOG_DEBUG);

		// if (!empty($requevents)) {

		// 	$event_types = Configure::read('Events.types');

		// 	foreach ($reqevents as $k => $re) {
		// 		$reqevents[$k]['name'] = $event_types[$re['type']]." - ".$re['name'];

		// 	}



		// }

		
		return $reqevents;

	}

}
