@extends('layoutMAIN')
@section('title','المشرفين')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>المشرفين</h5>
      <ul class="w3-ul cardmain w3-white">
          <form action="{{route('supervisors.post',$ststudyid)}}" method="POST" class="" >
              @csrf
              @foreach($studentstudy as $studentstud)
              الطالب {{$studentstud->students->stname}}
              @endforeach
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="lecid" name="lecid" class="form-select ">
              @foreach($lecturerss as $lecturers)
              <option value="{{$lecturers['id']}}">{{$lecturers->lecname}} </option>
            @endforeach

              </select>
              </div>
              </div>

                  <div class="mb-3">
                    <div class="inputlog-container">
                    <input placeholder="تاريخ الاشراف"  class="inputlog-field" name="supdate" type="date">
                    <label for="inputlog-field" class="inputlog-label">ادخل تاريخ الاشراف</label>
                    <span class="inputlog-highlight"></span>
                    </div>
                </div>
                <center>
                  <button type="submit" class="mybutton mybutton1"> اضافة </button>
                 </center>
                </form>

        @livewire('supers', ['ststudyid'=>$ststudyid])

      </ul>
    </div>
  </div>
  @endsection
