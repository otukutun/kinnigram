<?php
App::uses('AppModel', 'Model');
/**
 * Passport Model
 *
 * @property User $User
 */
class Passport extends AppModel {


        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
                'User' => array(
                        'className' => 'User',
                        'foreignKey' => 'user_id',
                        'conditions' => '',
                        'fields' => '',
                        'order' => ''
                )
        );

        public function checkCookie($token = null,$type= null) {//クッキーがない場合はfalse、ある場合はuser情報を返す
                if (empty($token) || empty($type)) {
                        return false;
                }
                $this->recursive = 1;
                $auth = $this->find('first',array('conditions' => array('Passport.token' => $token,'Passport.type' => $type/* 'Passport.modified' => ''*/)));
                if (empty($auth)) {
                        return false;
                } else {
                        return $auth;
                }


        }//fucntion

        public function updateCookie($passport_id = null,$token = null,$type = null,$user_id = null) {
                if (empty($token) || empty($type) || empty($passport_id) || empty($user_id)) {
                        return false;
                }
                $this->id = $passport_id;
                if (!$this->exists()) {
                        return false;
                }

                $this->recursive = 1;

                $cookie = array('Passport' => array('id' => $passport_id, 'token' => $token, 'type' => $type,'user_id' => $user_id));
                $this->id = $passport_id;
                return $this->save($cookie);
                
        }
}
