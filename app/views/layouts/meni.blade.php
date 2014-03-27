
<div class="container"><!-- sadrzi glavni deo sajta meni i sadrzaj-->

 <div class="row"> 
  <div class="col-md-3">

    <div class="list-group">
      <a href="{{ URL::to('home') }}" class="list-group-item">Pocetna  </a>
      <a href="{{ URL::to('spisakKnjiga') }}" class="list-group-item">Spisak knjiga</a>      
      <a href="{{ URL::to('katalogKnjiga') }}" class="list-group-item">Katalog knjiga</a>
        @if($user->isAdmin())
      <a href="{{ URL::to('unos') }}" class="list-group-item">Unos nove knjige</a>
      <a href="{{ URL::to('azuriranje') }}" class="list-group-item">Azuriranje knjige </a>
      <a href="{{ URL::to('delete') }}" class="list-group-item">Brisanje knjige</a>
      <a href="{{ URL::to('svaZaduzenja') }}" class="list-group-item">Spisak svih zaduzenja </a>
      <a href="{{ URL::to('zaduzeneKnjige') }}" class="list-group-item"> Trenutno zaduzene knjige </a>
      @endif

    </div>
  </div>


