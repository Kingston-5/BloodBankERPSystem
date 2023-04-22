<?php

namespace app\models;

use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\UserModel;
use thecodeholic\phpmvc\Application;

class Order extends UserModel
{
    public int $id = 0;
    public int $user_id = 0;
    public int $center_id = 0;
    public string $datetime = '';
    public int $A_pos = 0;
    public int $A_neg= 0;
    public int $AB_pos = 0;
    public int $AB_neg= 0;
    public int $B_pos= 0;
    public int $B_neg = 0;
    public int $O_pos = 0;
    public int $O_neg = 0;
    public int $status = 0;

    public static function tableName(): string
    {
        return 'blood_orders';
    }

	// attributes that go into the sql query
    public function attributes(): array
    {
        return [ 'user_id', 'center_id', 'datetime', 'A_pos', 'A_neg', 'AB_pos', 'AB_neg', 'B_pos', 'B_neg', 'O_pos', 'O_neg', 'status'];
    }

    public function labels(): array
    {
        return [
            'datetime' => 'Date And Time',
            'center_id' => 'Location',
            'A_pos' => "A+ QTY",
            'A_neg' => "A- QTY",
            'AB_pos' => "AB+ QTY",
            'AB_neg' => "AB- QTY",
            'B_pos' => "B+ QTY",
            'B_neg' => "B- QTY",
            'O_pos' => "O+ QTY",
            'O_neg' => "O- QTY"
        ];
    }

    public function rules()
    {
        return [];
    }

    public function save()
    {
        return parent::save();
    }
    
    public function getId() : string
    {
    	return $this->id;
    }

    
    public function getDisplayName(): string
    {
        return $this->center_id . ' @ ' . $this->datetime;
    }
    
    
}
