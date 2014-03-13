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
	public function komentari()
    {
        return $this->hasMany('Komentar');
    }
	/*public $naziv;
	public $autor;
	public $identifikator;
	public $godina_izdanja;
	public $tehnologija;
	public $br_strana;
	public $opis;
	public $dostupnost;
	protected $fillable = array('naziv', 'autor', 'identifikator','godina_izdanja','tehnologija','br_strana','opis','dostupnost');*/
	

	public  function knjige(){
		return Knjiga::all();
	}

	public  function nadjiKnjigu($id){
		$knjiga = Knjiga::find($id);
		return $knjiga;
	}
	public  function ubaciKnjigu(){
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
	public  function izbaciKnjigu(){

		$ID= Input::get('id');
		$knjiga = Knjiga::find($ID);		
		$knjiga->delete();

	}
	public function zaduzenje(){
		return DB::table('zaduzenja')
		->join('users', 'korisnik_id', '=', 'users.id')
		->join('knjige', 'knjiga_id', '=', 'knjige.id')
		->get();
		//return $this->hasMany('Zaduzenje','knjiga_id');
	}
	

	
}