          

                <div class="col-md-9">

                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 >Spisak Zaduzenja</h1>
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
                                        <th>Korisnik</th>
                                    </tr>
                                </thead>
                                <tbody>
                               

                                 
                                  @foreach ($data as $result) 
                                 
                                   
                                        <tr>
                                        <td>{{ $result->ID}} </td>
                                      <td> {{ $result->naziv}}</td>
                                       <td>{{ $result->autor}}</td>
                                        <td> {{ $result->tehnologija}}</td>
                                       <td>{{ $result->datum}} </td>
                                     
                                      <td> {{ $result->lastname }}</td>
                                     
                                        
                                         
                                      
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
           