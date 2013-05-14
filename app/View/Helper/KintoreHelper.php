<?php
App::uses('AppHelper','View/Helper');
class KintoreHelper extends AppHelper {
    /*public function actionView($session_user_id,$post_user_id = null) {//権限管理
        if ($session_user_id && $post_user_id) {
            if ($session_user_id === $post_user_id) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }	
    } */ //end_function_action_view

            public function checkNice($nices = null,$username = null) {//いいねを既にしたかどうか確認
                    if ($nices === null || $username === null) {
                            return false;
                    }

                    foreach($nices as $nice) {
                            if ($nice['username'] === $username) {
                                    return $nice['id'];
                                    break;
                            } 
                    }
                    return false;
            }

            public function checkFavorite($favorites = null,$username = null) {//いいねを既にしたかどうか確認
                    if ($favorites === null || $username === null) {
                            return false;
                    }

                    foreach($favorites as $favorite) {
                            if ($favorite['username'] === $username) {
                                    return $favorite['id'];
                                    break;
                            } 
                    }
                    return false;
            }//function


}//endclass
