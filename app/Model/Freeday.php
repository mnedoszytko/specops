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
	
	
	/**
	 * getFixedFreeDays function.
	 * zwraca stałe dni wolne od pracy w każdym roku (wielkanoc, boże narodzenie)
	 * @access public
	 * @param int $year_from (default: 2006)
	 * @param int $year_to (default: 2020)
	 * @return void
	 */
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
		return $out;
		
	}
	
	
	/**
	 * getAllFreeDays function.
	 * zwraca wszystkie wolne dni w zakresie (fixed + from db)
	 * @access public
	 * @param mixed $from (default: null)
	 * @param mixed $to (default: null)
	 * @return void
	 */
	public function getAllFreeDays($from = null,$to = null) {
		
		
			 $conditions = null;
			 if (!empty($from)) $conditions['date >='] = $from;
			 if (!empty($to)) $conditions['date <='] = $to;
			 $all = $this->find('all',array('conditions'=>$conditions));
			 
			 $fixed = $this->getFixedFreeDays();
			 $freedates = Set::extract('/Freeday/date',$all);
			 
			 $merged = array_merge($fixed,$freedates);
			 
			 return $this->sortDateStrings($merged);
 			
 			return $merged;
			 
		  
	}
	
	
	
/**
 * getWorkingDaysInRange function.
 * zwroc array z dniami pracujacymi w danym zakresie
 * @access public
 * @param mixed $from (default: null) w formacie Y-m-d
 * @param mixed $to (default: null) w formacie Y-m-d
 * @return array (of Y-m-d's)
 */
public function getWorkingDaysInRange($from = null,$to = null) {
	
	$range = $this->createDateRangeArray($from,$to);
	
	$freedays = $this->getallFreeDays($from,$to);
	$out = array();
	foreach ($range as $date) {
		
		if (in_array($date,$freedays)) continue;
		if (date('N', strtotime($date)) >= 6) continue; //weekend
		$out[] = $date;

		
	}
	$out = $this->sortDateStrings($out);
	
	return $out;
	
	
	
	
}

/**
 * countWorkingDaysInRange function.
 * policz liczbe dni pracujacych w zakresie dat
 * @access public
 * @param mixed $from (default: null)
 * @param mixed $to (default: null)
 * @return int
 */
public function countWorkingDaysInRange($from = null,$to = null) {
	
	$workingdays = $this->getWorkingDaysInRange($from,$to);
	return count($workingdays);
	
	
}



/**
 * sortDateStrings function.
 * sortuj array z datami
 * @access private
 * @param mixed $array
 * @return array
 */
private function sortDateStrings($array) {
	
	
	
	 usort($array, function($a1, $a2) {
				 $v1 = strtotime($a1);
				 $v2 = strtotime($a2);
				 return $v1 - $v2; // $v2 - $v1 to reverse direction
 			});
		return $array;
	
}




/**
 * createDateRangeArray function.
 * zwroc macierz z y-m-d dla zakresu day
 * @access private
 * @param mixed $start Y-m-d
 * @param mixed $end Y-m-d
 * @return void
 */
private function createDateRangeArray($start, $end) {
// Modified by JJ Geewax 

$range = array();

if (is_string($start) === true) $start = strtotime($start);
if (is_string($end) === true ) $end = strtotime($end);

if ($start > $end) return createDateRangeArray($end, $start);

do {
$range[] = date('Y-m-d', $start);
$start = strtotime("+ 1 day", $start);
}
while($start < $end);

return $range;
}
	
	
}
