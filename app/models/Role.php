<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $table="roles";

public $name;
//public $permission;
public function assigned_roles()
    {
        return $this->hasMany('Assigned');
    }
    
}