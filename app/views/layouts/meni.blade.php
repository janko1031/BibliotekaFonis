
<div class="container"><!-- sadrzi glavni deo sajta meni i sadrzaj-->

 <div class="row"> 
  <div class="col-md-3">

    <div class="list-group">
      <a href="home" class="list-group-item">Pocetna  </a>
      <a href="spisakKnjiga" class="list-group-item">Spisak knjiga</a>      
      <a href="katalogKnjiga" class="list-group-item">Katalog knjiga</a>
        @if($user->isAdmin())
      <a href="unos" class="list-group-item">Unos nove knjige</a>
      <a href="azuriranje" class="list-group-item">Azuriranje knjige </a>
      <a href="delete" class="list-group-item">Brisanje knjige</a>
      <a href="svaZaduzenja" class="list-group-item">Spisak svih zaduzenja </a>
      <a href="zaduzeneKnjige" class="list-group-item"> Trenutno zaduzene knjige </a>
      @endif

    </div>
  </div>

