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
                    $this->request->data['Kintore']['file'] = $this->Kintore->fileUpload($this->request->data['Kintore']['file']);

                    if ($this->request->data['Kintore']['file'] === false) {//ファイルがアップロードされなかった場合の処理
                            $this->Session->setFlash(
                                    __('The %s could not be saved. Please, try again.', __('kintore')),
                                    'alert',
                                    array(
                                            'plugin' => 'TwitterBootstrap',
                                            'class' => 'alert-success'
                                    )
                            );
                            $this->redirect(array('action' => 'index'));
                    } //endif
                    $this->Kintore->makeThumbnail($this->request->data['Kintore']['file']);

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
