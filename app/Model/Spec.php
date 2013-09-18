<?php
App::uses('AppModel', 'Model');
/**
 * Spec Model
 *
 * @property Reqevent $Reqevent
 */
class Spec extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
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
		'start' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end' => array(
			'date' => array(
				'rule' => array('date'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Reqevent' => array(
			'className' => 'Reqevent',
			'foreignKey' => 'spec_id',
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

	public function afterFind($results,$primary = false) {


			if (!empty($results)) {
				if (empty($results['Spec'])) {

					foreach ($results as $i => $result) {

							if (!empty($result['Spec'])) {
								$total_re_days = 0;
								$total_re_k_days = 0;
								$total_re_s_days = 0;
								if (!empty($result['Reqevent']) && is_array($result['Reqevent'])) {


									foreach ($result['Reqevent'] as $re) {
										$total_re_days += $re['days'];
										if ($re['type'] == 'k') $total_re_k_days += $re['days'];
										if ($re['type'] == 's') $total_re_s_days += $re['days'];											
									}
									$results[$i]['Spec']['total_re_days'] = $total_re_days;
									$results[$i]['Spec']['total_re_k_days'] = $total_re_k_days;
									$results[$i]['Spec']['total_re_s_days'] = $total_re_s_days;
								}
							}

					}

				}

			}

			return $results;


	}



}
