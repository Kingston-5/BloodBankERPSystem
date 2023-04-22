<?php

namespace app\models;

use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\UserModel;
use thecodeholic\phpmvc\Application;

class Appointment extends UserModel
{
    public int $id = 0;
    public int $user_id = 0;
    public int $center_id = 0;
    public int $status = 0;
    public string $datetime = '';

    public static function tableName(): string
    {
        return 'appointments';
    }

	// attributes that go into the sql query
    public function attributes(): array
    {
        return [ 'user_id', 'center_id', 'datetime', 'status'];
    }

    public function labels(): array
    {
        return [
            'datetime' => 'Date And Time',
            'center_id' => 'Location'
        ];
    }

    public function rules()
    {
        return [
            'datetime' => [self::RULE_REQUIRED]
            ];
    }

    public function save()
    {
		$this->user_id = Application::$app->session->get('user_id');
		$this->status = 0;
        return parent::save();
    }
    
    public function getId() : string
    {
    	return $this->id;
    }

    
    public function getDisplayName(): string
    {
        return $this->location . ' @ ' . $this->datetime;
    }
    
    
}
