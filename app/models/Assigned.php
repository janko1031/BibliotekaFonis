<?php

use Zizaco\Entrust\EntrustRole;

class Assigned extends EntrustRole
{

public function user()
	{
		return $this->belongsTo('User');
	}
	public function role()
	{
		return $this->belongsTo('Role');
	}
	public function vrati()
	{
		return User::find($Auth::user()->id)->assigned_roles;
	}

}