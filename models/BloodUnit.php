<?php

namespace app\models;


use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\UserModel;

class BloodUnit extends UserModel
{
    public int $id = 0;
    public int $user_id = 0;
    public int $center_id = 0;
    public int $appointment_id = 0;
    public string $datetime = '';
    public string $code = '';
    public string $blood_group = '';

    public static function tableName(): string
    {
        return 'blood_units';
    }

    public function attributes(): array
    {
        return ['user_id', 'center_id', 'code', 'appointment_id', 'blood_group'];
    }

    public function labels(): array
    {
        return [
            'code' => 'Blood Unit Code'
        ];
    }

    public function rules()
    {
        return [
            'code' => [self::RULE_REQUIRED],
            'user_id' => [self::RULE_REQUIRED],
            'center_id' => [self::RULE_REQUIRED],
            'appointment_id' => [self::RULE_REQUIRED],
            'blood_group' => [self::RULE_REQUIRED]
            ];
    }

    public function save()
    {
        
        return parent::save();
    }
    
    public function getId() : string
    {
    	return $this->id;
    }

	public function getAttr($attribute) : array
    {
    	$attributes = $this->attributes();
    	var_dump($attributes);
    	$attributes = array_map(fn($attr) => "$this->$attr", $attributes);
    	return $attributes;
    }
    
    public function getDisplayName(): string
    {
        return $this->code;
    }
    
}
