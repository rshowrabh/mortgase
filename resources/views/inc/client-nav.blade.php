<nav class="navbar navbar-expand-lg navbar-white border-nav">
    <div class="container">
        <a style="margin-left: 100px" class="navbar-brand" href="#"><img style="height: 100px;border-color:black"
                width="100px" src="/dist/img/avatar.png" class='img-fluid' alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto d-block">
                <li>Agent Name : <span id='agent_name'>Name</span></li>
                <li>Agent Licesnse No : <span id='agent_license'>License</span></li>
                <li>Agent Phone No : <span id='agent_phone'>Phone</span></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a style="margin-left: 100px" class="navbar-brand" href="#"><img style="height: 100px;border-color:black"
                id='logo' width="100px" src="/dist/img/avatar.png" class='img-fluid' alt=""></a>
            </ul>
            <button id='button1' class="btn btn-outline-success my-2 my-sm-0"
                type="submit">{{auth()->user()->name}}</button>

        </div>
    </div>
</nav>
