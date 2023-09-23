@extends('layoutMAIN')
@section('title','الاقسام')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>الاقسام</h5>
      <ul class="w3-ul cardmain w3-white">
          <form action="{{route('departments.post')}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="القسم"  class="inputlog-field" name="dname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم القسم</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
         
              <center>
                <button type="submit" class="mybutton mybutton1"> اضافة </button>
               </center>
                </form>
          @livewire('livedepartments', ['unid'=>auth()->user()->unid])

 
        </ul>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('departmentsnav');
    };
    </script>
  @endsection
