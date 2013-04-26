<?php
App::uses('AppHelper','View/Helper');
class KintoreHelper extends AppHelper {
	public function actionView($session_user_id,$post_user_id = null) {//権限管理
		if ($session_user_id && $post_user_id) {
			if ($session_user_id === $post_user_id) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}	
	}//end_function_action_view

}//endclass
