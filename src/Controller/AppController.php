<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        define("ROOT_DIREC", '/yann');

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);

        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Folders',
                'action' => 'show'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login']
        ]);

    //     $this->loadComponent('Csrf');

    //     $this->loadComponent('Auth', [
    //     'loginAction' => [
    //         'controller' => 'Users',
    //         'action' => 'login',
    //         'plugin' => 'Users'
    //     ],
    //     'authError' => 'Did you really think you are allowed to see that?',
    //     'authenticate' => [
    //         'Form' => [
    //             'fields' => ['username' => 'username']
    //         ]
    //     ],
    //     'storage' => 'Session'
    // ]);

    //     $this->Auth->allow(['login', 'forgotpassword']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event){
        // $this->getEventManager()->off($this->Csrf);
        if($this->Auth->user()){
            $this->set('current_user', $this->Auth->user());
        }
    }

    protected function checkfile($file, $name){
        $allowed_extensions = array('pdf', "xls", "xlsx", "doc", "docx");
        if(!$file['error']){
            $extension = explode("/", $file['type'])[1];
            // $dossier = 'C:/wamp/www'.ROOT_DIREC.'/webroot/img/'.$directory.'/';
            $dossier = 'C:/wamp/www'.ROOT_DIREC.'/webroot/tmp/files/';
            if(move_uploaded_file($file['tmp_name'], $dossier . $name . "." . $extension)){
                return $name . "." . $extension;
            }else{
                return "move failed";
            }
        }else{
            return "general error";
        }
    }
}
