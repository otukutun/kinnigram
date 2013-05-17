<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 */
class CommentsController extends AppController {

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
        //public $helpers = array('TwitterBootstrap.BootstrapForm', 'TwitterBootstrap.BootstrapPaginator');
        public $uses = array('Nice','User','Kintore','Category','Comment','Favorite');
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
	protected function _index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	protected function _view($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid %s', __('comment')));
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                $this->Comment->create();
                $auth_user = $this->Session->read('auth_user');
                $this->request->data['Comment']['user_id'] = $auth_user['id'];
                $this->request->data['Comment']['username'] = $auth_user['username'];
                if ($this->Comment->save($this->request->data)) {
                        //コメントの合計数をカウントする
                        $this->Kintore->id = $this->request->data['Comment']['kintore_id'];
                        $this->Kintore->saveField('comment_sum',$this->Comment->find('count',array('conditions' => array('kintore_id' => $this->request->data['Comment']['kintore_id']))));

				$this->Session->setFlash(
					__('コメントが投稿されました。'),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('controller' => 'kintores','action' => 'view',$this->request->data['Comment']['kintore_id']));
			} else {
				$this->Session->setFlash(
					__('コメントが投稿されませんでした。'),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
				$this->redirect(array('controller' => 'kintores','action' => 'view',$this->request->data['Comment']['kintore_id']));
			}
		}
		/*$users = $this->Comment->User->find('list');
		$kintores = $this->Comment->Kintore->find('list');
        $this->set(compact('users', 'kintores'));*/
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	protected function _edit($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid %s', __('comment')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('comment')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('comment')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Comment->read(null, $id);
		}
		$users = $this->Comment->User->find('list');
		$kintores = $this->Comment->Kintore->find('list');
		$this->set(compact('users', 'kintores'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	protected function _delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid %s', __('comment')));
		}
		if ($this->Comment->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('comment')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('comment')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
