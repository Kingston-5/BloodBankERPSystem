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

class OrderController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function view(Request $request){
        $orderModel = new Order();
        $userModel = new User();
        
        $userModel = $userModel->getAll();
        $orderModel = $orderModel->findAll([
        	'center_id' => $request->getRouteParam('center_id')
        ]);
        
        return $this->render('orders/view', [
            'orders' => $orderModel,
            'users' => $userModel
        ]);
    }
    
    public function fill(Request $request){
    
    	$unitModel = new BloodUnit();
    	
    	if ($request->getMethod() === 'post') {
            $unitModel->loadData($request->getBody());
            $unitModel->user_id = $request->getRouteParam('user_id');
            $unitModel->center_id = $request->getRouteParam('center_id');
            $unitModel->datetime = date("Y-m-d H:i");
            
            
            if ($unitModel->validate() && $unitModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for updating');
                Application::$app->response->redirect('/profile/'.$request->getRouteParam('user_id'));
                return 'Show success page';
            } else {
            	echo "val failed";
            	var_dump($unitModel->validate());
            	}

        }
        
    }
    
    public function create(Request $request){
    	$OrderModel = new Order();
    	$clerkModel = new BloodClerk();
    	$donorCenterModel = new DonorCenter();
    	
    	$donorCenterModel = $donorCenterModel->getAll();
    	
    	if ($request->getMethod() === 'post') {
            $OrderModel->loadData($request->getBody());
            $OrderModel->user_id = $request->getRouteParam('user_id');
            $OrderModel->center_id = $request->getRouteParam('center_id');
            $OrderModel->datetime = date("Y-m-d H:i");
            
            
            if ($OrderModel->validate() && $OrderModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for making an order');
                Application::$app->response->redirect('/profile/'.$request->getRouteParam('user_id'));
                return 'Show success page';
            } 
        }
        
        return $this->render('orders/create', [
            'model' => $OrderModel,
            'user' => $clerkModel,
            'center' => $donorCenterModel
        ]);
        
    }  
    
    public function cancel(Request $request)
    {
    	var_dump($request->getRouteParam('id'));
    	$appointmentModel = new Appointment();
    	
    	$appointmentModel = $appointmentModel->findOne([
    		'id' => $request->getRouteParam('id')
    		]);
    	$appointmentModel->cancelled = 1;
            
            if ($appointmentModel->update($appointmentModel->id)) {
                Application::$app->session->setFlash('success', 'Sorry You had To cancel');
                Application::$app->response->redirect('/profile/'.$request->getRouteParam('user_id'));
                return 'Show success page';
            } 

        Application::$app->response->redirect('/profile');
        
    }

}
