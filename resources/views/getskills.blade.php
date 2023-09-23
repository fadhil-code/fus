@extends('layoutststate')
@section('title','تطوير المهارات')
@section('content2')
<div id="skillsdiv" >
  @if ($rsid)
            <form action="{{route('skills',$rsid)}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="عنوان المهارة"  class="inputlog-field" name="skname" id="skname">
              <label for="inputlog-field" class="inputlog-label">ادخل عنوان المهارة</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
            <input placeholder="الدرجة" type="number" class="inputlog-field" name="points" id="points">
            <label for="inputlog-field" class="inputlog-label">ادخل درجة المهارة</label>
            <span class="inputlog-highlight"></span>
            </div>
        </div>
          <div class="mb-3">
            <div class="inputlog-container">
            <input placeholder="تاريخ المهارة"  class="inputlog-field" name="skdate" id="skdate" type="date">
            <label for="inputlog-field" class="inputlog-label">ادخل تاريخ المهارة</label>
            <span class="inputlog-highlight"></span>
            </div>
        </div>
        <div class="mb-3">
          <div class="inputlog-container">
          <input placeholder="الملاحظات"  class="inputlog-field" name="sknotes" id="sknotes">
          <label for="inputlog-field" class="inputlog-label">ادخل الملاحظات</label>
          <span class="inputlog-highlight"></span>
          </div>
      </div>
          <center>
            <button type="submit" class="mybutton mybutton1"> اضافة </button>
           </center>
                </form>
                <div class="tabelcard w3-animate-bottom" style="overflow-x:auto;">
                  <center>
                    <br>
                    <h5> المهارات</h5>
                    <hr>
                     </center>
                  <table class="mytable">
                  <thead>
                      <tr>
                        <th scope="col">ت</th>
                        <th scope="col">@sortablelink('skname','العنوان')</th>
                        <th scope="col">@sortablelink('skdate','التاريخ')</th>
                        <th scope="col">@sortablelink('points','الدرجة')</th>
                        <th scope="col">@sortablelink('sknotes','الملاحظات')</th>
                        <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($skills as $skill)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
          
                        <td scope="row">{{$skill['skname']}}</td>
                        <td scope="row">{{$skill['skdate']}}</td>
                        <td scope="row">{{$skill['points']}}</td>
                        <td scope="row">{{$skill['sknotes']}}</td>

                        <td>
                <a href="{{route('delete_skills.post',$skill->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>
          
                        </td>
                      </tr>
                      
                  @endforeach
                </tbody>
              </table>

          </div>  
  @endif
</div> 
<script type="text/javascript">
window.onload = function() {
  activenav('navskil',['navstate','navdisc','navtitle','navres']);
  activemainnav('depstudentsnav');

};

</script>

@endsection
