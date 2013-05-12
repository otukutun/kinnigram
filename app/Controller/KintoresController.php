<?php
App::uses('AppController', 'Controller');
/**
 * Kintores Controller
 *
 * @property Kintore $Kintore
 */
class KintoresController extends AppController {

        public $paginate = array(
                'limit' => 12);

/**
 *  Layout
 *
 * @var string
 */

/**
 * Helpers
 *
 * @var array
 */
/**
 * Components
 *
 * @var array
 */
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Kintore->recursive = 1;
        $this->set('kintores', $this->paginate());
        $this->set('auth_user',$this->Session->read('auth_user'));
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
        $this->Kintore->countUp($id);
		$this->Kintore->recursive = 2;
		$this->set('kintore', $this->Kintore->read(null, $id));
        $this->set('auth_user',$this->Session->read('auth_user'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            if ($this->request->is('post')) {
                    $user = $this->Session->read('user');
                    $this->request->data['Kintore']['user_id'] = $user['id'];
                    $this->Kintore->create();
                    $this->request->data['Kintore']['file'] = $this->Kintore->fileUpload($this->request->data['Kintore']['file']);

                    if ($this->request->data['Kintore']['file'] === false) {//ファイルがアップロードされなかった場合の処理
                            $this->Session->setFlash(
                                    __('アップロードされませんでした。'),
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
                                    __('投稿されました。'),
                                    'alert',
                                    array(
                                            'plugin' => 'TwitterBootstrap',
                                            'class' => 'alert-success'
                                    )
                            );
                            $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Session->setFlash(
                                    __('投稿に失敗しました。'),
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
            $this->set('auth_user',$this->Session->read('auth_user'));
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
            $accessed_user = $this->Kintore->read();
            $auth_user = $this->Session->read('auth_user');

            if ($auth_user['username'] !== 'otukutun') {//ユーザアクセス拒否
                    $this->redirect(array('controller' => 'kintores', 'action' => 'index'));

            }
            if ($auth_user['id'] !== $accessed_user['User']['id']) {//投稿者のみが編集できる
                $this->Session->setFlash(
					__('編集できません'),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
				$this->redirect(array('action' => 'index'));
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
    }//end_edit_function

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
