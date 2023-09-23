@extends('layoutststate')
@section('title','البحوث')
@section('content2')
<div id="researchesdiv" >
  @if ($rsid)
            <form action="{{route('researches',$rsid)}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="عنوان البحث"  class="inputlog-field" name="rtitle" id="rtitle">
              <label for="inputlog-field" class="inputlog-label">ادخل عنوان البحث</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="rtstae" name="rtstae" class="inputlog-field">
                <option value="0">اختر</option>
                <option value="1">منشور</option>
                <option value="2">مقبول للنشر</option>
                </select>
            <label for="inputlog-field" class="inputlog-label">حالة البحث</label>
            <span class="inputlog-highlight"></span>
            </div>
      </div>
      <div class="mb-3">
        <div class="inputlog-container">
          <select  id="etemad" name="etemad" class="inputlog-field">
            <option value="0">اختر</option>
            <option value="1">نعم</option>
            <option value="2">كلا</option>
            </select>
        <label for="inputlog-field" class="inputlog-label">هل تم الحصول على الاعتمادية؟</label>
        <span class="inputlog-highlight"></span>
        </div>
  </div>
  <div class="mb-3">
    <div class="inputlog-container">
    <input placeholder="تاريخ التقديم"  class="inputlog-field" name="uploadhdate" id="uploadhdate" type="date">
    <label for="inputlog-field" class="inputlog-label">ادخل تاريخ التقديم</label>
    <span class="inputlog-highlight"></span>
    </div>
</div>
          <div class="mb-3">
            <div class="inputlog-container">
            <input placeholder="تاريخ النشر"  class="inputlog-field" name="publishdate" id="publishdate" type="date">
            <label for="inputlog-field" class="inputlog-label">ادخل تاريخ النشر</label>
            <span class="inputlog-highlight"></span>
            </div>
        </div>

        <div class="tabelcard w3-animate-bottom" style="overflow-x:auto;">
             <select class="form-control" id="super" name="super[]"  multiple>
              @foreach($supervisors1 as $supervisor)
                     <option value="{{$supervisor->id}}">{{$supervisor->lecturerss->lecname}}</option>
              @endforeach
       </select>
       <script>
        $(document).ready(function () {
            $("#super").CreateMultiCheckBox({  defaultText : 'اختر الباحثين' });
        });
    </script>
  </div> 
          <center>
            <button type="submit" class="mybutton mybutton1"> اضافة </button>
           </center>
                </form>
                <div class="tabelcard w3-animate-bottom" style="overflow-x:auto;">
                  <center>
                    <br>
                    <h5> البحوث</h5>
                    <hr>
                     </center>
                  <table class="mytable">
                  <thead>
                      <tr>
                        <th scope="col">ت</th>
                        <th scope="col">@sortablelink('rtitle','العنوان')</th>
                        <th scope="col">@sortablelink('rtstae','الحالة')</th>
                        <th scope="col">@sortablelink('etemad','الاعتمادية')</th>
                        <th scope="col">@sortablelink('uploadhdate','تاريخ التقديم')</th>
                        <th scope="col">@sortablelink('publishdate','تاريخ النشر')</th>
                        <th scope="col">المشرفين</th>
                        <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($researches as $researche)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
          
                        <td scope="row">{{$researche['rtitle']}}</td>
                        <td scope="row">
                          @if($researche['rtstae']==1)
                          منشور
                          @else
                          مقبول للنشر
                          @endif
                        </td>
                        <td scope="row">
                          @if($researche['etemad']==1)
                          معتمد
                          @else
                          غير معتمد
                          @endif
                        </td>
                        <td scope="row">{{$researche['uploadhdate']}}</td>
                        <td scope="row">{{$researche['publishdate']}}</td>
                        <td scope="row">
                          @foreach($researche->superresearches as $superresearche)
                          {{$superresearche->supervisors->lecturerss->lecname}} ,
                           @endforeach
                        </td>

                        <td>
                <a href="{{route('delete_researches.post',$researche->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>
          
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
  activenav('navres',['navstate','navdisc','navtitle','navskil']);
  activemainnav('depstudentsnav');

};

</script>

@endsection
