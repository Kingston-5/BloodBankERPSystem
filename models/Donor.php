<?php

namespace app\models;


//use thecodeholic\phpmvc\DbModel;

use thecodeholic\phpmvc\db\DbModel;

class Donor extends DbModel
{
    public int $id = 0;
    public int $user_id = 0;
    public string $address = '';
    public int $age = 0;
    public int $phone_number = 0;
    public string $dob = '';
    public string $gender = 'M';
    public string $blood_Type = '';

    public static function tableName(): string
    {
        return 'donors';
    }

    public function attributes(): array
    {
        return ['address', 'dob', 'phone_number', 'gender',];
    }

    public function labels(): array
    {
        return [
            'address' => 'address',
            'dob' => 'Date Of Birth',
            'phone_number' => 'phone',
            'gender' => 'gender'
        ];
    }

    public function rules()
    {
        return [
            'address' => [self::RULE_REQUIRED],
            'dob' => [self::RULE_REQUIRED],
            'phone_number' => [self::RULE_REQUIRED],
            'gender' => [self::RULE_REQUIRED]
        ];
    }

    public function save()
    {
        //$this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }
    
    public function getId() : string
    {
    	return $this->id;
    }  
    
    public function setUserId(int $id) : string
    {
    	return $this->user_id = $id;
    }

    public function getDisplayName(): string
    {
        return $this->gender . ' ' . $this->blood_Type;
    }
}
