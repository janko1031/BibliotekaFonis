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
	public function zaduzenje(){
		return DB::table('zaduzenja')
		->join('users', 'user_id', '=', 'users.id')
		->join('knjige', 'knjiga_id', '=', 'knjige.id')
		->get();
		//return Knjiga::find(Input::get('id_knjige'))->zaduzenja;
	}

	public  function dodajZaduzenje($user){


		$validator = Validator::make(Input::all(), Komentar::$rules);

		if ($validator->passes()) {
			$zaduzenje = new Zaduzenje;
			$id=Input::get('id_knjige');	
			
			$zaduzenje->knjiga_id =$id;
			$zaduzenje->user_id = $user;
			$zaduzenje->vracena = false;			
			$zaduzenje->save();

			$knjiga = Knjiga::find($id);
			$knjiga->dostupnost=false;
			$knjiga->save();
			
		} else {
			return Redirect::to('error')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}

		


	}
}