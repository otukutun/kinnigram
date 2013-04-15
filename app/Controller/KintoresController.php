<?php
App::uses('AppController', 'Controller');
/**
 * Kintores Controller
 *
 * @property Kintore $Kintore
 */
class KintoresController extends AppController {

/**
 *  Layout
 *
 * @var string
 */
	public $layout = 'bootstrap';

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('TwitterBootstrap.BootstrapHtml', 'TwitterBootstrap.BootstrapForm', 'TwitterBootstrap.BootstrapPaginator');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Session');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Kintore->recursive = 0;
		$this->set('kintores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Kintore->id = $id;
		if (!$this->Kintore->exists()) {
			throw new NotFoundException(__('Invalid %s', __('kintore')));
		}
		$this->set('kintore', $this->Kintore->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                $this->Kintore->create();
                if (is_uploaded_file($this->request->data['Kintore']['file']['tmp_name'])) {//ファイルのアップロード処理
                    $file = $this->request->data['Kintore']['file'];
		    $file['name'] = time() . substr(strrchr($file['name'],'.'),1);
		    $file_path = 'kintores' . DS . $file['name'];
                    move_uploaded_file($file['tmp_name'],$file_path);
                    $this->request->data['Kintore']['file'] = $file_path;
                }

			if ($this->Kintore->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('kintore')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('kintore')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$categories = $this->Kintore->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Kintore->id = $id;
		if (!$this->Kintore->exists()) {
			throw new NotFoundException(__('Invalid %s', __('kintore')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Kintore->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('kintore')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('kintore')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Kintore->read(null, $id);
		}
		$categories = $this->Kintore->Category->find('list');
		$this->set(compact('categories'));
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
		$this->Kintore->id = $id;
		if (!$this->Kintore->exists()) {
			throw new NotFoundException(__('Invalid %s', __('kintore')));
		}
		if ($this->Kintore->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('kintore')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('kintore')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
