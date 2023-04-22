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

class AdminController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    
    // main admin method to display health centers 
    public function viewCenters(Request $request){
        $centerModel = new DonorCenter();
        $userModel = new User();

        $centerModel = $centerModel->getAll();
        $userModel = $userModel->getAll();

        return $this->render('admin/viewCenters', [
        	'title' => 'View Donation Centers',
            'centers' => $centerModel,
            'users' => $userModel
        ]);
    }
    
    // main admin method to add new health centers 
    public function makeCenter(Request $request){
        $donorCenterModel = new DonorCenter();
    
        if ($request->getMethod() === 'post') {
            $donorCenterModel->loadData($request->getBody());
            if ($donorCenterModel->validate() && $donorCenterModel->save()) {
                Application::$app->session->setFlash('success', 'New Donation Center Added');
                Application::$app->response->redirect('/profile/'.$_SESSION['user_id']);
                return 'Show success page';
            } 
        }
        
        return $this->render('admin/makeCenter', [
        	'title' => 'Add Donation Centers',
            'model' => $donorCenterModel
        ]);
    }
    
    // main admin method to add new health centers 
    public function viewAccounts(Request $request){
        $userModel = new User();
        $userModel = $userModel->getAll();
		
        return $this->render('admin/viewAccounts', [
        	'title' => "View User Accounts",
            'accounts' => $userModel
        ]);

    }
    
    public function viewStock(Request $request){
    	$bloodModel = new BloodUnit();
    	
    	$bloodModel = $bloodModel->getAll();
    	
    	
    
        return $this->render('admin/viewstock', [
        	'bloodModel' => $bloodModel,
    	]);    
    }
    
    public function editClerk(Request $request){
    	
    	
    	if ($request->getMethod() === 'post') {
			$userModel = new User();
			$clerkModel = new BloodClerk();
			$centerModel = new DonorCenter();
			
			$user_id = $request->getRouteParam('user_id');
			
			$userProfile = $userModel->findOne([
		        'id' => $user_id
		    ]);
		    
		    $clerkProfile = $clerkModel->findOne([
		        'user_id' => $user_id
		    ]);
		    
		    $centerProfile = $centerModel->findOne([
		        'location' => $request->getBody()['location']
		    ]);
		    
		    if(!$clerkProfile){
		    	$clerkProfile = $clerkModel;
		    	$clerkProfile->user_id = $user_id;
		    	$clerkProfile->center_id = $centerProfile->id;
		    	if(!$clerkProfile->save()){
		    		echo "something went wrong";
		    		exit();
		    	}
		    }
		    
		    
		    
            $userProfile->loadData($request->getBody());
            $clerkProfile->center_id = $centerProfile->id;
            
            $ignore = ['email', 'password', 'passwordConfirm'];
            
            
            if ($userProfile->validate($ignore) && $clerkProfile->validate()){
            	if ($userProfile->update($userProfile->id) && $clerkProfile->update($clerkProfile->id)) {
		            Application::$app->session->setFlash('success', 'Thanks for updating');
		            Application::$app->response->redirect('/profile'.$_SESSION['user_id']);
		            return 'Show success page';
		            }
            }

        }
    }

	
    public function fillOrder(Request $request){
        $orderModel = new Order();
		
		$orderModel = $orderModel->findOne([
			'id' => $request->getRouteParam('order_id')
		]);
		
		$orderModel->status = 1;
		
        if ($orderModel->update($orderModel->id)) {
            Application::$app->session->setFlash('success', 'Blood Order Fulfilled');
            Application::$app->response->redirect('/profile/'.$_SESSION['user_id']);
        } 
    }
    
    public function cancelOrder(Request $request){
        $orderModel = new Order();
		
		$orderModel = $orderModel->findOne([
			'id' => $request->getRouteParam('order_id')
		]);
		
		$orderModel->status = 2;
		
        if ($orderModel->update($orderModel->id)) {
            Application::$app->session->setFlash('success', 'Sorry You Had To cancell');
            Application::$app->response->redirect('/profile/'.$_SESSION['user_id']);
        } 
    }
        
    public function viewOrders(Request $request){
    
        $orderModel = new Order();
        $userModel = new User();
        
        $userModel = $userModel->getAll();
        $orderModel = $orderModel->getAll();

        return $this->render('admin/viewOrders', [
        	'title' => 'View Orders',
            'orders' => $orderModel,
            'users' => $userModel
        ]);
    }

    public function viewAppointments(Request $request){
        $appointmentModel = new Appointment();
		$userModel = new User();

        $userModel = $userModel->getAll();
        $appointmentModel = $appointmentModel->getAll();

        return $this->render('admin/viewAppointments', [
            'appointments' => $appointmentModel,
            'users' => $userModel
        ]);
    }
    
}
