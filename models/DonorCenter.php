<?php

namespace app\models;


//use thecodeholic\phpmvc\DbModel;

use thecodeholic\phpmvc\db\DbModel;

class DonorCenter extends DbModel
{
    public string $location = '';

    public static function tableName(): string
    {
        return 'health_centers';
    }

    public function attributes(): array
    {
        return ['location'];
    }

    public function labels(): array
    {
        return [
            'location' => 'location'
        ];
    }

    public function rules()
    {
        return [
            'location' => [self::RULE_REQUIRED],
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
    
    public function setUserId(int $id) : string
    {
    	return $this->user_id = $id;
    }

    public function getDisplayName(): string
    {
        return $this->location;
    }
}
