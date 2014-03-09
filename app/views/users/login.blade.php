  @include('layouts.head') 

	
    <body>
<div class="container">
{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
<p><?php echo $message; ?></p>
      <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Unesite podatke</h2>
        <input type="email" class="form-control" placeholder="Email " required autofocus name="email">
        <input type="password" class="form-control" placeholder="Password" required name="password">
       {{ Form::submit('Uloguj se', array('class'=>'btn btn-large btn-primary btn-block'))}}
        
      {{ Form::close() }}
         <div class="col-md-5">     
</div>
<div class="col-md-2">     
<a href="register" >
<button class="btn btn-lg btn-primary btn-block" type="submit" name="Login">Registruj se</button></a>
        </div>

     

    


    </div>
      
        
    </body>
     <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

</html>

