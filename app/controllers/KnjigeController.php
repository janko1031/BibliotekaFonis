
<?php
class KnjigeController extends BaseController {

	public function prikaziUnos()
	{
		
		$title="Unos nove knjige";
		$content='admin'.'.'.'unos';

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
		$title="Azuriranje knjige";
		$content='admin'.'.'.'azuriranje';

		$knjiga=new Knjiga();	
		

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('knjige', $knjiga->knjige())->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}

	public function prikaziSvaZaduzenja()
	{
		$title="Zaduzenja";
		$content='admin'.'.'.'svaZaduzenja';

		$zaduzenje = new Zaduzenje();
		

		$zaduzenja=$zaduzenje->svaZaduzenja();
		
		
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('zaduzenja',$zaduzenja)->with('title',$title)->with('content',$content)
			->with('user', Auth::user());
	}
	public function prikaziZaduzene()
	{
		$title="Zaduzenja";
		$content='admin'.'.'.'zaduzeneKnjige';

		$zaduzenje = new Zaduzenje();
		

		$zaduzenja=$zaduzenje->vratiZaduzeneKnjige();
		
		
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
		$content='admin'.'.'.'delete';

		
		$knjiga = new Knjiga();

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('knjige',$knjiga->knjige())
			->with('user', Auth::user());
	}

	public function prikaziKnjigu($id )
	{
   
		$title="Prikaz knjige";
		$content='app'.'.'.'knjiga';
		$knjiga=new Knjiga();
		$komentar = new Komentar();
		
		
		$komentari=$komentar->komentari2($id);		
		$knjiga=$knjiga->nadjiKnjigu($id);

		$prosek = $komentar->proscenaOcena($id);		
		$oceni = $komentar->ocenjenaKnjiga($id,Auth::user()->id);

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
		}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('komentari',$komentari)->with('knjiga',$knjiga)
			->with('user', Auth::user())->with('prosek',$prosek)->with('oceni',$oceni);; //

	
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

			$id=Input::get('id_knjige');
			$komentar->ubaciKomentar(Auth::user()->id);
			return Redirect::to("/knjiga/$id"); 		

			}

	public function izbrisiKomentar(){
			$komentar= new Komentar();
			$id=Input::get('id_knjige');
			$komentar->izbrisiKomentar(Auth::user()->id);	
			return Redirect::to("/knjiga/$id"); 

				}


	public function  dodajZaduzenje(){
		$zaduzenje= new Zaduzenje();
		$zaduzenje->dodajZaduzenje(Auth::user()->id);
			return Redirect::to('/zaduzeneKnjige'); 		

			}
	public function  razduziKnjigu(){
		$zaduzenje= new Zaduzenje();
		$zaduzenje->razduziKnjigu();
			return Redirect::to('/svaZaduzenja'); 		

			}		
	
}
