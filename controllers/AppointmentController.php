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

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    // method to view all appointments
    public function view(Request $request)
    {
        $appointmentModel = new Appointment();
        $userModel = new User();

        $userModel = $userModel->getAll();
        $appointmentModel = $appointmentModel->findAll([
            'center_id' => $request->getRouteParam('center_id')
        ]);

        return $this->render('appointments/view', [
            'title' => 'View Appointments',
            'appointments' => $appointmentModel,
            'users' => $userModel
        ]);
    }

    // method to fillappointments
    public function fill(Request $request)
    {
        $appointmentModel = new Appointment();
        $unitModel = new BloodUnit();

        $appointmentModel = $appointmentModel->findOne([
            'id' => $request->getRouteParam('appointment_id')
        ]);

        if ($request->getMethod() === 'post') {
            $unitModel->loadData($request->getBody());
            $unitModel->user_id = $request->getRouteParam('user_id');
            $unitModel->center_id = $request->getRouteParam('center_id');
            $unitModel->appointment_id = $appointmentModel->id;
            $unitModel->datetime = date("Y-m-d H:i");
            $appointmentModel->status = 2;

            if ($unitModel->validate() && $appointmentModel->update($appointmentModel->id) && $unitModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for Donating');
                Application::$app->response->redirect('/profile/' . Application::$app->session->get('user_id'));
                return 'Show success page';
            } else {
                echo "val failed";
                var_dump($appointmentModel->validate());
            }
        }
    }

    // method to create new appointments
    public function create(Request $request)
    {
        $appointmentModel = new Appointment();
        $donorCenterModel = new DonorCenter();

        $donorCenterModel = $donorCenterModel->getAll();

        if ($request->getMethod() === 'post') {
            $appointmentModel->loadData($request->getBody());
            if ($appointmentModel->validate() && $appointmentModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for making an apppointment');
                Application::$app->response->redirect('/profile/' . Application::$app->session->get('user_id'));
                return 'Show success page';
            }
        }

        return $this->render('appointments/create', [
            'title' => 'Ceate New Appointment',
            'model' => $appointmentModel
        ]);
    }

    // method to cancel appointments
    public function cancel(Request $request)
    {
        var_dump($request->getRouteParam('id'));
        $appointmentModel = new Appointment();

        $appointmentModel = $appointmentModel->findOne([
            'id' => $request->getRouteParam('id')
        ]);

        $appointmentModel->status = 1;

        if ($appointmentModel->update($appointmentModel->id)) {
            Application::$app->session->setFlash('success', 'Sorry You had To cancel');
            Application::$app->response->redirect('/profile/' . Application::$app->session->get('user_id'));
            return 'Show success page';
        }

        Application::$app->response->redirect('/profile');
    }
}
