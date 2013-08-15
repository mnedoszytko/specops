<?php
App::uses('AppModel', 'Model');
/**
 * Freeday Model
 *
 */
class Freeday extends AppModel {

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
		'date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	
	public function getFixedFreeDays($year_from = 2006,$year_to = 2020) {
		
		$out = array();
		for ($y = $year_from; $y <= $year_to; $y++) {
			//1.01
			//1.05
			//3.05
			//1.11
			//11.11
			//25.12
			//26.12
			//31.12
			$fixeddates = array(
				'1.01',
				'1.05',
				'3.05',
				'1.11',
				'11.11',
				'25.12',
				'26.12',
				'31.12'
			);
			foreach ($fixeddates as $date) {			
				$out[] = date("Y-m-d",strtotime("$date.$y"));
			}
			
		}
		
	}
	
	
	public function getAllFreeDays($from = null,$to = null) {
		
		
			 $conditions = null;
			 if (!empty($from)) $conditions['date >='] = $from;
			 if (!empty($to)) $conditions['date <='] = $to;
			 $all = $this->find('all',array('conditions'=>$conditions));
			 
			 $fixed = $this->getFixedFreeDays();
			 $freedates = Set::extract('/Freeday/date',$all);
			 
			 $merged = array_merge($fixed,$freedates);
			 
			 
			 usort($merged, function($a1, $a2) {
				 $v1 = strtotime($a1);
				 $v2 = strtotime($a2);
				 return $v1 - $v2; // $v2 - $v1 to reverse direction
 			});
			 
		  
	}
	
	
}
