<?php
App::uses("AppController","Controller");

class ApiFavoritesController extends AppController {

        public $uses = array('User','Kintore','Nice','Favorite','Comment','Category');


        /*******************************
         *お気に入り関連の情報を提供する
         *
         *
         *******************************/

        public function add() {//追加
                if ($this->Favorite->save($this->request->data)) {
                        $message = 'saved';
                } else {
                        $message = 'error';
                }
                $this->set(array('message' => $message,'_serialize' => array($message)));
        }

        public function index() {//一覧
                $favorites = $this->Favorite->find('all');
                $this->set(array(
                        'favorites' => $favorites,
                        '_serialize' => array('favorites')
                ));
        }

        public function delete($id) {//削除
                if ($this->Favorite->delete($id)) {
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
