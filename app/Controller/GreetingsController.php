<?php
App::uses('AppController', 'Controller');
/**
 * Greetings Controller
 *
 * @property Greeting $Greeting
 * @property PaginatorComponent $Paginator
 */
class GreetingsController extends AppController {

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
		$this->Greeting->recursive = 0;
		$this->set('greetings', $this->Paginator->paginate());

		// create new greeting
		if ($this->request->is('post')) {
			$this->Greeting->create();
			if ($this->Greeting->save($this->request->data)) {
				$this->Session->setFlash(__('The greeting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The greeting could not be saved. Please, try again.'));
			}
		}

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Greeting->exists($id)) {
			throw new NotFoundException(__('Invalid greeting'));
		}
		$options = array('conditions' => array('Greeting.' . $this->Greeting->primaryKey => $id));
		$this->set('greeting', $this->Greeting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Greeting->create();
			if ($this->Greeting->save($this->request->data)) {
				$this->Session->setFlash(__('The greeting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The greeting could not be saved. Please, try again.'));
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
		if (!$this->Greeting->exists($id)) {
			throw new NotFoundException(__('Invalid greeting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Greeting->save($this->request->data)) {
				$this->Session->setFlash(__('The greeting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The greeting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Greeting.' . $this->Greeting->primaryKey => $id));
			$this->request->data = $this->Greeting->find('first', $options);
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
		$this->Greeting->id = $id;
		if (!$this->Greeting->exists()) {
			throw new NotFoundException(__('Invalid greeting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Greeting->delete()) {
			$this->Session->setFlash(__('The greeting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The greeting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
