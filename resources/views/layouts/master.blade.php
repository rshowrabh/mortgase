@include('inc.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id='app'>

  <!-- Navbar -->
  @include('inc.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('inc.sidebar')

  <!-- Content Wrapper. Contains page content -->

  
  <div class="content-wrapper">
    <v-app>
       <router-view></router-view>
       <vue-progress-bar></vue-progress-bar>
       @yield('content')
    </v-app>
     
  </div>
  <!-- /.content-wrapper -->


@include('inc.footer')
