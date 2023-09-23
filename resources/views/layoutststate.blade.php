@extends('layoutMAIN')
@section('title','مرحلة الطالب')
@section('content')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <h5>مرحلة الطالب {{$stname}}</h5>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav ">

        <li class="nav-item w3-bar-item w3-button w3-padding"  >
          <a id="navstate" class="nav-link act"   href="{{route('ststate',$ststudyid)}}">المرحلة</a>
        </li>
        <li class="nav-item w3-bar-item w3-button w3-padding"  >
          <a id="navtitle" class="nav-link disabled"  href="{{route('getrestitles',$ststudyid)}}" >عنوان الرسالة</a>
        </li>
        <li class="w3-bar-item w3-button w3-padding"  >
          <a id="navdisc" class="nav-link disabled" href="{{route('getdiscussion',$ststudyid)}}" aria-disabled="true">المناقشة</a>
        </li>
        <li class="w3-bar-item w3-button w3-padding" >
          <a id="navres" class="nav-link disabled " href="{{route('getsresearches',$ststudyid)}}" aria-disabled="true">البحوث</a>
        </li>
        <li class="w3-bar-item w3-button w3-padding">
          <a id="navskil" class="nav-link disabled " href="{{route('getskills',$ststudyid)}}" aria-disabled="true">تطوير المهارات</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script type="text/javascript">
  var test = "<?= $rsid ?>";
  var el = document.getElementById('navtitle');
  var el2 = document.getElementById('navdisc');
  var el3 = document.getElementById('navres');
  var el4 = document.getElementById('navskil');
  if (test == '' ) {
    el.setAttribute("aria-disabled", "true");
    el.classList.add('disabled');
    el2.setAttribute("aria-disabled", "true");
    el2.classList.add('disabled');
    el3.setAttribute("aria-disabled", "true");
    el3.classList.add('disabled');
    el4.setAttribute("aria-disabled", "true");
    el4.classList.add('disabled');
  }
  else
  {
    el.setAttribute("aria-disabled", "false");
    el.classList.remove('disabled');
    el2.setAttribute("aria-disabled", "false");
    el2.classList.remove('disabled');
    el3.setAttribute("aria-disabled", "false");
    el3.classList.remove('disabled');
    el4.setAttribute("aria-disabled", "false");
    el4.classList.remove('disabled');
  }
</script>
<div class="w3-row-padding w3-margin-bottom">

  <div class="w3-container"  >
      
      <ul class="w3-ul cardmain w3-white">
        @yield('content2')

         


      </ul>
    </div>
  </div>
  @endsection
