@extends('layoutstudentDetalies')
@section('title','معلومات الطالب')
@section('content2')
<div id="navdisc" >
  <form action="{{route('studentMainDetPost',$stid)}}" method="POST" class="" enctype="multipart/form-data" >
    @csrf
    <select  id="sex" name="sex" class="form-select ">
      <option value="0">ذكر</option>
      <option value="1">انثى</option>
      </select>
      <br>
      <div class="mb-3">
        <div class="inputlog-container">
        <input placeholder="تاريخ التولد"  class="inputlog-field" name="bd" id="bd" type="date" value="{{$bd}}">
        <label for="inputlog-field" class="inputlog-label">ادخل تاريخ التولد</label>
        <span class="inputlog-highlight"></span>
        </div>
    </div>
    <div class="mb-3">
      <i class="fa fa-briefcase icon"></i>
     <label  class="form-label">الصورة</label>
     <input type="file" class="form-control" name="photo" id="photo" onchange="readURL(event);" accept="image/jpg, image/jpeg, image/png">
     
     <img id="output" src="{{ asset('storage/sts/'.$photo)}}" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
      
 </div>
      <button type="submit" class=" tablebutton mybutton1"> حفظ </button>
      <hr>
  </form>
      <script type="text/javascript">
        var test = "<?= $sex ?>";
        if (test != '' && parseInt(test)) {
            document.getElementById('sex').selectedIndex = test;
        }
    </script>


  </div>


<script type="text/javascript">
  window.onload = function() {
    activenav('navstate',['navtitle','navdisc','navskil','navres']);
    activemainnav('depstudentsnav');

  };
  
</script>

@endsection
