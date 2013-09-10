<?php
App::uses('AppController', 'Controller');
/**
 * Schedules Controller
 *
 * @property Schedule $Schedule
 * @property PaginatorComponent $Paginator
 */
class SchedulesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses =array('Schedule','Freeday');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Schedule->recursive = 0;
		
		$schedules = $this->Paginator->paginate();
		foreach ($schedules as $i => $s) {
			$schedules[$i]['Schedule']['wdays'] = $this->Freeday->countWorkingDaysInRange($s['Schedule']['start'],$s['Schedule']['end']);
		}
		
		$this->set('schedules', $schedules);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Schedule->exists($id)) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		$options = array(
			'contain' => array(
					'Spec' => array(
							'Reqevent'
						)
				),

			'conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));

		$schedule = $this->Schedule->find('first', $options);
		$schedule['Schedule']['wdays'] = $this->Freeday->countWorkingDaysInRange($schedule['Schedule']['start'],$schedule['Schedule']['end']);
		$this->set('schedule', $schedule);
		$reqevents = $this->Schedule->Spec->Reqevent->listForSpecId($schedule['Schedule']['spec_id']);
		$this->set('reqevents',$reqevents);
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Schedule->create();
			if ($this->Schedule->save($this->request->data)) {
				$this->Session->setFlash(__('The schedule has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The schedule could not be saved. Please, try again.'));
			}
		}
		$specs = $this->Schedule->Spec->find('list');
		$this->set(compact('specs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Schedule->exists($id)) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Schedule->save($this->request->data)) {
				$this->Session->setFlash(__('The schedule has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));
			$this->request->data = $this->Schedule->find('first', $options);
		}
		$specs = $this->Schedule->Spec->find('list');
		$this->set(compact('specs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Schedule->id = $id;
		if (!$this->Schedule->exists()) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Schedule->delete()) {
			$this->Session->setFlash(__('Schedule deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Schedule was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
