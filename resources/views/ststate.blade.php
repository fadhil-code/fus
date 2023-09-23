@extends('layoutststate')
@section('title','مرحلة الطالب')
@section('content2')
<div id="navdisc" >
  <form action="{{route('state_studentstudy',$ststudyid)}}" method="POST" class="" >
    @csrf
    <select  id="state" name="state" class="form-select ">
      <option value="0">التحضيري</option>
      <option value="1">البحث</option>
      </select>
      <br>
      <button type="submit" class=" tablebutton mybutton1"> حفظ </button>
      <hr>
  </form>
      <script type="text/javascript">
        var test = "<?= $state ?>";
        if (test != '' && parseInt(test)) {
            document.getElementById('state').selectedIndex = test;
        }
    </script>
    @if ($state=='1')

    <form action="{{route('resyear',$ststudyid)}}" method="POST" class="" >
      @csrf
      <h6>تاريخ تسليم البحث</h6>

      <div class="mb-3">
        <div class="inputlog-container">
        <input placeholder="تاريخ تسليم البحث"  class="inputlog-field" name="syeardate" id="syeardate" type="date">
        <label for="inputlog-field" class="inputlog-label">ادخل تاريخ تسليم البحث</label>
        <span class="inputlog-highlight"></span>
        </div>
    </div>
        <button type="submit" class=" tablebutton mybutton1"> حفظ </button>
        <hr>
    </form>
    <script type="text/javascript">
      var test = "<?= $syeardate ?>";
      if (test != '' ) {
          document.getElementById('syeardate').value = test;
      }
  </script>
    @endif
  </div>


<script type="text/javascript">
  window.onload = function() {
    activenav('navstate',['navtitle','navdisc','navskil','navres']);
    activemainnav('depstudentsnav');

  };
  
</script>

@endsection
