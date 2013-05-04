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
                ),
		'User' => array(
                        'className' => 'User',
                        'foreignKey' => 'user_id',
                        'conditions' => '',
                        'fields' => array('id','file','username'),
                        'order' => ''
                ),
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
                        'fields' => array('id','user_id','kintore_id','username','created'),
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'exclusive' => '',
                        'finderQuery' => '',
                        'counterQuery' => ''
                ),
                'Comment' => array(
                        'className' => 'Comment',
                        'foreignKey' => 'kintore_id',
                        'dependent' => false,
                        'conditions' => '',
                        'fields' => array('id','user_id','kintore_id','username','created','body'),
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'exclusive' => '',
                        'finderQuery' => '',
                        'counterQuery' => ''
                ),

        );

        public function fileUpload($file) {//画像アップロード機能
                if (is_uploaded_file($file['tmp_name'])) {//ファイルのアップロード処理
                        $upload_dir = IMAGES_URL . 'musules' . DS;//upload先ディレクトリ
                        $upload_file = time() . '.' . substr(strrchr($file['name'],'.'),1);//uploadファイル名
                        if (move_uploaded_file($file['tmp_name'], $upload_dir . $upload_file)) {
                            //return 'musules' . DS . $upload_file;
                            return $upload_file;
                        } else {
                                return false;
                        }

                }

        }//endfunction

        public function makeThumbnail($file_path) {//サムネイル画像作成機能
                if (file_exists(IMAGES . 'musules' . DS . $file_path)) {//ファイルの確認
                        try {
                                if (!file_exists(IMAGES . 'thumbnails')) {//サムネイル保存ディレクトリの有無の確認
                                        mkdir(IMAGES . 'thubmnails',0777);
                                }
                                $im = new Imagick(IMAGES . 'musules' . DS . $file_path);
                                $im->thumbnailImage(200,150);
                                $im->writeImage(IMAGES . 'thumbnails' . DS . $file_path);
                                $im->destroy();
                                return true;

                        } catch (Exception $e) {
                                return false;
                        }//endtry
                } //endif
                return false;
        }//endfunction

         public function updateNice($kintore_id = null,$nice_count = null) {//いいねを更新

                if ($kintore_id === null) {
                        return false;
                }

                $save_data = array('Kintore' => array('id' => $kintore_id,
                        'nice_sum' => $nice_count,
                ));
                if ($this->save($save_data)) {//成功したら
                        return true;
                }

        }//end_function

}//end_class
