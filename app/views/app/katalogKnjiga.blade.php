

<div class="col-md-9">

    <div class="row">

      @foreach ($data as $result) 



      <div class="col-md-4 portfolio-item">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h5 class="panel-title"><a href="knjiga">{{$result->naziv}}</a></h5>

          </div>
          <div class="panel-body">
          <div class="row">
              <div class="pull-left">  <b>{{"Autor: "}}</b> {{$result->autor}}</div>
              <div class="pull-right">{{$result->godina_izdanja}}</div> 
          </div>
          <div class="row">
              <div class="pull-left"><b>Tehnologija: </b> {{$result->tehnologija}}  </div>
       </div>
      </div>
  </div>

</div>     


@endforeach        

</div>



<hr>

<div class="row text-center">

    <div class="col-lg-12">
        <ul class="pagination">
            <li><a href="#">&laquo;</a>
            </li>
            <li class="active"><a href="#">1</a>
            </li>
            <li><a href="#">2</a>
            </li>
            <li><a href="#">3</a>
            </li>
            <li><a href="#">4</a>
            </li>
            <li><a href="#">5</a>
            </li>
            <li><a href="#">&raquo;</a>
            </li>
        </ul>
    </div>

</div>

</div>