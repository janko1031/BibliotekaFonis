<?php
class Knjiga extends Eloquent{
	public static $rules = array(
		//'naziv'=>'required|alpha|min:2',
		//'id_knjige'=>'required|alpha|min:4',
		//'autor'=>'required|alpha|min:4',
		//'tehnologija'=>'required|alpha|min:4',
		//'opis'=>'required|alpha|min:4'
	);

	protected $table="knjige";
	public $timestamps = false;
	
	

	public  function select(){
		return DB::table('knjige')->get();
	}
	public  function insert(){
		$validator = Validator::make(Input::all(), Knjiga::$rules);

		if ($validator->passes()) {
			$knjiga = new Knjiga;
			$knjiga->naziv = Input::get('naziv');
			$knjiga->identifikator = Input::get('ID');
			$knjiga->autor = Input::get('autor');
			$knjiga->tehnologija =Input::get('tehnologija');
			$knjiga->opis =Input::get('opis');
			$knjiga->godina_izdanja =Input::get('godina');
			$knjiga->br_strana =Input::get('br_strana');
			$knjiga->dostupnost =Input::get('dostupnost');
			$knjiga->save();

			
		} else {
			return Redirect::to('error')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}



	}
	public  function delete(){
		$input =Input::all();
		$ID=$input['ID1'];
		DB::table('knjige')->where('id', $ID)->delete();


	}
	public function zaduzenje(){
		return DB::table('zaduzenja')
		->join('users', 'korisnik_id', '=', 'users.id')
		->join('knjige', 'knjiga_id', '=', 'knjige.id')
		->get();
		//return $this->hasMany('Zaduzenje','knjiga_id');
	}
	public function komentari($id){
		
		return DB::table('komentari')
		->leftJoin('users', 'korisnik_id', '=', 'users.id')
		->leftJoin('knjige', 'knjiga_id', '=', 'knjige.id')

		->where('knjige.id', '=', $id)
		->orderBy('komentari.id', 'asc')
		->get();
		//return $this->hasMany('Komentar','knjiga_id');
	}
	public function proscenaOcena($id){
		
		$data= DB::table('komentari')
		->where('knjiga_id', '=', $id)
		->get();
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
		return 0;
		}
		
	}
	public  function insertKomentar($knjiga,$user){
		$input =Input::all();



		DB::table('komentari')->insert(
			array('knjiga_id'=>$knjiga,'korisnik_id'=>$user,'komentar'=>$input['komentar'],'ocena'=>$input['ocena'])
			);


	}
	public  function ocenjenaKnjiga($knjiga,$user){
		$oceni=true;
		$results=DB::table('komentari')->where('knjiga_id','=',$knjiga)->get();
		if (empty($result)) {        	
			$oceni=true;
		}
		foreach ($results as $result) {
			if ($result->korisnik_id==$user) {
				$oceni= false;
				break;
			}
		}		
		return $oceni;
	}
	public  function izbrisiKomentar($userId){
		DB::table('komentari')->where('korisnik_id', $userId)->delete();


	}

	
}