          

<div class="col-md-9">

    <div class="col-lg-12">
        <div class="page-header">
            <h1 >Spisak Zaduzenja</h1>
        </div>

        <div class="bs-example table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tabela">
                <thead>
                    <tr>
                        <th>Redni br</th>
                        <th>Naziv</th>
                        <th>Autor</th>
                        
                        <th>Tehnologija</th>
                        <th>Datum uzimanja</th>
                        <th>Korisnik</th>

                    </tr>
                </thead>
                <tbody>
                 

                   
                  @foreach ($zaduzenja as $zaduzenje) 
                  
                  
                  <tr>
                    <td>{{ $zaduzenje->id}} </td>
                    <td> {{ $zaduzenje->naziv}}</td>
                    <td>{{ $zaduzenje->autor}}</td>
                    <td> {{ $zaduzenje->tehnologija}}</td>
                    <td>{{ $zaduzenje->created_at}} </td>
                    
                    <td> {{$zaduzenje->firstname ." ". $zaduzenje->lastname }}</td>
                    
                    
                    
                    
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>

</div>

</div>
