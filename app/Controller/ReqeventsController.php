<?php
App::uses('AppController', 'Controller');
/**
 * Reqevents Controller
 *
 * @property Reqevent $Reqevent
 * @property PaginatorComponent $Paginator
 */
class ReqeventsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Reqevent->recursive = 0;
		$this->set('reqevents', $this->Paginator->paginate());
	}
	
	
	public function spec($spec_id = null) {
		$this->Reqevent->recursive = 0;
		$this->set('reqevents', $this->Paginator->paginate(array('Reqevent.spec_id'=>$spec_id)));
		$this->set('spec',$this->Reqevent->Spec->find('first',array('conditions'=>array('Spec.id'=>$spec_id))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reqevent->exists($id)) {
			throw new NotFoundException(__('Invalid reqevent'));
		}
		$options = array('conditions' => array('Reqevent.' . $this->Reqevent->primaryKey => $id));
		$this->set('reqevent', $this->Reqevent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reqevent->create();
			if ($this->Reqevent->save($this->request->data)) {
				$this->Session->setFlash(__('The reqevent has been saved'));
				return $this->redirect(array('action' => 'spec',$this->request->data['Reqevent']['spec_id']));
			} else {
				$this->Session->setFlash(__('The reqevent could not be saved. Please, try again.'));
			}
		}
		$specs = $this->Reqevent->Spec->find('list');
		if (!empty($this->params['named']['spec_id'])) $this->set('spec_id',$this->params['named']['spec_id']);
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
		if (!$this->Reqevent->exists($id)) {
			throw new NotFoundException(__('Invalid reqevent'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reqevent->save($this->request->data)) {
				$this->Session->setFlash(__('The reqevent has been saved'));
				return $this->redirect(array('action' => 'spec',$this->request->data['Reqevent']['spec_id']));
			} else {
				$this->Session->setFlash(__('The reqevent could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reqevent.' . $this->Reqevent->primaryKey => $id));
			$this->request->data = $this->Reqevent->find('first', $options);
		}
		$specs = $this->Reqevent->Spec->find('list');
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
		$this->Reqevent->id = $id;
		if (!$this->Reqevent->exists()) {
			throw new NotFoundException(__('Invalid reqevent'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reqevent->delete()) {
			$this->Session->setFlash(__('Reqevent deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Reqevent was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
