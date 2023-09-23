@extends('layoutMAIN')
@section('title','التخصصات')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>التخصصات</h5>
      <ul class="w3-ul cardmain w3-white">
        <form action="{{route('depmajors.post')}}" method="POST" class="" >
          @csrf

          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="stdid" name="stdid" class="inputlog-field ">
                @foreach($studies as $studie)
              <option value="{{$studie['id']}}">{{$studie['studyname']}}</option>
            @endforeach
              </select>
              <label for="inputlog-field" class="inputlog-label">اختر الدراسة</label>
              </div>
              </div>

          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="التخصص العام"  class="inputlog-field" name="mname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم التخصص العام</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="التخصص الدقيق"  class="inputlog-field" name="mname2">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم التخصص الدقيق</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <center>
            <button type="submit" class="mybutton mybutton1"> اضافة </button>
           </center>
        </form>
        @livewire('majs', ['did'=>auth()->user()->did])

  
      </ul>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('depmajorsnav');
    };
    </script>
  @endsection
