
<div class="col-md-9">
<div class="well">
<div class="page-header">
            <h2 >Spisak zaduzenih knjiga korisnika {{$user->username}}</h2>
        </div>
                
                   <div class="bs-example table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tabela">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Naziv</th>
                        <th>Autor</th>                        
                        <th>Tehnologija</th>
                        <th>Datum uzimanja</th>
                        <th>Vracanje</th>

                    </tr>
                </thead>
                <tbody>
                 

                   
                  @foreach ($zaduzenja as $zaduzenje) 
                  @if($zaduzenje->vracena==0) 
                  <tr>
                    <td>{{ $zaduzenje->id}} </td>
                    <td> {{ $zaduzenje->naziv}}</td>
                    <td>{{ $zaduzenje->autor}}</td>
                    <td> {{ $zaduzenje->tehnologija}}</td>
                    <td>{{ $zaduzenje->created_at}} </td>
                    
                    <td>
            {{ Form::open(array('action' => 'KnjigeController@razduziKnjigu', 'class'=>'bs-example form-horizontal')); }}    
      		  <input type="hidden" name="id_knjige" value="{{$zaduzenje->knjiga_id}}">
      		    <input type="text" name="id_zad" value="{{$zaduzenje->id}}">
       			<button class="btn btn-danger">
        		  Razduzi <i class="glyphicon glyphicon-ban-circle"></i></button>

         {{Form::close()}}</td>
                    
                    
                    
                    
                </tr>
                @endif
                @endforeach


            </tbody>
        </table>
        <div class="row">
    <div class="col-md-12">
            <h2 >Spisak komentara  korisnika {{$user->username}}</h2>

      
     @foreach ($komentari as $komentar) 
    {{'Korisnik: '}}
    {{  '<b>'.$komentar->firstname.'</b>' }}
    {{ '<b>'.$komentar->lastname.'</b>'}}
    <span class="pull-right">Vreme: {{$komentar->created_at}}</span>
    
    <p>komentar: {{ $komentar->komentar }}</p>
  @endforeach

  </div>
</div>
    </div>

                </div>

            </div>
