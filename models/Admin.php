<?php

namespace app\models;

// core parent models
use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\UserModel;

/**
* User class used to represent user entities in the system
* mainly used to interact with the users table in the database
* and also create user registration form
*/
class Admin extends UserModel
{
	// private attributes
	public int $id = 0;

    public static function tableName(): string
    {
        return 'admins';
    }

	// form fields
    public function attributes(): array
    {
        return [];
    }

	// Form labels
    public function labels(): array
    {
        return [];
    }

	// form submission rules
    public function rules() : array
    {
        return [];
    }

	// we need to hash the user password before we save the user to the database
    public function save(): bool
    {
        return parent::save();
    }
    
    // methods to get attributes
    
    public function getId() : string
    {
    	return $this->id;
    }

    
    public function getDisplayName(): string
    {
        return ' Admin #' . $this->id;
    }
    
    
}
