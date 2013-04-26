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
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'exclusive' => '',
                        'finderQuery' => '',
                        'counterQuery' => ''
                )
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
}
