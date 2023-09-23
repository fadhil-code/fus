@extends('layoutMAIN')
@section('title','حالة الطالب')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>حالة الطالب {{$stname}}</h5>
      <ul class="w3-ul cardmain w3-white">
              <form action="{{route('position_studentstudy',$ststudyid)}}" method="POST" class="" >
                @csrf
                <select  id="position" name="position" class="form-select ">
                  <option value="0">مستمر</option>
                  <option value="1">ناجح</option>
                  <option value="2">راسب</option>
                  <option value="3">ترقين</option>
                  </select>
                  <button type="submit" class="tablebutton mybutton1"> حفظ </button>
              </form>
                  <script type="text/javascript">
                    var test = "<?= $position ?>";
                    if (test != '' && parseInt(test)) {
                        document.getElementById('position').selectedIndex = test;
                    }
                </script>
      </ul>
    </div>
  </div>
  @endsection
