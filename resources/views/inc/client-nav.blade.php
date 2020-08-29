<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
  <a style="margin-left: 100px" class="navbar-brand" href="#"><img style="height: 100px;border-color:black" id='logo' width="100px" src="/dist/img/avatar.png" class='img-fluid' alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
      <button id='button1' class="btn btn-outline-success my-2 my-sm-0" type="submit">{{auth()->user()->name}}</button>
   
  </div>
  </div>
</nav>

