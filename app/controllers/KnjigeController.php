
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

		$zaduzenje = new Zaduzenje();


		$zaduzenja=$zaduzenje->zaduzenje();
		
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
				$knjiga=new Knjiga();
		$knjiga->azurirajKnjigu();	
		return Redirect::to('/spisakKnjiga');

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


	public function  dodajZaduzenje(){
		$zaduzenje= new Zaduzenje();
		$zaduzenje->dodajZaduzenje(Auth::user()->id);
			return Redirect::to('/zaduzenja'); 		

			}
	public function  razduziKnjigu(){
		$zaduzenje= new Zaduzenje();
		$zaduzenje->razduziKnjigu();
			return Redirect::to('/zaduzenja'); 		

			}		
	
}
