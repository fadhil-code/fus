@extends('layoutMAIN')
@section('title','دراسة الطالب')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>دراسة الطالب</h5>
      <ul class="w3-ul cardmain w3-white">
          <form action="{{route('depstudentstudy.post',$stid)}}" method="POST" class="" >
              @csrf
              الطالب {{$stname}}
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="spid" name="spid" class="form-select ">
              @foreach($allmajors as $allmajor)
              <option value="{{$allmajor['id']}}">{{$allmajor->departments->dname}} {{$allmajor->studies->studyname}} {{$allmajor['mname']}} {{$allmajor['mname2']}}</option>
            @endforeach

              </select>
              </div>
              </div>
              <div class="mb-3">
                <div class="inputlog-container">
                  <select  id="chid" name="chid" class="form-select ">
                  @foreach($channels as $channel)
                  <option value="{{$channel['id']}}">{{$channel->chname}}</option>
                @endforeach
    
                  </select>
                  </div>
                  </div>
                  <div class="mb-3">
                    <div class="inputlog-container">
                    <input placeholder="تاريخ المباشرة"  class="inputlog-field" name="mobashara" type="date">
                    <label for="inputlog-field" class="inputlog-label">ادخل تاريخ المباشرة</label>
                    <span class="inputlog-highlight"></span>
                    </div>
                </div>
                <center>
                  <button type="submit" class="mybutton mybutton1"> اضافة </button>
                 </center>
                </form>

          @livewire('livststudy', ['stid'=>$stid,'stname'=>$stname])

      </ul>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('depstudentsnav');
    };
    </script>
  @endsection
