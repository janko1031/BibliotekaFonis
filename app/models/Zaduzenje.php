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
	
	public function svaZaduzenja(){
		return DB::table('zaduzenja')
		->leftjoin('users', 'user_id', '=', 'users.id')
		->leftjoin('knjige', 'knjiga_id', '=', 'knjige.id')
		->select('zaduzenja.*', 'users.firstname', 'users.lastname', 'knjige.naziv', 'knjige.tehnologija', 'knjige.autor')
		->orderBy('updated_at','desc')
		->paginate(10)
		;
		//return Knjiga::find(Input::get('id_knjige'))->zaduzenja;
	}
	public function vratiZaduzeneKnjige(){
		return DB::table('zaduzenja')
		->leftjoin('users', 'user_id', '=', 'users.id')
		->leftjoin('knjige', 'knjiga_id', '=', 'knjige.id')
		->where('vracena','=',false)
		->select('zaduzenja.*', 'users.firstname', 'users.lastname', 'knjige.naziv', 'knjige.tehnologija', 'knjige.autor')
		->paginate(8);

		//return Knjiga::find(Input::get('id_knjige'))->zaduzenja;
	}
	public function zaduzenjaKorisnika($id){
		return DB::table('zaduzenja')
		
		->join('knjige', 'knjiga_id', '=', 'knjige.id')
		->join('users', 'user_id', '=', 'users.id')
		->select('zaduzenja.*', 'users.firstname', 'users.lastname', 'knjige.naziv', 'knjige.tehnologija', 'knjige.autor')
		->where('user_id','=',$id)
		->get();
		
		//return User::find($id)->zaduzenja;

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

	public  function razduziKnjigu(){

			$validator = Validator::make(Input::all(), Komentar::$rules);

		if ($validator->passes()) {

		$id_zad=Input::get('id_zad');	
		$zaduzenje = Zaduzenje::find($id_zad);	
		$zaduzenje->vracena = true;	
		$zaduzenje->save();


		$id_knjige=Input::get('id_knjige');
		$knjiga = Knjiga::find($id_knjige);
		$knjiga->dostupnost=true;
		$knjiga->save();


		} else {
		return Redirect::to('error')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}

	}

}