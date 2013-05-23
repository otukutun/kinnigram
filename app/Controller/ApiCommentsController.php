<?php
App::uses("AppController","Controller");

class ApiCommentsController extends AppController {

        public $uses = array('User','Kintore','Nice','Favorite','Comment','Category');


        /*******************************
         *コメント関連の情報を提供する
         *
         *
         *******************************/
        public function add() {//追加
                if ($this->Comment->save($this->request->data)) {//あとでファイルアップロード処理を追記
                        $message = 'saved';
                } else {
                        $message = 'error';
                }
                $this->set(array('message' => $message,'_serialize' => array($message)));
        }

        public function index() {//一覧
                $comments = $this->Comment->find('all');
                $this->set(array(
                        'comments' => $comments,
                        '_serialize' => array('comments')
                ));
        }
}
