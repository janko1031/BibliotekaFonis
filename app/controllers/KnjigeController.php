
<?php
class KnjigeController extends BaseController {

	public function prikaziUnos()
	{
		
		$title="Unos";
		$content='app'.'.'.'unos';

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('user', Auth::user());
	}
	
	public function prikaziKnjige()
	{


		$content='app'.'.'.'spisakKnjiga';
		$data = with(new Knjiga)->knjige();
		$title="Bibiloteka";
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('data',$data)->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}
	public function prikaziAzuriranje()
	{
		$title="Azuriranje";
		$content='app'.'.'.'azuriranje';
		$data = with(new Knjiga)->knjige();
		

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('data',$data)->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}

	public function prikaziZaduzenja()
	{
		$title="Zaduzenja";

		$data = with(new Knjiga)->zaduzenje();
		$content='app'.'.'.'zaduzenja';

		//$data = Knjiga::with('zaduzenje')->get();//find(103)->Zaduzenje;//
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('data',$data)->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}
	public function prikaziDelete()
	{
		$title="Brisanje knjige";
		
		$content='app'.'.'.'delete';
		$data = with(new Knjiga)->knjige();

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('data',$data)
			->with('user', Auth::user());
	}

	public function prikaziKnjigu()
	{
		$title="Prikaz knjige";
		$komentari = with(new Komentar)->komentari(1);
		$knjiga=with(new Knjiga)->nadjiKnjigu(1);
		$content='app'.'.'.'knjiga';
		$prosek = with(new Komentar)->proscenaOcena(1);
		$oceni = with(new Komentar)->ocenjenaKnjiga(1,Auth::user()->id);
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('komentari',$komentari)->with('knjiga',$knjiga)
			->with('user', Auth::user())->with('prosek',$prosek)->with('oceni',$oceni);;
	}
	public function prikaziKatalog()
	{
		$title="Prikaz katalog knjiga";
		$data = with(new Knjiga)->knjige();
		
		$content='app'.'.'.'katalogKnjiga';

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('data',$data)
			->with('user', Auth::user());
	}

	


	public function uradiUnos(){		

		with(new Knjiga)->insert();
		return Redirect::to('/spisakKnjiga');


	}

	public function uradiAzuriranje(){
			$input =Input::all();//cuvaju se svi podaci iz forme Unos
			$naziv=$input['naziv'] ;
			$autor=$input['autor'];
			$dostupnost=$input['dostupnost'];
			$ID=$input['ID'];
			$godina=$input['godina'];
			$broj=$input['br_strana'];
			$opis=$input['opis'] ;
			$tehnologija=$input['tehnologija'] ;
			$rules=array
			(//'ID'=>'min:3', 
				/*'naziv'=>'min:3',
				'autor'=>'min:3',
				'godina'=>'min:4',
				'tehnologija'=>'min:3',
				'opis'=>'min:5'*/
				);

			$validator=Validator::make($input,$rules);

			if ($validator->passes()) {
				DB::table('knjige')
				->where('id', $ID)
				->update(array('naziv' => $naziv,'autor'=>$autor,'opis' => $opis,'godina_izdanja'=>$godina, 'tehnologija' => $tehnologija,'br_strana'=>$broj, 'dostupnost'=>$dostupnost));
				
				return Redirect::to('/success'); }

				else{
					return Redirect::to('/error');}

				}

	public function obrisi(){

					with(new Knjiga)->delete();		

					return Redirect::to('/success'); 			

				}

	public function unesiKomentar(){

					with(new Komentar)->insertKomentar(1,Auth::user()->id);
					return Redirect::to('/knjiga'); 		

				}

	public function izbrisiKomentar(){


					$input =Input::all();

					with(new Komentar)->izbrisiKomentar(Auth::user()->id);
					return Redirect::to('/knjiga'); 

				}

			}
