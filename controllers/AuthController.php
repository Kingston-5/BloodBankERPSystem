<?php

namespace app\controllers;


use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\middlewares\AuthMiddleware;
use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;
use app\models\Admin;

/** AuthController class
* controls the the sites authorisation functions
*/
class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

	//if user details are valid login user
    public function login(Request $request)
    {
        $loginForm = new LoginForm();
        $user = new User();
        
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
            	$user = $user->findOne(['email' => $request->getBody()['email']]); 
            	
                Application::$app->session->set("user_id", $user->getId());
                  
            	if($user->isAdmin()){
                	Application::$app->session->set("user_status", "A");
            	} else if($user->isClerk()){
                	Application::$app->session->set("user_status", "H");
            	} else {
                	Application::$app->session->set("user_status", "U");
            	} 
            	
                Application::$app->session->setFlash('success', 'Welcome ' . $user->getDisplayName());
                Application::$app->response->redirect('/profile/'.$user->id);
                return;
            }
        }
        
        return $this->render('auth/login', [
        	'title' => 'Login',
            'model' => $loginForm
        ]);
        
    }

	//if user entered valid details dave them in the Database
    public function register(Request $request)
    {
        $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/login');
                return 'Show success page';
            }

        }
        
        return $this->render('auth/register', [
        	'title' => 'Register',
            'model' => $registerModel
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

}
