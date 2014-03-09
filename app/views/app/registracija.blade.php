<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title}}</title>
    <script src="js/validation.js"></script>
    @include('layouts.head') 
</head>

<body>



    <div class="container">

        <div class="row">


        <div class="col-md-9">          

               {{ Form::open(array('url'=>'users/create', 'class'=>'bs-example form-horizontal')) }}
               <h2 class="form-signup-heading">Unesite podatke za registaciju</h2>

               <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

            <div class="form-group">
                <input type="hidden" name="action" value="unos" />
                <label  class="col-lg-2 control-label">Ime</label>
                <div class="col-lg-10">
                    <input type="text"  name="firstname" class="form-control" data-validation="length" data-validation-length="min3"  placeholder="Ime"  >
                </div>
            </div>
            <div class="form-group">
                <label  class="col-lg-2 control-label">Prezime</label>
                <div class="col-lg-10">
                    <input type="text"  name="lastname" class="form-control" placeholder="Prezime" data-validation="length" data-validation-length="min4"  >

                </div>
            </div>
            <div class="form-group">
                <label  class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="text"  name="email" class="form-control" placeholder="email" data-validation="length" data-validation-length="min5"  >

                </div>
            </div>
            <div class="form-group">
                <label  class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input type="password" name="password" class="form-control"   data-validation="number" data-validation-allowing="range[1900;2100]"  >

                </div>
            </div>
            <div class="form-group">
                <label  class="col-lg-2 control-label">Repeat Password</label>
                <div class="col-lg-10">
                    <input type="password" name="password_confirmation" class="form-control"   data-validation="length" data-validation-length="min3"  >

                </div>
            </div>
            <div class="col-md-2">     
            </div>
            <div class="col-md-4">     
                {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
                {{ Form::close() }}
            </div>
            <div class="col-md-2">     
            </div>


            </div>
        </div>
        <ul class="pager">
  <li class="previous"><a href="{{ URL::previous() }}">← Nazad</a></li>
 
</ul>
    </div>


@include('layouts.footer') 

<script src="js/jquery.form-validator.min.js"></script>
<script> $.validate();</script>
</body>
</html>