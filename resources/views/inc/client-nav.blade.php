<nav class="navbar navbar-expand-lg navbar-white border-nav navbar-fixed-top w-100">
    <div class="container">
        <a style="margin-left: 100px" class="navbar-brand" href="#"><img id='picture' 
                width="100px" src="/dist/img/avatar.png" class='img-fluid rounded-circle' alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto d-block">
                 <h2>{{ config('app.name', 'Laravel') }} Application</h2> 

                 <li style='padding:5px;' class="agent">

                 </li>

                <li>Agent Name : <span id='agent_name'>Name</span></li>
                <li>Agent License No : <span id='agent_license'>License</span></li>
                <li>Agent Phone No : <span id='agent_phone'>Phone</span></li>
            </ul>
            <ul class="navbar-nav ml-auto d-flex">
             
                 <li> <a style="margin-left: 100px" class="navbar-brand" href="#">
                    <img 
                id='logo' width="100px" src="/dist/img/avatar.png" class='img-fluid' alt="">
                <p class='text-black-50' id='broker_license'></p>
                </a>
            </li>
            </ul>
            <a href="{{route('logout')}}" id='button1' class="btn btn-outline-success p-2 my-2 my-sm-0"
                type="submit">Logout</a>

        </div>
    </div>
</nav>


