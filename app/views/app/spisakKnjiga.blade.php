


<div class="col-md-9">

  <div class="col-lg-12">
    <div class="page-header">
      <h1 >Spisak Knjiga</h1>
    </div>

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
          
          
          <tr>
            <td>{{ $knjiga->identifikator}} </td>
            <td> {{ $knjiga->naziv}}</td>
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


      
    </div>

  </div>

</div>
