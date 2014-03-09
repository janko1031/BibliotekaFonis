<?php
/**
* 
*/
class Komentar extends Eloquent 
{
	protected $table="komentari";

	public function knjiga()
	{
		return $this->belongsTo('Knjiga');
	}
}