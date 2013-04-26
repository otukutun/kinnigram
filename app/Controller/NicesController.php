<?php
App::uses('AppController', 'Controller');
/**
 * Nices Controller
 *
 * @property Nice $Nice
 */
class NicesController extends AppController {

/**
 *  Layout
 *
 * @var string
 */
	//public $layout = 'bootstrap';

/**
 * Helpers
 *
 * @var array
 */
	//public $helpers = array('TwitterBootstrap.BootstrapHtml', 'TwitterBootstrap.BootstrapForm', 'TwitterBootstrap.BootstrapPaginator');
/**
 * Components
 *
 * @var array
 */
	//public $components = array('Session');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Nice->recursive = 0;
		$this->set('nices', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Nice->id = $id;
		if (!$this->Nice->exists()) {
			throw new NotFoundException(__('Invalid %s', __('nice')));
		}
		$this->set('nice', $this->Nice->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                $this->Nice->create();
                //$user = $this->Session->read('user');
                //$this->request->data['Kintore']['user_id'] = $user['id'];
			if ($this->Nice->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('nice')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('nice')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$kintores = $this->Nice->Kintore->find('list');
		$users = $this->Nice->User->find('list');
		$this->set(compact('kintores', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Nice->id = $id;
		if (!$this->Nice->exists()) {
			throw new NotFoundException(__('Invalid %s', __('nice')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Nice->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('nice')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('nice')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Nice->read(null, $id);
		}
		$kintores = $this->Nice->Kintore->find('list');
		$users = $this->Nice->User->find('list');
		$this->set(compact('kintores', 'users'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Nice->id = $id;
		if (!$this->Nice->exists()) {
			throw new NotFoundException(__('Invalid %s', __('nice')));
		}
		if ($this->Nice->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('nice')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('nice')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
