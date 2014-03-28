
<div class="col-md-9">

  <div class="col-lg-12">
    
      <h2 >Rezultati pretrage za: '<b>{{$keyword}}'</b></h1>
 <hr>

    <div class="bs-example table-responsive">
      <table class="table table-striped table-bordered table-hover" id="tabela">
        <thead>
          <tr>
            <th>#</th>
            <th>Naziv</th>
            <th>Autor</th>
            <th>Godina izdanja</th>
            <th>Tehnologija</th>
            <th>Dostupna</th>
          </tr>
        </thead>
        <tbody>
         

         
          @foreach ($knjige as $knjiga) 
          
          
          <tr onclick="document.location = '{{ URL::to('knjiga/'.$knjiga->id) }}';">
            <td>{{ $knjiga->identifikator}} </td>
            <td><a> {{ $knjiga->naziv}}</a></td>
            <td>{{ $knjiga->autor}}</td>
            <td>{{ $knjiga->godina_izdanja}} </td>
            <td> {{ $knjiga->tehnologija}}</td>
            @if ($knjiga->dostupnost == 1)
            <td><span class="label label-success">DA</span></td>
            @endif  
            @if ($knjiga->dostupnost == 0)
            <td><span class="label label-danger">NE</span></td>
            @endif      
            
            
            
          </tr>
          @endforeach


        </tbody>
      </table>


       <div class="col-lg-12">
    <ul class="pagination">

      
      {{ $knjige->links() }}
   
      </li>
    </ul>
  </div>
    </div>

  </div>

</div>
