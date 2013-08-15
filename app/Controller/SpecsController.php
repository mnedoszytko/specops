<?php
App::uses('AppController', 'Controller');
/**
 * Specs Controller
 *
 * @property Spec $Spec
 * @property PaginatorComponent $Paginator
 */
class SpecsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Spec','Freeday');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Spec->recursive = 0;
		
		$specs = $this->Paginator->paginate();
		
		foreach ($specs as $i => $spec) {
			
			$specs[$i]['Spec']['wdays'] = $this->Freeday->countWorkingDaysInRange($spec['Spec']['start'],$spec['Spec']['end']);
			
		}
		
		
		$this->set('specs', $specs);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Spec->exists($id)) {
			throw new NotFoundException(__('Invalid spec'));
		}
		$options = array('conditions' => array('Spec.' . $this->Spec->primaryKey => $id));
		$this->set('spec', $this->Spec->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Spec->create();
			if ($this->Spec->save($this->request->data)) {
				$this->Session->setFlash(__('The spec has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The spec could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Spec->exists($id)) {
			throw new NotFoundException(__('Invalid spec'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Spec->save($this->request->data)) {
				$this->Session->setFlash(__('The spec has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The spec could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Spec.' . $this->Spec->primaryKey => $id));
			$this->request->data = $this->Spec->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Spec->id = $id;
		if (!$this->Spec->exists()) {
			throw new NotFoundException(__('Invalid spec'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Spec->delete()) {
			$this->Session->setFlash(__('Spec deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Spec was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
