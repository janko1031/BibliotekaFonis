<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;
class User extends Eloquent implements UserInterface, RemindableInterface {
	use HasRole;



	public static $rules = array(
		'firstname'=>'required|alpha|min:2',
		'lastname'=>'required|alpha|min:2',
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:6,12'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	 public function zaduzenja()
    {
        return $this->hasMany('Zaduzenje');
    }
     public function komentari()
    {
        return $this->hasMany('Komentar');
    }
    public function assigned_roles()
    {
        return $this->hasMany('Assigned');
    }
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	 public function get_role()
    {

       $results=  DB::table('assigned_roles')
		->leftjoin('roles', 'role_id', '=', 'roles.id')
		->where('user_id','=',Auth::user()->id)
		->get();
		foreach ($results as $res) {
			$role=$res->name;
		}
		return $role;
    }
    public function isAdmin()    {
    
       $results=  DB::table('assigned_roles')
		->leftjoin('roles', 'role_id', '=', 'roles.id')
		->where('user_id','=',Auth::user()->id)
		->get();
		foreach ($results as $res) {
			$role=$res->role_id;
		}
		if ($role==1) {
		 	return true;
		 }
		 else return false ;
    }


}