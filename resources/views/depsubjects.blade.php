@extends('layoutMAIN')
@section('title','المواد الدراسية')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>المواد الدراسية</h5>
      <ul class="w3-ul cardmain w3-white">
        <form action="{{route('depsubjects.post')}}" method="POST" class="" >
          @csrf


          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="spid" name="spid" class="inputlog-field ">
                @foreach($allmajors as $allmajor)
                <option value="{{$allmajor['id']}}">{{$allmajor->studies->studyname}} {{$allmajor['mname']}} {{$allmajor['mname2']}}</option>
              @endforeach
              </select>
              <label for="inputlog-field" class="inputlog-label">اختر التخصص</label>
              </div>
              </div>
              
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="المادة"  class="inputlog-field" name="subname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم المادة</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
            <input  type="number" placeholder="الوحدات"  class="inputlog-field" name="units">
            <label for="inputlog-field" class="inputlog-label">ادخل عدد الوحدات</label>
            <span class="inputlog-highlight"></span>
            </div>
        </div>

         
        <center>
          <button type="submit" class="mybutton mybutton1"> اضافة </button>
         </center>
                </form>
                
        @livewire('subjs', ['did'=>auth()->user()->did])

      </ul>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('depsubjectsnav');
    };
    </script>
  @endsection
