@extends('layoutMAIN')
@section('title','معلومات الطالب')
@section('content')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <h5>معلومات الطالب {{$stname}}</h5>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav ">

        <li class="nav-item w3-bar-item w3-button w3-padding"  >
          <a id="navstate" class="nav-link act"   href="{{route('studentMainDet',$stid)}}">المعلومات الشخصية</a>
        </li>
        <li class="nav-item w3-bar-item w3-button w3-padding"  >
          <a id="navtitle" class="nav-link "  href="{{route('studentcertificates',$stid)}}" >الشهادات</a>
        </li>
        <li class="w3-bar-item w3-button w3-padding"  >
          <a id="navdisc" class="nav-link disabled" href="{{route('getdiscussion',$stid)}}" aria-disabled="true">السكن</a>
        </li>
        <li class="w3-bar-item w3-button w3-padding" >
          <a id="navres" class="nav-link disabled " href="{{route('getsresearches',$stid)}}" aria-disabled="true">الوظائف</a>
        </li>
        <li class="w3-bar-item w3-button w3-padding">
          <a id="navskil" class="nav-link disabled " href="{{route('getskills',$stid)}}" aria-disabled="true">تطوير المهارات</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="w3-row-padding w3-margin-bottom">

  <div class="w3-container"  >
      
      <ul class="w3-ul cardmain w3-white">
        @yield('content2')

         


      </ul>
    </div>
  </div>
  @endsection
