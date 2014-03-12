 
<div class="col-md-9">
	<div class="well">


		{{ Form::open(array('action' => 'KnjigeController@obrisi', 'class'=>'bs-example form-horizontal')); }}
		<fieldset>
			<legend>Brisanje knjige iz baze</legend>
			<div class="form-group">
				<label  class="col-lg-2 control-label">Izaberite knjigu za brisanje</label>

				<div class="col-lg-10">
					<select  multiple="" class="form-control" name="ID1">

						@foreach ($data as $row)

						<option  value="{{$row->id}}"> {{$row->identifikator,": ", $row->naziv}} </option>

						@endforeach 
						</select>

				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">

					<button type="submit"  class="btn btn-primary">Izbrisi</button> 
				</div>
			</div>

		</fieldset>
		{{Form::close()}}
	</div>
</div>
