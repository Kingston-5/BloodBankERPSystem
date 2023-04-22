<?php

namespace app\models;

// core parent models
use thecodeholic\phpmvc\DbModel;
use thecodeholic\phpmvc\UserModel;
use app\models\Admin;
use app\models\BloodClerk;
/**
* User class used to represent user entities in the system
* mainly used to interact with the users table in the database
* and also create user registration form
*/
class User extends UserModel
{
	// private attributes
    public int $id = 0;
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public ?string $address = '';
    public ?int $phone_number = 0;
    public ?string $dob = '';
    public ?string $gender = 'M';
    public ?string $blood_type = '';
    public string $joined = '';
    
    public static function tableName(): string
    {
        return 'users';
    }

	// form fields
    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'address', 'dob', 'phone_number', 'gender'];
    }

	// Form labels
    public function labels(): array
    {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Password Confirm',
            'address' => 'address',
            'dob' => 'Date Of Birth',
            'phone_number' => 'phone',
            'gender' => 'gender'
        ];
    }

	// form submission rules
    public function rules() : array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'passwordConfirm' => [[self::RULE_MATCH, 'match' => 'password']],
            'address' => [self::RULE_REQUIRED],
            'dob' => [self::RULE_REQUIRED],
            'phone_number' => [self::RULE_REQUIRED],
            'gender' => [self::RULE_REQUIRED]
        ];
    }

	// we need to hash the user password before we save the user to the database
    public function save(): bool
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::save();
    }
    
    // check if user is admin
    public function isAdmin(){
    	$admin = new Admin();
    	if($admin->findAll(['user_id' => $this->id]) === array()){
    		return False;
		} else {
			return True;
			}
	}
	
	// check if user is a blood clerk
	public function isClerk(){
    	$clerk = new BloodClerk();
    	if($clerk->findAll(['user_id' => $this->id]) === array()){
    		return False;
		} else {
			return True;
			}
	}
    
    // methods to get attributes
    
    public function getId() : string
    {
    	return $this->id;
    }

    
    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    
    
}
