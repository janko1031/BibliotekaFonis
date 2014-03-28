<?php
/**
* 
*/
class Komentar extends Eloquent 
{
	protected $table="komentari";
	public static $rules = array(
		
	);

	public function knjiga()
	{
		return $this->belongsTo('Knjiga');
	}
	public function user()
	{
		return $this->belongsTo('User');
	}
	public function komentari($id){
		
		
		return Knjiga::find($id)->komentari;
	
	}
	public function komentari2($id){//privremeno resenje
		
		return DB::table('komentari')
		->leftjoin('users', 'user_id', '=', 'users.id')
		->leftjoin('knjige', 'knjiga_id', '=', 'knjige.id')
		->select('komentari.*', 'users.firstname', 'users.lastname')
		->where('knjiga_id','=',$id)
		->get();
		
	
	}
	public function proscenaOcena($id){

		$data = Knjiga::find($id)->komentari;
		
		$broj=0;
		$uk=0;
		
			foreach ($data as $result) {
			$uk+=$result->ocena;
			$broj++;
		}
		if (!empty($result)) {
		return $uk/$broj; 
		}
		$uk=0;
		if (empty($result)) {
		return "Knjiga nije ocenjena";
		}
		
	}
	public  function ubaciKomentar($user){


		$validator = Validator::make(Input::all(), Komentar::$rules);

		if ($validator->passes()) {
			$komentar = new Komentar;
			$komentar->knjiga_id = Input::get('id_knjige');
			$komentar->user_id = $user;
			$komentar->komentar = Input::get('komentar');
			$komentar->ocena =Input::get('ocena');
			
			$komentar->save();

			
		} else {
			return Redirect::to('error')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}

		


	}
	public  function ocenjenaKnjiga($knjiga,$user){
		$oceni=true;
		$results=DB::table('komentari')->where('knjiga_id','=',$knjiga)->get();
		if (empty($result)) {        	
			$oceni=true;
		}
		foreach ($results as $result) {
			if ($result->user_id==$user) {
				$oceni= false;
				break;
			}
		}		
		return $oceni;
	}
	public  function izbrisiKomentar($userId){

		DB::table('komentari')->where('user_id', $userId)->delete();

	}

	public  function komentariKorisnika($id){
		//return User::find($id)->komentari;
		return DB::table('komentari')
		
		->join('knjige', 'knjiga_id', '=', 'knjige.id')
		->join('users', 'user_id', '=', 'users.id')
		->select('komentari.komentar','komentari.created_at', 'users.firstname', 'users.lastname', 'knjige.*')
		->where('user_id','=',$id)
		->get();
		

	}
}