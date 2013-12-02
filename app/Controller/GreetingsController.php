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
		$this->Paginator->settings = array(
			'limit' => 5,
			'order' => array(
				'Greeting.created' => 'desc'
			)
		);
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

		// will not exceed the total amount.
		$max_num = 50;
		$totalNum = $this->Greeting->find('count');
		if ($totalNum > $max_num) {
			$lastGreeting = $this->Greeting->find('first', array(
					'order' => array(
						'Greeting.created' => 'asc'
					)
				));
			$id = $lastGreeting['Greeting']['id'];
			$this->delete($id);
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
		$this->Greeting->delete();
	}
}
