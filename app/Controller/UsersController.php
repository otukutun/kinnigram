<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'OAuth/OAuthClient');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

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
        public $uses = array('Nice','User','Kintore','Category','Comment','Favorite');
        public $paginate = array(
                'limit' => 8);
        /**
         * Components
         *
         * @var array
         */

        public function beforeFilter() {
                parent::beforeFilter();
                $this->Auth->allow('twitter_login','login','callback','twitter_add','about','top','question');
        }

        public function twitter_add() {//ユーザ登録のページ
        }

        public function about() {//ユーザ登録のページ
        }

        public function top() {//ユーザ登録のページ
        }

        public function question() {//質問ページ
        }
        public function twitter_login() {
                $client = $this->createClient();
                $requestToken = $client->getRequestToken('https://api.twitter.com/oauth/request_token', FULL_BASE_URL . '/nomado/users/callback');
                debug($requestToken);
                if ($requestToken) {
                        $this->Session->write('twitter_request_token',$requestToken);
                        $this->redirect('https://api.twitter.com/oauth/authorize?oauth_token=' . $requestToken->key);
                } else {
                        $this->Session->setFlash(__('ログアウトしました。'));
                        $this->redirect(array('controller' => 'users','action' => 'login'));
                }

        }

        public function callback() {
                if ($this->request->query['denied']) {//アプリの認証をキャンセルされた際のリダイレクト処理
                        $this->redirect(array('controller' => 'users','action' => 'login'));
                }
                $requestToken = $this->Session->read('twitter_request_token');
                $client = $this->createClient();
                $accessToken = $client->getAccessToken('https://api.twitter.com/oauth/access_token',$requestToken);


                if ($accessToken) {
                        //debug($accessToken);
                        $user_json = $client->get($accessToken->key, $accessToken->secret,'https://api.twitter.com/1.1/account/verify_credentials.json');
                        $user = json_decode($user_json, true);

                        if ($user) {
                                $user_id = $this->User->twitterUpdate(array(
                                        'twitter_id' => $user['id_str'],
                                        'username' => $user['screen_name'],
                                        'oauth_token' => $accessToken->key,
                                        'oauth_token_secret' => $accessToken->secret,
                                        'file' => $user['profile_image_url'],
                                ));
                                $auth = array('User' => array('oauth_token' => $accessToken->key,
                                        'oauth_token_secret' => $accessToken->secret,
                                ));

                                if ($this->Auth->login($auth)) {//ログインに成功したら
                                        $this->Session->write('auth_user',$user_id['User']);
                                        $this->redirect(array('controller' => 'kintores','action' => 'index'));
                                } else {//ログインに失敗したら
                                        $this->redirect(array('controller' => 'users','action' => 'login'));
                                }
                        } /*else {
                                $this->redirect(array('controller' => 'users','action' => 'login'));
                } */

                }
        }

        public function login() {
        }

        public function logout() {
                $this->Session->destroy();
                $this->Session->setFlash(
                        __('ログアウトしました。'),
                        'alert',
                        array(
                                'plugin' => 'TwitterBootstrap',
                                'class' => 'alert-success'
                        )
                );
                $this->Session->delete($this->Auth->sessionKey);
                $this->redirect($this->Auth->logoutRedirect);
        }
        /**
         * index method
         *
         * @return void
         */
        public function index() {
                $this->User->recursive = 0;
                $this->set('users', $this->paginate('User'));
        }

    /*public function oauth_callback() {

            if (!$this->Twitter->isRequested()) {
                    $this->flash(__('invalid access'), '/',5);
                    return;
            }

            //アクセストークンの取得
            $this->Twitter->setTwitterSource('twitter');
            $token = $this->Twitter->getAccessToken();

            //アクセストークンを正しく取得できなかった場合の処理
            if (is_string($token)) {
                    $this->flash(__('fail get access token.') . $token, '/', 5);
                    return;
            }

            //以上のifに一致しなかった場合は正しく処理されたものとして扱い
            //$data['User']に情報を設定する
            $data['User'] = array(
                    'id' => $token['user_id'],
                    'username' => $token['screen_name'],
                    'password' => Security::hash($token['oauth_token']),
                    'oauth_token' => $token['oauth_token'],
                    'oauth_token_secret' => $token['oauth_token_secret'],
            );

            //設定したトークンをusersテーブルに書き込む処理と、失敗した場合の処理
            if (!$this->User->save($data)) {
                    $this->flash(__('user not saved.'), 'login',5);
                    return;
            }
            //認証およびusersテーブルへの書き込みが完了したので、
            //CakePHPサービス自信へのログインを実施し、ログイン完了後の画面にリダイレクト
            $this->Auth->login($data);
            $this->redirect($this->Auth->loginRedirect);


    }*/

        /**
         * view method
         *
         * @param string $id
         * @return void
         */
        public function view($id = null) {
                $this->User->id = $id;
                if (!$this->User->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('user')));
                }
                $this->User->recursive = 0;

                $this->set('user', $this->User->read(null, $id));
                $this->set('kintores', $this->paginate('Kintore', array('Kintore.user_id' => $id)));
        }

        /**
         * add method
         *
         * @return void
         */
        public function _add() {
                if ($this->request->is('post')) {
                        $this->User->create();
                        if ($this->User->save($this->request->data)) {
                                $this->Session->setFlash(
                                        __('The %s has been saved', __('user')),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-success'
                                        )
                                );
                                $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(
                                        __('The %s could not be saved. Please, try again.', __('user')),
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
                $this->User->id = $id;
                if (!$this->User->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('user')));
                }
                $auth_user = $this->Session->read('auth_user');

                if ($auth_user['id'] !== $id) {//本人か確認
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
                        if ($this->User->save($this->request->data)) {
                                $this->Session->setFlash(
                                        __('ユーザ情報を編集しました。'),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-success'
                                        )
                                );
                                $this->redirect(array('action' => 'view',$id));
                        } else {
                                $this->Session->setFlash(
                                        __('ユーザ情報が更新されませんでした。'),
                                        'alert',
                                        array(
                                                'plugin' => 'TwitterBootstrap',
                                                'class' => 'alert-error'
                                        )
                                );
                        }
                } else {
                        $this->request->data = $this->User->read(null, $id);
                }
                $this->set('auth_user',$auth_user);
                $this->set('user',$this->User->find('first',array('conditions' => array('id' => $id))));
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
                $this->User->id = $id;
                if (!$this->User->exists()) {
                        throw new NotFoundException(__('Invalid %s', __('user')));
                }
                if ($this->User->delete()) {
                        $this->Session->setFlash(
                                __('The %s deleted', __('user')),
                                'alert',
                                array(
                                        'plugin' => 'TwitterBootstrap',
                                        'class' => 'alert-success'
                                )
                        );
                        $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(
                        __('The %s was not deleted', __('user')),
                        'alert',
                        array(
                                'plugin' => 'TwitterBootstrap',
                                'class' => 'alert-error'
                        )
                );
                $this->redirect(array('action' => 'index'));
        }

        private function createClient() {
                return new OAuthClient('Ec5mcESyv0AhWrc46GbHrg', 'PFX8NjtBS1XdLuuHIhQ4TGFLH8NHzhP5ijWS8UK0Js');
        }
}
