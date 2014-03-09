
<div class="col-md-9">

  <div class="thumbnail">
    <img class="img-responsive" src="img/knjige.png" alt="">
    <div class="caption-full">
      <?php $prikaz=0;?>



      <hr>
      @foreach ($data as $result)
      @if ($prikaz != 1)
      <?php $prikaz+=1?>
      <h3><a href="#">{{ $result->naziv}}</a>
      </h3>
      <h4><b>Opis:</b> </h4>
      <p>{{ $result->opis}} </p>

      <div class="row">
        <div class="col-md-12">
         <div class="col-md-3">
           <h5><b>Autor:</b>  {{ $result->autor}}</h5>

         </div>
         <div class="col-md-2">
           <h5><b>Tehnologija:</b>   <a  href="#">{{ $result->tehnologija}}</a></h5>

         </div>
         <div class="col-md-2">
           <h5><b>Broj strana:</b>    {{ $result->br_strana }} 
           </h5>
         </div>
         <div class="col-md-3">
         <h5><b>Prosecna ocena:</b>    {{ $prosek}}</h5>
        </div>
        <div class="col-md-2">
        <h5 ><b>Godina :</b>    {{ $result->godina_izdanja}}</h5>
        </div>

         
       </div>
     </div>

   </div> 
 </div> 
 <div class="well">

  <h5><a href="#">Komentari:</a>
  </h5>
  <hr>
  @endif



  <div class="row">
    <div class="col-md-12">

    
    {{'Korisnik: '}}
    {{  '<b>'.$result->firstname.'</b>' }}
    {{ '<b>'.$result->lastname.'</b>'}}
    <span class="pull-right">10 days ago</span>
    
    <p>komentar: {{ $result->komentar }}</p>
  
     <?php 
     echo "Ocena: ";
       switch ($result->ocena) {
      case 1:
      echo '<span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star-empty"></span>
      <span class="glyphicon glyphicon-star-empty"></span>
      <span class="glyphicon glyphicon-star-empty"></span>
      <span class="glyphicon glyphicon-star-empty"></span>';
      break;
      case 2:
      echo '<span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star-empty"></span>
      <span class="glyphicon glyphicon-star-empty"></span>
      <span class="glyphicon glyphicon-star-empty"></span>
      <span class="glyphicon glyphicon-star-empty"></span>';
      break;
      case 3:
      echo     '<span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star-empty"></span>
      <span class="glyphicon glyphicon-star-empty"></span>';
      break;
      case 4:
      echo      '<span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star-empty"></span>';
      break;
      case 5:
      echo '<span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>
      <span class="glyphicon glyphicon-star"></span>';
      break;

    }
    echo " "."<br>";
    ?>
  </div>
</div>

<hr>   
@endforeach
{{ Form::open(array('action' => 'KnjigeController@unesiKomentar', 'class'=>'bs-example form-horizontal')); }}
<div class="form-group">
  <label for="textArea" class="col-lg-2 control-label">Tekst komentara</label>
  <div class="col-lg-10">
    <textarea class="form-control" rows="3" name="komentar" data-validation="length" data-validation-length="min6" ></textarea>

  </div>
</div>
<div class="form-group">
  <label for="select" class="col-lg-2 control-label">Ocena knjige</label>
  <div class="col-lg-10">
    <select  multiple="" class="form-control" name="ocena">                                  

      <option  value="1"> Ocena 1 </option>
      <option  value="2"> Ocena 2 </option>
      <option  value="3"> Ocena 3 </option>
      <option  value="4"> Ocena 4 </option>
      <option value="5"> Ocena 5 </option>

    </select>
  </div>

</div>

<div class="text-right">
 {{ Form::submit('Komentarisi i oceni', array('class'=>'btn  btn-success '))}}
</div>              
</form>
</div>



<div class="ratings">
  <p class="pull-right">3 reviews</p>
  <p>
    @include('layouts.ocene') 
    4.0 stars
  </p>
</div>
</div>
