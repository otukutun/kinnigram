<?php
App::uses('AppModel', 'Model');
/**
 * Nice Model
 *
 * @property Kintore $Kintore
 * @property User $User
 */
class Nice extends AppModel {


        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
                'Kintore' => array(
                        'className' => 'Kintore',
                        'foreignKey' => 'kintore_id',
                        'conditions' => '',
                        'fields' => '',
                        'order' => ''
                ),
                'User' => array(
                        'className' => 'User',
                        'foreignKey' => 'user_id',
                        'conditions' => '',
                        'fields' => '',
                        'order' => ''
                )
        );

        public function addNice($kintore_id = null,$user_id = null,$user_name = null) {//いいねを追加
                if ($kintore_id && $user_id) {
                        $nice = $this->find('first',array('conditions' => array('Nice.kintore_id' => $kintore_id, 'Nice.user_id' => $user_id)));
                        if ($nice) {//既に登録されていた場合
                                return false;
                        } else {//始めてのばあい
                                $this->create();
                                $this->save(array('Nice' => array('kintore_id' => $kintore_id,
                                        'user_id' => $user_id,
                                        'username' => $user_name,
                                )));
                                return true;
                        }
                        return false;
                }

        }//end_function_addNice

}//endclass
