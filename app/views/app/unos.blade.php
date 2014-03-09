
                <div class="col-md-9">
                    <div class="well">


                              {{ Form::open(array('action' => 'KnjigeController@uradiUnos', 'class'=>'bs-example form-horizontal')); }}
                       

                     
                            <fieldset>
                           
                                <div class="form-group">
                                    <input type="hidden" name="action" value="unos" />
                                    <label  class="col-lg-2 control-label">ID knjige</label>
                                    <div class="col-lg-10">
                                        <input type="text"  name="ID" class="form-control" data-validation="length" data-validation-length="min3"  placeholder="ID knjige"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Naziv</label>
                                    <div class="col-lg-10">
                                        <input type="text"  name="naziv" class="form-control" placeholder="naziv knjige" data-validation="length" data-validation-length="min4"  >

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Autor</label>
                                    <div class="col-lg-10">
                                        <input type="text"  name="autor" class="form-control" placeholder="autor knjige" data-validation="length" data-validation-length="min5"  >

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Godina</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="godina" class="form-control"  placeholder="godina izdanja" data-validation="number" data-validation-allowing="range[1900;2100]"  >

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Tehnologija</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="tehnologija" class="form-control"  placeholder="opisana tehnologija" data-validation="length" data-validation-length="min3"  >

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label">Opis</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="3" name="opis" data-validation="length" data-validation-length="min6" ></textarea>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="select" class="col-lg-2 control-label">Dostupnost</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="dostupnost">
                                            <option  selected="selected" value="1"> Dostupna </option>
                                            <option value="0"> Nedostupna </option>

                                        </select>
                                    </div>



                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                
                                      
                                     {{ Form::submit('Unesi', array('class'=>'btn btn-large btn-primary '))}}
                                      <a href="{{ URL::action('KnjigeController@prikaziUnos') }}"><button  type="button" class="btn btn-default">Cancel </button></a>
                                    </div>
                                </div>
                            </fieldset>
                       {{

                                Form::close()
                                }}

                    </div>
                </div>
          