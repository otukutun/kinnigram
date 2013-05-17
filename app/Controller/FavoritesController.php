<?php
App::uses('AppController', 'Controller');
/**
 * Favorites Controller
 *
 * @property Favorite $Favorite
 */
class FavoritesController extends AppController {

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
        public $uses = array('Nice','User','Kintore','Category','Favorite');
        public $paginate = array(
                'limit' => 8);

        /**
         * index method
         *
         * @return void
         */
        public function index($id = null) {
                if ($id == null) {
                        $this->redirect(array('controller' => 'kintores','action' => 'index'));
                }
                $this->User->id = $id;
                if (!$this->User->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('user')));
                }

                $this->Favorite->recursive = 0;
                $this->set('user',$this->User->read(null,$id));
                $this->set('favorites', $this->paginate('Favorite', array('Favorite.user_id' => 1)));
        }

        /**
         * view method
         *
         * @param string $id
         * @return void
         */
        protected function _view($id = null) {
                $this->Favorite->id = $id;
                if (!$this->Favorite->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('favorite')));
                }
                $this->set('favorite', $this->Favorite->read(null, $id));
        }

        /**
         * add method
         *
         * @return void
         */
        public function add($kintore_id = null) {//お気に入り登録機能
                if ($this->request->is('post')) {
                        $auth_user = $this->Session->read('auth_user');
                        $saved = $this->Favorite->addFavorite($kintore_id,$auth_user['id'],$auth_user['username']);
                        if ($saved) {//kintoreテーブルのnice_sumを追加

                                $this->Kintore->id = $kintore_id;
                                $this->Kintore->saveField('favorite_sum',$this->Favorite->find('count',array('conditions' => array('Favorite.kintore_id' => $kintore_id))));
                                $this->Session->setFlash(
                                        __('お気に入り登録しました。'),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-success'
                                        )
                                );
                                $this->redirect(array('controller' => 'kintores','action' => 'index'));
                        } else {
                                $this->Session->setFlash(
                                        __('お気に入り登録に失敗しました。'),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-error'
                                        )
                                );
                                $this->redirect(array('controller' => 'kintores','action' => 'index'));
                        }
                }
                /*$users = $this->Favorite->User->find('list');
                $kintores = $this->Favorite->Kintore->find('list');
                $this->set(compact('users', 'kintores'));*/
        }

        /**
         * edit method
         *
         * @param string $id
         * @return void
         */
        protected function _edit($id = null) {
                $this->Favorite->id = $id;
                if (!$this->Favorite->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('favorite')));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Favorite->save($this->request->data)) {
                                $this->Session->setFlash(
                                        __('The %s has been saved', __('favorite')),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-success'
                                        )
                                );
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(
                                        __('The %s could not be saved. Please, try again.', __('favorite')),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-error'
                                        )
                                );
                        }
                } else {
                        $this->request->data = $this->Favorite->read(null, $id);
                }
                $users = $this->Favorite->User->find('list');
                $kintores = $this->Favorite->Kintore->find('list');
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
                $this->Favorite->id = $id;
                if (!$this->Favorite->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('favorite')));
                }
                if ($this->Favorite->delete()) {
                        $this->Session->setFlash(
                                __('お気に入りを取り消しました。'),
                                'alert',
                                array(
                                        'plugin' => 'TwitterBootstrap',
                                        'class' => 'alert-success'
                                )
                        );
                        $this->redirect(array('controller' => 'kintores','action' => 'index'));
                }
                $this->Session->setFlash(
                        __('お気に入りを取り消せませんでした。'),
                        'alert',
                        array(
                                'plugin' => 'TwitterBootstrap',
                                'class' => 'alert-error'
                        )
                );
                $this->redirect(array('controller' => 'kintores','action' => 'index'));
        }
}
