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



<!-- Sidebar/menu -->
<!-- Overlay effect when opening sidebar on small screens -->

<!-- !PAGE CONTENT! -->

<div class="w3-main" >

  <!-- Header -->
  <header class="w3-container" style="padding-top:62px">
  </header>

  @yield('content')
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


</div>

<script>


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


















