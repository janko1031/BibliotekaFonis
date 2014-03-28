
<div class="col-md-9">
  <div class="well">
    <div class="page-header">
      <h2 >Spisak zaduzenih knjiga korisnika {{$user->firstname}}:</h2>
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





          </tr>
          @endif
          @endforeach


        </tbody>
      </table>
      <div class="row">

          <h2 >Spisak komentara  korisnika {{$user->firstname}}:</h2>
          <hr>
         

             @foreach ($komentari as $komentar) 
             <?php $red+=1;?> 
              <div class="col-md-6">
              <div class="well">
              <h4> Za knjigu: <a href="{{ URL::to('knjiga/'.$komentar->id) }}"><b>{{$komentar->naziv}}</b></a></h4>

             <span >Vreme komentara: {{$komentar->created_at}}</span>
             <hr>
             <p>Tekst komentara: {{ $komentar->komentar }}</p>
             </div>
             @if($red%2==0)
              </div>
              <div class="row">

             @endif
         </div>
             @endforeach
     
     </div>
   </div>
 </div>

</div>
