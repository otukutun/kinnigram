<?php
App::uses("AppController","Controller");

class ApiUsersController extends AppController {

        public $uses = array('User','Kintore','Nice','Favorite','Comment','Category');


        /*******************************
         *プロフィール関連の情報を提供する
         *
         *
         *******************************/
        public function view($id = null) {//ユーザ詳細
                if ($id == null) {
                        $user = array('error' => "can't find user info.");
                }
                $this->User->id = $id;
                $user = $this->User->read(null,$id);
                $this->set(array(
                        'user' => $user,
                        '_serialize' => array('user')
                ));
                //$this->set('output',$output);
        }

        public function edit($id = null) {//ユーザ編集
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                        $message = 'saved';
                } else {
                        $message = 'error';
                }
                $this->set(array('message' => $message,'_serialize' => array($message)));
        }

        public function index() {//ユーザ一覧を表示する
                $users = $this->User->find('all');
                $this->set(array(
                        'users' => $users,
                        '_serialize' => array('users')
                ));
        }
}
