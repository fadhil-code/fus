@extends('layoutMAIN')
@section('title','التدريسيين')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>التدريسيين</h5>
      <ul class="w3-ul cardmain w3-white">
        <form action="{{route('deplecturerss.post')}}" method="POST" class="" enctype="multipart/form-data" >
          @csrf

          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="اسم التدريسي"  class="inputlog-field" name="lecname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم التدريسي</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>

          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="leclakab" name="leclakab" class="form-select ">
                <option value="مدرس مساعد">مدرس مساعد</option>
                <option value="مدرس">مدرس</option>
                <option value="استاذ">استاذ</option>
                <option value="مدرس دكتور">مدرس دكتور</option>
                <option value="استاذ مساعد دكتور">استاذ مساعد دكتور</option>
                <option value="استاذ دكتور">استاذ دكتور</option>

              </select>
              </div>
          </div>
          <div class="mb-3">
            <i class="fa fa-briefcase icon"></i>
           <label  class="form-label">الصورة</label>
           <input type="file" class="form-control" name="photo" id="photo" onchange="readURL(event);" accept="image/jpg, image/jpeg, image/png">
           
           <img id="output" src="{{ asset('storage/images/1.jpg')}}" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
            
       </div>
       <center>
        <button type="submit" class="mybutton mybutton1"> اضافة </button>
       </center>
        </form>
          @livewire('lecs', ['did'=>auth()->user()->did])
         </ul>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('deplecturerssnav');
    };
    </script>
  @endsection
