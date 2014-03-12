


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
         

         
          @foreach ($data as $result) 
          
          
          <tr>
            <td>{{ $result->identifikator}} </td>
            <td> {{ $result->naziv}}</td>
            <td>{{ $result->autor}}</td>
            <td>{{ $result->godina_izdanja}} </td>
            <td> {{ $result->tehnologija}}</td>
            @if ($result->dostupnost == 1)
            <td><span class="label label-success">DA</span></td>
            @endif  
            @if ($result->dostupnost == 0)
            <td><span class="label label-danger">NE</span></td>
            @endif      
            
            
            
          </tr>
          @endforeach


        </tbody>
      </table>


      <div class="col-md-12">

        <div class="thumbnail">

          <div class="caption-full">

            <form class="bs-example form-horizontal"  action="funkcijeBaze.php" method="POST">
              <input type="hidden" name="action" value="zaduzenje" />
              <p><div id="popuni"></div></p>

            </div>
            <div id="pomocniDiv" style="display:none">

              <div class="text-center">
                <a class="btn btn-success"  onclick="unhide()">Prikazi ostale knjige</a>

              </div>

            </div>


          </div>

        </div>
      </div>

    </div>

  </div>
