
 <body>

<nav class="navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('home') }}"> FONIS Biblioteka </a>
      </div>
      <div class="col-sm-1  ">
      </div>

   <div class=" col-md-5 ">

       {{ Form::open(array('action' => 'KnjigeController@prikaziPretragu', 'class'=>'navbar-form')); }}    
       
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Unesite pojam za pretragu" name="poljePretrage" id="poljePretrage">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
         {{Form::close()}}
        </div>


      <ul class="nav navbar-nav navbar-right">
       <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo $user->firstname?> <span class="caret"></span></a>
       
        <ul class="dropdown-menu">
          
           
         
          <li><a href="profil">Prikazi profil</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
      
      <li><a href="users/logout"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        
        </ul>
       
      </div>
  
  </nav>


