@extends('layoutMAIN')
@section('title','الطلاب')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>الطلاب</h5>
      <ul class="w3-ul cardmain w3-white">
        <form action="{{route('depstudents.post')}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="اسم الطالب"  class="inputlog-field" name="stname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم الطالب</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
         
          <center>
            <button type="submit" class="mybutton mybutton1"> اضافة </button>
           </center>
        </form>
  
          @livewire('livstudents', ['did'=>auth()->user()->did])
      </ul>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('depstudentsnav');
    };
    </script>
  @endsection
