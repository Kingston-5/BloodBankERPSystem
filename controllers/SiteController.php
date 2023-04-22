<?php

namespace app\controllers;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\middlewares\AuthMiddleware;
use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;
use app\models\Donor;
use app\models\DonorCenter;
use app\models\Appointment;
use app\models\BloodUnit;
use app\models\BloodClerk;
use app\models\Order;


/** SiteController class
* controls the sites genneral functions that do not require special 
* access or permissions
*/
class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home()
    {
    	
        $userModel = new User();
        $donorCenterModel = new DonorCenter();
        $appointmentModel = new Appointment();
        $bloodModel = new BloodUnit();
        
        
        $userModel = $userModel->getAll();
        $donorCenterModel = $donorCenterModel->getAll();
        $appointmentModel = $appointmentModel->getAll();
        $bloodModel = $bloodModel->getAll();
        
        return $this->render('home', [
            'users' => $userModel,
            'donorCenters' => $donorCenterModel,
            'appointments' => $appointmentModel,
            'Donations' => $bloodModel
        ]);
    }
    
    public function about()
    {
        return $this->render('about');
    }

    public function contact()
    {
        return $this->render('contact');
    }

}
