<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <title>@yield('title','layot title')</title>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
      <link rel="stylesheet" href="{{ url('/css/w3.css') }}">
      <link rel="stylesheet" href="{{ url('/css/mycss.css')}}">
      <link rel="stylesheet" href="{{ url('/css/bootstrap.css')}}">


    
      <style>
      html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
      </style>
</head>



<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large " style="z-index:4">
  <button class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> القائمة</button>
  <span class="w3-bar-item w3-left ">  نظام متابعة الطلبة <i class="fa fa-desktop"></i> </b> </span>
  <span class="w3-bar-item w3-right w3-hide-small"><i class="fa fa-fire"></i> الصلاحيات:
    @if (auth()->user()->unid)
    الجامعة {{auth()->user()->universities->uname}}
    @else
    الجامعة عام
    @endif
    @if (auth()->user()->did)
    <i class="fa fa-hand-o-left"></i> القسم {{auth()->user()->departments->dname}}
  @else
  <i class="fa fa-hand-o-left"></i> القسم عام
    @endif
    
     </span>

</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-animate-right " style="z-index:3;width:300px;" id="mySidebar" ><br>
    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="{{ asset('storage/images/1.jpg')}}" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar">
        <span>مرحبا, <strong>{{auth()->user()->fullname}}</strong></span><br>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
        <a href="{{route('logout')}}" class="w3-bar-item w3-button " title="Logout"><i class="fa fa-sign-out"></i></a>
        
      </div>
    </div>
    <hr>
    <div class="w3-container" >
      <h5>القائمة الرئيسية</h5>
    </div>
    <div class="w3-bar-block" id="nav">
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
      <a id="main" href="{{route('home')}}" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  الصفحة الرئيسية</a>
      @if (! auth()->user()->unid)
      <a id="channelsnav" href="{{route('channels')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  قنوات القبول</a>
      <a id="studiesnav" href="{{route('studies')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  الدراسات</a>
      <a id="livenav" href="{{route('live')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  live</a>
      <a id="majorsnav" href="{{route('majors')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> admin التخصصات</a>
      <a id="lecturerssnav" href="{{route('lecturerss')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i> admin التدريسيين</a>
      <a id="subjectsnav" href="{{route('subjects')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  adminالمواد الدراسية</a>
      <a id="studentsnav" href="{{route('students')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  admin الطلاب</a>
      <a id="universitiesnav" href="{{route('universities')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  الجامعات</a>
      <a id="accountsnav" href="{{route('accounts')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  المستخدمين</a>



      @elseif(! auth()->user()->did )
      <a  id="departmentsnav" href="{{route('departments')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home "></i>  الاقسام او الكليات</a>
      <a  id="accountsnav" href="{{route('accounts')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  المستخدمين</a>

      @else
      <a  id="depmajorsnav" href="{{route('depmajors')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-star fa-fw"></i>  التخصصات</a>
      <a  id="deplecturerssnav" href="{{route('deplecturerss')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  التدريسيين</a>
      <a  id="depsubjectsnav" href="{{route('depsubjects')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>  المواد الدراسية</a>
      <a id="depstudentsnav" href="{{route('depstudents')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  الطلاب</a>

      @endif
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
    </div>
  </nav>




<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->

<div class="w3-main " style="margin-right:300px;margin-top:43px;" >
    @if($errors->any())
        <div class="col-12">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}} </div>
        @endforeach
        </div>
    @endif
  
    @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}} </div>
    @endif
  
    @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}} </div>
    @endif
  <!-- Header -->

  @yield('content')


  <!-- Footer -->
  <footer class="w3-black">
    <div class="w3-container w3-black w3-padding-32">
      <div class="w3-row">
        <div class="w3-container w3-third">
          <h5 class="w3-bottombar w3-border-green">Demographic</h5>
          <p>Language</p>
          <p>Country</p>
          <p>City</p>
        </div>
        <div class="w3-container w3-third">
          <h5 class="w3-bottombar w3-border-red">System</h5>
          <p>Browser</p>
          <p>OS</p>
          <p>More</p>
        </div>
        <div class="w3-container w3-third">
          <h5 class="w3-bottombar w3-border-orange">Target</h5>
          <p>Users</p>
          <p>Active</p>
          <p>Geo</p>
          <p>Interests</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- End page content -->

</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<script src="{{ asset('js/ecolayout.js') }}"></script>

</body>
</html>


















