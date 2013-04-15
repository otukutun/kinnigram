<?php
App::uses('AppModel', 'Model');
/**
 * Kintore Model
 *
 * @property Category $Category
 * @property Nice $Nice
 */
class Kintore extends AppModel {

        /**
         * Use table
         *
         * @var mixed False or table name
         */
        public $useTable = 'kintore';


        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
                'Category' => array(
                        'className' => 'Category',
                        'foreignKey' => 'category_id',
                        'conditions' => '',
                        'fields' => '',
                        'order' => ''
                )
        );

        /**
         * hasMany associations
         *
         * @var array
         */
        public $hasMany = array(
                'Nice' => array(
                        'className' => 'Nice',
                        'foreignKey' => 'kintore_id',
                        'dependent' => false,
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'exclusive' => '',
                        'finderQuery' => '',
                        'counterQuery' => ''
                )
        );

        public function fileupload($file) {//画像アップロード機能
                if (is_uploaded_file($file['tmp_name'])) {//ファイルのアップロード処理
                        $image = time() . '.' . substr(strrchr($file['name'],'.'),1);
                        $file_path = 'img' . DS . 'musules' . DS . $image;
                        $file_return_path = 'musules' . DS . $image;
                        if (move_uploaded_file($file['tmp_name'],$file_path)) {
                            return $file_return_path;
                        } else {
                                return 'error';
                        }

                }

        }
}
