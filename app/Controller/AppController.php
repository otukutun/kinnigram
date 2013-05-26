<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');
//App::import('Vendor', 'OAuth/OAuthClient');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
        public $components = array('Auth','Security' => array('validatePost' => false),'Session','Cookie' => array('time' => '14 Days'),'DebugKit.Toolbar'/*,'RequestHandler'/*,'OAuthConsumer'/*,'TwitterKit.Twitter'*/);
        public $helpers = array('Session','Html','Form','TwitterBootstrap.BootstrapHtml', 'TwitterBootstrap.BootstrapForm', 'TwitterBootstrap.BootstrapPaginator');
        public $layout = 'bootstrap';
        /**
         * Components
         *
         * @var array
         */

        public function beforeFilter() {
                $this->Auth->userModel = 'User';
                $this->Auth->sessionKey = 'Auth.User';
                $this->Auth->fields = array('username' => 'oauth_token', 'password' => 'oauth_token_secret');
                $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
                //$this->Auth->loginRedirect = array('controller' => 'kintores', 'action' => 'index');
                $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'index');
                //$this->Auth->loginRedirect = array('controller' => 'kintores', 'action' => 'index');

        }//endfunction_beforeFilter

}
