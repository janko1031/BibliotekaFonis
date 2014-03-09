<?php
/**
* 
*/
class Zaduzenje extends Eloquent 
{
	protected $table="zaduzenja";

	public function knjiga()
	{
		return $this->belongsTo('Knjiga');
	}
}