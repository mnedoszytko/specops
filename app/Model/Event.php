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
				'allowEmpty' => false,
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
		),
		'Schedule'
	);


	public function afterFind($results = null) {


		
		if (is_array($results)) {
				App::import('Model','Freeday');
				$this->Freeday = new Freeday();
			if (!empty($results[0]['Event'])) {
				
				//find alll
				foreach ($results as $k => $result) {
					$results[$k]['Event']['working_days'] = $this->Freeday->countWorkingDaysInRange($result['Event']['start'],$result['Event']['end']);
					//+ detect conflicts

					$conflicts_no = $this->getConflicts($result,'count');
					$results[$k]['Event']['conflicts'] = $conflicts_no;


			}
			}

		}
		return $results;
	}

	public function getConflicts($result,$find_type = 'all') {

		return $this->find($find_type,array(

							'conditions' => array(
								'Event.schedule_id' => $result['Event']['schedule_id'],
								'OR' => array(
									array('Event.start >' => $result['Event']['start'],
									'Event.start <' => $result['Event']['end']),
									array(
										'Event.end >' => $result['Event']['start'],
										'Event.end <' => $result['Event']['end']
										)
								)
						)));

	}

}
