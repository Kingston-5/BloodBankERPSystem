<?php

namespace app\models;


use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\UserModel;

class BloodClerk extends UserModel
{
    public int $id = 0;
    public int $user_id = 0;
    public int $center_id = 0;

    public static function tableName(): string
    {
        return 'blood_clerks';
    }

    public function attributes(): array
    {
        return ['user_id', 'center_id'];
    }

    public function labels(): array
    {
        return [];
    }

    public function rules()
    {
        return [
            'user_id' => [self::RULE_REQUIRED],
            'center_id' => [self::RULE_REQUIRED]
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
        return $this->id;
    }
    
}
