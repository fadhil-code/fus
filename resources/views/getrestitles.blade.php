@extends('layoutststate')
@section('title','عنوان الرسالة')
@section('content2')
<div id="titlediv" >
  @if ($rsid)
            <form action="{{route('restitles',$rsid)}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="عنوان الارسالة او الاطروحة"  class="inputlog-field" name="stitle" id="stitle">
              <label for="inputlog-field" class="inputlog-label">ادخل عنوان الرسالة او الاطروحة</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
            <input placeholder="تاريخ تسليم تحديد العنوان"  class="inputlog-field" name="titledate" id="titledate" type="date">
            <label for="inputlog-field" class="inputlog-label">ادخل تاريخ تحديد العنوان</label>
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
                    <h5> العناوين</h5>
                    <hr>
                     </center>
                  <table class="mytable">
                  <thead>
                      <tr>
                        <th scope="col">ت</th>
                        <th scope="col">@sortablelink('stitle','العنوان')</th>
                        <th scope="col">@sortablelink('titledate','التاريخ')</th>
                        <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($restitles as $restitle)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
          
                        <td scope="row">{{$restitle['stitle']}}</td>
                        <td scope="row">{{$restitle['titledate']}}</td>

                        <td>
                <a href="{{route('delete_restitles.post',$restitle->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>
          
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
  activenav('navtitle',['navstate','navdisc','navskil','navres']);
  activemainnav('depstudentsnav');

};

</script>

@endsection
