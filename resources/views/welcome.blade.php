@extends('layoutMAIN')
@section('title','FUS seystem')



@section('content')

<div class="w3-center">
  <div class="w3-row-padding" style="margin:0 -16px">
    <div >
      <img src="{{ asset('storage/images/fuslogo.png')}}" style="width:25%" >
    </div>

  </div>
  <h2>FUS System</h2>

</div>

<hr>

<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-quarter">
    <div class="w3-container w3-text-white w3-padding-16" style="background-color: #111a3a;">
      <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
      <div class="w3-right">
        <h3>{{$users}}</h3>
      </div>
      <div class="w3-clear"></div>
      <h4>المستخدمين</h4>
    </div>
  </div>
  <div class="w3-quarter">
    <div class="w3-container w3-text-white w3-padding-16" style="background-color: #222d57;">
      <div class="w3-left"><i class="fa fa-bank w3-xxxlarge"></i></div>
      <div class="w3-right">
        <h3>{{$universities}}</h3>
      </div>
      <div class="w3-clear"></div>
      <h4>الجامعات</h4>
    </div>
  </div>
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16" style="background-color: #262f4f;">
        <div class="w3-left"><i class="fa fa-home w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$departments}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>الاقسام</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16" style="background-color: #2b3c75;">

        <div class="w3-left"><i class="fa fa-graduation-cap w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$students}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>الطلاب</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16" style="background-color: #2943a2;">

        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$subjects}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>المواد الدراسية</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16" style="background-color: #0f2780;">

        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$lecturerss}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>التدريسيين</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-text-white w3-padding-16" style="background-color: #0c163e;">

        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$researches}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>البحوث</h4>
      </div>
    </div>
  </div>




 
 
  
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('main');
    };
    </script>
@endsection