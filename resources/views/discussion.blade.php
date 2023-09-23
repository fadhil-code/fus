@extends('layoutststate')
@section('title','مناقشة الطالب')
@section('content2')
<div id="discdiv" >

    <form action="{{route('discussionpost',[$rsid,$dicid])}}" method="POST" class="" >
      @csrf
      <h6>تاريخ المناقشة </h6>

      <div class="mb-3">
        <div class="inputlog-container">
        <input placeholder="تاريخ تسليم البحث"  class="inputlog-field" name="dicdate" id="dicdate" type="date" value="{{$dicdate}}">
        <label for="inputlog-field" class="inputlog-label">ادخل تاريخ المناقشة</label>
        <span class="inputlog-highlight"></span>
        </div>
        <div class="mb-3">
          <div class="inputlog-container">
            <select  id="edits" name="edits" class="inputlog-field">
              <option value="0">اختر</option>
              <option value="1">نعم</option>
              <option value="2">كلا</option>
              </select>
          <label for="inputlog-field" class="inputlog-label">هل توجد تعديلات</label>
          <span class="inputlog-highlight"></span>
          </div>
    </div>
    <script type="text/javascript">
      var test = "<?= $edits ?>";
      if (test != '' && parseInt(test)) {
          document.getElementById('edits').selectedIndex = test;
      }
  </script>
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="editdone" name="editdone" class="inputlog-field">
                <option value="0">اختر</option>
                <option value="1">نعم</option>
                <option value="2">كلا</option>
                </select>
            <label for="inputlog-field" class="inputlog-label">هل تم تسليم التعديلات؟</label>
            <span class="inputlog-highlight"></span>
            </div>
      </div>
      <script type="text/javascript">
        var test = "<?= $editdone ?>";
        if (test != '' && parseInt(test)) {
            document.getElementById('editdone').selectedIndex = test;
        }
    </script>

        <button type="submit" class=" tablebutton mybutton1"> حفظ </button>
        <hr>
    </form>

   
  </div>


<script type="text/javascript">
  window.onload = function() {
    activenav('navdisc',['navtitle','navstate','navskil','navres']);
    activemainnav('depstudentsnav');


  };
  
  </script>

@endsection
