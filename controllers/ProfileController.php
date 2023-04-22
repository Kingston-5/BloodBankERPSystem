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
use app\models\Donor;
use app\models\DonorCenter;
use app\models\Appointment;
use app\models\Blood;
use app\models\BloodClerk;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

	// main profile method to display user profile details and appointments
    public function profile(Request $request)
    {
    	$userModel = new User();
    	$appointmentModel = new Appointment();
    	$donorCenterModel = new DonorCenter();
    	$clerkModel = new BloodClerk();
    	
    	$user_id = $request->getRouteParam('user_id');
    	
    	$profile = $userModel->findOne([
    		'id' => $user_id
    		]);
    	
    	$appointmentModel = $appointmentModel->findAll([
    		'user_id' => $user_id
    		]);
    		
        return $this->render('profile/profile', [
            'profile' => $profile,
            'appointments' => $appointmentModel
        ]);
    }

    public function edit(Request $request)
    {
       
    	$userModel = new User();
    	$profile = $userModel->findOne([
            'id' => $request->getRouteParam('id')
        ]);
    	
    	if ($request->getMethod() === 'post') {
            $profile->loadData($request->getBody());
            
            
            $ignore = ['email', 'password', 'passwordConfirm'];
            if ($profile->validate($ignore) && $profile->update($profile->id)) {
                Application::$app->session->setFlash('success', 'Thanks for updating');
                Application::$app->response->redirect('/profile');
                return 'Show success page';
            } else {
            	echo "val failed";
            	var_dump($profile->validate());
            	}

        }
        
        return $this->render('profile/edit', [
            'model' => $profile
        ]);
        
    }
}
