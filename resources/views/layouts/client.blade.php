@include('inc.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id='app'>

  <!-- Navbar -->
  @include('inc.client-nav')
  <!-- /.navbar -->

 

  <!-- Content Wrapper. Contains page content -->

  
  <div class="content-wrapper">
    <v-app>
       <vue-progress-bar></vue-progress-bar>
       @yield('content')
    </v-app>
     
  </div>
  <!-- /.content-wrapper -->


@include('inc.footer')
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$.ajax({
    type: 'get',
    url: "api/get_agent_data",
    success: function (response) {
        const agent = response.data
        $('#logo').attr('src', '/storage/images/'+agent.logo )
        $('#logo').css('border-color', agent.color_system)
        $('#button1').css('border-color', agent.color_system)
        
        $("#button1").hover(function(){
  $(this).css('background-color', agent.color_system);
  }, function(){
  $(this).css("background-color", 'transparent');
});
    }
});
</script>
