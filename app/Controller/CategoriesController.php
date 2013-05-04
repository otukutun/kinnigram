<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

/**
 *  Layout
 *
 * @var string
 */
        //public $layout = 'bootstrap';
        //a

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

        public function beforeFilter() {
                parent::beforeFilter();
                $auth_user = $this->Session->read('auth_user');
                if ($auth_user['username']  !== 'otukutun') {
                        $this->Session->setFlash(
                                __('アクセスできません'),
                                'alert',
                                array(
                                        'plugin' => 'TwitterBootstrap',
                                        'class' => 'alert-error'
                                )
                        );
                        $this->redirect(array('controller' => 'kintores','action' => 'index'));

                }


        }
        public function index() {
                $this->Category->recursive = 0;
                $this->set('categories', $this->paginate());
        }

        /**
         * view method
         *
         * @param string $id
         * @return void
         */
        public function view($id = null) {
                $this->Category->id = $id;
                if (!$this->Category->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('category')));
                }
                $this->set('category', $this->Category->read(null, $id));
        }

        /**
         * add method
         *
         * @return void
         */
        public function add() {
                if ($this->request->is('post')) {
                        $this->Category->create();
                        if ($this->Category->save($this->request->data)) {
                                $this->Session->setFlash(
                                        __('The %s has been saved', __('category')),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-success'
                                        )
                                );
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(
                                        __('The %s could not be saved. Please, try again.', __('category')),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-error'
                                        )
                                );
                        }
                }
        }

        /**
         * edit method
         *
         * @param string $id
         * @return void
         */
        public function edit($id = null) {
                $this->Category->id = $id;
                if (!$this->Category->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('category')));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Category->save($this->request->data)) {
                                $this->Session->setFlash(
                                        __('The %s has been saved', __('category')),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-success'
                                        )
                                );
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(
                                        __('The %s could not be saved. Please, try again.', __('category')),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-error'
                                        )
                                );
                        }
                } else {
                        $this->request->data = $this->Category->read(null, $id);
                }
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
                $this->Category->id = $id;
                if (!$this->Category->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('category')));
                }
                if ($this->Category->delete()) {
                        $this->Session->setFlash(
                                __('The %s deleted', __('category')),
                                'alert',
                                array(
                                        'plugin' => 'TwitterBootstrap',
                                        'class' => 'alert-success'
                                )
                        );
                        $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(
                        __('The %s was not deleted', __('category')),
                        'alert',
                        array(
                                'plugin' => 'TwitterBootstrap',
                                'class' => 'alert-error'
                        )
                );
                $this->redirect(array('action' => 'index'));
        }
}
