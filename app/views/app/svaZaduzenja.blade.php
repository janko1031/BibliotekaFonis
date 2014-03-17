          

<div class="col-md-9">

    <div class="col-lg-12">
        <div class="page-header">
            <h1 >Spisak svih evidentiranih zaduzenja</h1>
        </div>

        <div class="bs-example table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tabela">
                <thead>
                    <tr>
                        <th>Redni br</th>
                        <th>Naziv</th>
                        <th>Autor</th>
                        
                        <th>Tehnologija</th>
                        
                         <th>Status </th>
                    
                   
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

                     @if($zaduzenje->vracena==1)
                         <td><span class="label label-success">Vracena</span>  {{ $zaduzenje->updated_at}}</td>
                         @endif 
                        @if($zaduzenje->vracena==0)
                        <td><span class="label label-info">Zaduzena</span> {{ $zaduzenje->updated_at}} </td>
                         @endif
                   
                    
                    <td> {{$zaduzenje->firstname ." ". $zaduzenje->lastname }}</td>
                    
                    
                    
                    
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>

</div>

</div>
