<?php
App::uses('AppModel', 'Model');
/**
 * Favorite Model
 *
 * @property User $User
 * @property Kintore $Kintore
 */
class Favorite extends AppModel {


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
                ),
                'Kintore' => array(
                        'className' => 'Kintore',
                        'foreignKey' => 'kintore_id',
                        'conditions' => '',
                        'fields' => '',
                        'order' => ''
                )
        );

        public function addFavorite($kintore_id,$user_id,$username) {//お気に入り登録
                if ($kintore_id && $user_id) {
                        $favorite = $this->find('first',array('conditions' => array('Favorite.kintore_id' => $kintore_id, 'Favorite.user_id' => $user_id)));
                        if ($favorite) {//既に登録されていた場合
                                return false;
                        } else {//始めてのばあい
                                $this->create();
                                $this->save(array('Favorite' => array('kintore_id' => $kintore_id,
                                        'user_id' => $user_id,
                                        'username' => $username,
                                )));
                                return true;
                        }
                        return false;
                }

        }
}
