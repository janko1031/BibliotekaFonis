

<div class="col-md-9">

  <div class="row">

    @foreach ($knjige as $knjiga) 



    <div class="col-md-4 portfolio-item">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 class="panel-title"><a href="knjiga"><b>{{$knjiga->naziv}}</b></a></h5>


        </div>
        <div class="panel-body">

          <div class="pull-left">  <b>Autor:</b> {{$knjiga->autor}}</div>
          <div class="pull-right">{{$knjiga->godina_izdanja}}</div> 

          <hr>
          <div class="pull-left"><b>Tehnologija: </b> {{$knjiga->tehnologija}}  </div>
        </br>
        <div class="pull-left"><b>Br. strana: </b>{{$knjiga->br_strana}}</div> 
        @if ($knjiga->dostupnost == 1)           
        <div class="pull-right"> Dostupna: <span class="label label-success">DA</span></div>
      </br>    
      <hr>
      <div class="col-md-2"> </div>        
      <div class="col-md-3"> 
        {{ Form::open(array('action' => 'KnjigeController@dodajZaduzenje', 'class'=>'bs-example form-horizontal')); }}    
        <input type="hidden" name="id_knjige" value="{{$knjiga->id}}">
        <a href="#" type="submit"><button class="btn btn-success">
         <i class="glyphicon glyphicon-check"></i> Rezervisi </button></a>

         {{Form::close()}}
       </div>
       @endif  
       @if ($knjiga->dostupnost == 0)
       <div class="pull-right">Dostupna: <span class="label label-danger">NE</span></div>
       </br>
      <hr>
      <div class="col-md-2"> </div>        
      <div class="col-md-3"> 
       
        <a href="#" type="button"><button class="btn btn-danger">
         <i class="glyphicon glyphicon-ban-circle"></i> Nedostupna </button></a>


       </div>
      @endif


    </div>
  </div>

</div>     


@endforeach        

</div>



<hr>

<div class="row text-center">

  <div class="col-lg-12">
    <ul class="pagination">
      <li><a href="#">&laquo;</a>
      </li>
      <li class="active"><a href="#">1</a>
      </li>
      <li><a href="#">2</a>
      </li>
      <li><a href="#">3</a>
      </li>
      <li><a href="#">4</a>
      </li>
      <li><a href="#">5</a>
      </li>
      <li><a href="#">&raquo;</a>
      </li>
    </ul>
  </div>

</div>

</div>