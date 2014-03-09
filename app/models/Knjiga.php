<?php
class Knjiga extends Eloquent{
	
	protected $table="knjige";

	public  function select(){
		return DB::table('knjige')->get();
	}
	public  function insert(){
		$input =Input::all();
				DB::table('knjige')->insert(
    	array('ID'=>$input['ID'],'naziv'=>$input['naziv'],'autor'=>$input['autor'],'godina_izdanja'=>$input['godina'],'tehnologija'=>$input['tehnologija'],'opis'=>$input['opis'],'dostupnost'=>$input['dostupnost'])
		);
			
			
	}
	public  function delete(){
		$input =Input::all();
		$ID=$input['ID1'];
				DB::table('knjige')->where('ID', $ID)->delete();
	
			
	}
	public function zaduzenje(){
		return DB::table('zaduzenja')
            ->join('users', 'korisnik_id', '=', 'users.id')
            ->join('knjige', 'knjiga_id', '=', 'knjige.ID')
            ->get();
		//return $this->hasMany('Zaduzenje','knjiga_id');
	}
	public function komentari($id){
		
		return DB::table('komentari')
               ->leftJoin('users', 'korisnik_id', '=', 'users.id')
            ->leftJoin('knjige', 'knjiga_id', '=', 'knjige.ID')
         		
            ->where('knjige.ID', '=', $id)
            ->orderBy('komentari.id', 'asc')
            ->get();
		//return $this->hasMany('Komentar','knjiga_id');
	}
	public  function insertKomentar($knjiga,$user){
		$input =Input::all();
		DB::table('komentari')->insert(
    	array('knjiga_id'=>$knjiga,'korisnik_id'=>$user,'komentar'=>$input['komentar'],'ocena'=>$input['ocena'])
		);
			
			
	}
}