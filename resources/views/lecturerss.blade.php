@extends('layoutMAIN')
@section('title','التدريسيين')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>التدريسيين</h5>
      <ul class="w3-ul cardmain w3-white">
        <form action="{{route('lecturerss.post')}}" method="POST" class="" enctype="multipart/form-data" >
          @csrf
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="unid" name="unid" class="inputlog-field ">
                <option value="">اختر الجامعة</option>
                @foreach($universities as $universitie)
              <option value="{{$universitie['id']}}">{{$universitie['uname']}}</option>
            @endforeach
              </select>
              <label for="inputlog-field" class="inputlog-label">اختر الجامعة</label>
          </div>
        </div>
        <div class="mb-3">
          <div class="inputlog-container">
            <select  id="did" name="did" class="inputlog-field ">
            </select>
            <label for="inputlog-field" class="inputlog-label">اختر القسم</label>
            </div>
            </div>
        <script type="text/javascript">
          $(document).ready(function () {
              $('#unid').on('change', function () {
                  var unid = this.value;
                  $('#did').html('');
                  $.ajax({
                      url: '{{ route('deps') }}?unid='+unid,
                      type: 'get',
                      success: function (res) {
                          $('#did').html('<option value="">اختر القسم</option>');
                          $.each(res, function (key, value) {
                              $('#did').append('<option value="' + value
                                  .id + '">' + value.dname + '</option>');
                          });
                      }
                  });
              });
      
          });
      </script>
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
        <div class="tabelcard " style="overflow-x:auto;">
          <center>
            <br>
            <h5> التدريسيين</h5>
            <hr>

             </center>
             <form class="form-inline" action="{{route('index_filtering_lecturerss')}}" method="GET">
              <div class="w3-half">
                  <input type="text" placeholder="اسم التدريسي ..."  class="w3-input w3-border "  id="filter" name="filter" value="{{$filter}}" >
              </div>
              
              <div class="w3-half">
                <button type="submit" class="mybutton mybutton2">بحث</button>
            </div>
          </form>
          <table class="mytable">
                  <thead>
                      <tr>
                        <th scope="col">ت</th>
                        <th scope="col">@sortablelink('id','id')</th>
                        <th scope="col">@sortablelink('lecname','الاسم')</th>
                        <th scope="col">الجامعة</th>
                        <th scope="col">القسم</th>
                      <th scope="col"></th>
          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($lecturerss as $lecturers)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $lecturers['id'] }}</td>
                        <td scope="row">{{$lecturers['lecname']}}</td>
                        <td>
                          {{$lecturers->departments->universities->uname}}
                        </td>
                        <td>
                                {{$lecturers->departments->dname}}
                        </td>
                        <td>
                          <a href="{{route('delete_lecturerss.post',$lecturers->id)}}" class=" w3-btn" ><i class="fa fa-trash-o" style="font-size:20px;color:rgb(203, 39, 39);"></i></a>
                        </td>
                      </tr>
                      
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $lecturerss->links("pagination::bootstrap-4") !!}
            </div>
          </div>   
      </ul>
    </div>
  </div>
  @endsection
