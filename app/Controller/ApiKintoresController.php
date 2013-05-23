<?php
App::uses("AppController","Controller");

class ApiKintoresController extends AppController {

        public $uses = array('User','Kintore','Nice','Favorite','Comment','Category');


        /*******************************
         *筋トレ関連の情報を提供する
         *
         *
         *******************************/
        public function view($id = null) {//詳細
                if ($id == null) {
                        $kintore = array('error' => "can't find user info.");
                }
                $this->Kintore->id = $id;
                $kintore = $this->Kintore->read(null,$id);
                $this->set(array(
                        'kintore' => $kintore,
                        '_serialize' => array('kintore')
                ));
        }

        public function edit($id = null) {//編集
                $this->Kintore->id = $id;
                if ($this->Kintore->save($this->request->data)) {
                        $message = 'saved';
                } else {
                        $message = 'error';
                }
                $this->set(array('message' => $message,'_serialize' => array($message)));
        }

        public function index() {//一覧
                //throw new Exception('test');
                $kintores = $this->Kintore->find('all');
                $this->set(array(
                        'kintores' => $kintores,
                        '_serialize' => array('kintores')
                ));
        }
}
