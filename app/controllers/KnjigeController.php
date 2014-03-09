
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
		$data = with(new Knjiga)->select();
		$title="Bibiloteka";
		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
			}	
		else return View::make('template')->with('data',$data)->with('title',$title)->with('content',$content)->with('user', Auth::user());
	}
	public function prikaziAzuriranje()
	{
		$title="Azuriranje";
		$content='app'.'.'.'azuriranje';
		$data = with(new Knjiga)->select();
		

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
			}	
		else return View::make('template')->with('data',$data)->with('title',$title)->with('content',$content)->with('user', Auth::user());
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
		else return View::make('template')->with('data',$data)->with('title',$title)->with('content',$content)->with('user', Auth::user());
	}
	public function prikaziDelete()
	{
		$title="Brisanje knjige";
		
		$content='app'.'.'.'delete';
		$data = with(new Knjiga)->select();

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
			}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('data',$data)->with('user', Auth::user());
	}

	public function prikaziKnjigu()
	{
		$title="Prikaz knjige";
		$data = with(new Knjiga)->komentari(101);
		$content='app'.'.'.'knjiga';

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
			}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('data',$data)->with('user', Auth::user());
	}
	public function prikaziKatalog()
	{
		$title="Prikaz katalog knjiga";
		$data = with(new Knjiga)->select();
		$content='app'.'.'.'katalogKnjiga';

		if (!Auth::check()) {
			$title="Login";
			return	View::make('users.login')->with('title',$title)->with('message', 'Morate bit ulogovani da biste videli  stranu!');
			}	
		else return View::make('template')->with('title',$title)->with('content',$content)->with('data',$data)->with('user', Auth::user());
	}
	


	public function uradiUnos(){

		//cuvaju se svi podaci iz forme Unos
		$input =Input::all();
		$rules=array
			('ID'=>'min:3', /*uslovi za validaciju element_0-ID mora da ima najmanje 3 karaktera, godina barem 4 itd
				dodatne provere tek treba da se urade ove samo proveravaju broj akraktera */
				'naziv'=>'min:3',
				'autor'=>'min:3',
				'godina'=>'min:4',
				'tehnologija'=>'min:3',
				'opis'=>'min:5'
				);

			$validator=Validator::make($input,$rules);

			if ($validator->passes()) {
				with(new Knjiga)->insert();
				return Redirect::to('/success'); }

				else{
					return Redirect::to('/error');}


				}

	public function uradiAzuriranje(){
			$input =Input::all();//cuvaju se svi podaci iz forme Unos
			$naziv=$input['naziv'] ;
			$autor=$input['autor'];
			$dostupnost=$input['dostupnost'];
			$ID=$input['ID'];
			$godina=$input['godina'];
			$opis=$input['opis'] ;
			$tehnologija=$input['tehnologija'] ;
			$rules=array
			('ID'=>'min:3', /*uslovi za validaciju element_0-ID mora da ima najmanje 3 karaktera, godina barem 4 itd
				dodatne provere tek treba da se urade ove samo proveravaju broj akraktera */
				'naziv'=>'min:3',
				'autor'=>'min:3',
				'godina'=>'min:4',
				'tehnologija'=>'min:3',
				'opis'=>'min:5'
				);

			$validator=Validator::make($input,$rules);

			if ($validator->passes()) {
				DB::table('knjige')
				->where('ID', $ID)
				->update(array('naziv' => $naziv,'autor'=>$autor,'opis' => $opis,'godina_izdanja'=>$godina, 'tehnologija' => $tehnologija, 'dostupnost'=>$dostupnost));
				
				return Redirect::to('/success'); }

				else{
					return Redirect::to('/error');}

				}

	public function obrisi(){
			
		with(new Knjiga)->delete();		

		return Redirect::to('/success'); 			

				}

	public function unesiKomentar(){

		//cuvaju se svi podaci iz forme Unos
		$input =Input::all();
		$rules=array
			(
				'komentar'=>'min:5'

				);

			$validator=Validator::make($input,$rules);

			if ($validator->passes()) {
				with(new Knjiga)->insertKomentar(101,Auth::user()->id);
				return Redirect::to('/knjiga'); }

				else{
					return Redirect::to('/error');}


				}

			}