<?php
App::uses("AppController","Controller");

class ApiNicesController extends AppController {

        public $uses = array('User','Kintore','Nice','Favorite','Comment','Category');


        /*******************************
         *いいね関連の情報を提供する
         *
         *
         *******************************/

        public function add() {//追加
                if ($this->Nice->save($this->request->data)) {//あとでファイルアップロード処理を追記
                        $message = 'saved';
                } else {
                        $message = 'error';
                }
                $this->set(array('message' => $message,'_serialize' => array($message)));
        }

        public function index() {//一覧
                $kintores = $this->Kintore->find('all');
                $this->set(array(
                        'kintores' => $kintores,
                        '_serialize' => array('kintores')
                ));
        }

        public function delete($id) {
                if ($this->Nice->delete($id)) {
                        $message = 'Deleted';
                } else {
                        $message = 'Error';
                }
                $this->set(array(
                        'message' => $message,
                        '_serialize' => array('message')
                ));
        }

}
