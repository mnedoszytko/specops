<?php
App::uses('AppController', 'Controller');
/**
 * Freedays Controller
 *
 * @property Freeday $Freeday
 * @property PaginatorComponent $Paginator
 */
class FreedaysController extends AppController {

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
		$this->Freeday->recursive = 0;
		$this->set('freedays', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Freeday->exists($id)) {
			throw new NotFoundException(__('Invalid freeday'));
		}
		$options = array('conditions' => array('Freeday.' . $this->Freeday->primaryKey => $id));
		$this->set('freeday', $this->Freeday->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Freeday->create();
			if ($this->Freeday->save($this->request->data)) {
				$this->Session->setFlash(__('The freeday has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The freeday could not be saved. Please, try again.'));
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
		if (!$this->Freeday->exists($id)) {
			throw new NotFoundException(__('Invalid freeday'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Freeday->save($this->request->data)) {
				$this->Session->setFlash(__('The freeday has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The freeday could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Freeday.' . $this->Freeday->primaryKey => $id));
			$this->request->data = $this->Freeday->find('first', $options);
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
		$this->Freeday->id = $id;
		if (!$this->Freeday->exists()) {
			throw new NotFoundException(__('Invalid freeday'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Freeday->delete()) {
			$this->Session->setFlash(__('Freeday deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Freeday was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
