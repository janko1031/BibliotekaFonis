
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

		$title="Spisak knjiga";
		$content='app'.'.'.'spisakKnjiga';
		$knjiga=new Knjiga();	
		
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('knjige', $knjiga->knjige())->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}
	public function prikaziAzuriranje()
	{
		$title="Azuriranje";
		$content='app'.'.'.'azuriranje';

		$knjiga=new Knjiga();	
		

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('knjige', $knjiga->knjige())->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}

	public function prikaziZaduzenja()
	{
		$title="Zaduzenja";
		$content='app'.'.'.'zaduzenja';

		$knjiga = new Knjiga();


		$zaduzenja=$knjiga->zaduzenje();
		
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('zaduzenja',$zaduzenja)->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}
	public function prikaziDelete()
	{
		$title="Brisanje knjige";		
		$content='app'.'.'.'delete';

		
		$knjiga = new Knjiga();

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('knjige',$knjiga->knjige())
			->with('user', Auth::user());
	}

	public function prikaziKnjigu()
	{	
		$title="Prikaz knjige";
		$content='app'.'.'.'knjiga';
		$knjiga=new Knjiga();
		$komentar = new Komentar();
		
		
		$komentari=$komentar->komentari(1);		
		$knjiga=$knjiga->nadjiKnjigu(1);

		$prosek = $komentar->proscenaOcena(1);		
		$oceni = $komentar->ocenjenaKnjiga(1,Auth::user()->id);

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
		$content='app'.'.'.'katalogKnjiga';
		$knjiga=new Knjiga();	
		

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('knjige',$knjiga->knjige())
			->with('user', Auth::user());
	}

	


	public function uradiUnos(){	
		$knjiga=new Knjiga();
		$knjiga->ubaciKnjigu();	
		return Redirect::to('/spisakKnjiga');
	}

	public function uradiAzuriranje(){
			$input =Input::all();//Ovo tek treba da sredim
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

	public function obrisiKnjigu(){
		$knjiga=new Knjiga();
		$knjiga->izbaciKnjigu();

		return Redirect::to('/success'); 			

				}

	public function unesiKomentar(){
			$komentar= new Komentar();
			$komentar->ubaciKomentar(1,Auth::user()->id);
			return Redirect::to('/knjiga'); 		

			}

	public function izbrisiKomentar(){
			$komentar= new Komentar();
			$komentar->izbrisiKomentar(1,Auth::user()->id);	
			return Redirect::to('/knjiga'); 

				}

			}
