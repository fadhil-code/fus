@extends('layoutMAIN')
@section('title','المواد الدراسية')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>المواد الدراسية</h5>
      <ul class="w3-ul cardmain w3-white">
        <form action="{{route('subjects.post')}}" method="POST" class="" >
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
              <select  id="spid" name="spid" class="inputlog-field ">
              </select>
              <label for="inputlog-field" class="inputlog-label">اختر التخصص</label>
              </div>
              </div>
              <script type="text/javascript">
                $(document).ready(function () {
                    $('#did').on('change', function () {
                        var did = this.value;
                        $('#spid').html('');
                        $.ajax({
                            url: '{{ route('majs') }}?did='+did,
                            type: 'get',
                            success: function (res) {
                                $('#spid').html('<option value="">اختر التخصص</option>');
                                $.each(res, function (key, value) {
                                    $('#spid').append('<option value="' + value
                                        .id + '">' + value.mname +' ' + value.mname2 + '</option>');
                                });
                            }
                        });
                    });
            
                });
            </script>
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="المادة"  class="inputlog-field" name="subname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم المادة</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
            <input placeholder="الوحدات"  class="inputlog-field" name="units">
            <label for="inputlog-field" class="inputlog-label">ادخل عدد الوحدات</label>
            <span class="inputlog-highlight"></span>
            </div>
        </div>

         
        <center>
          <button type="submit" class="mybutton mybutton1"> اضافة </button>
         </center>
                </form>
                <div class="tabelcard " style="overflow-x:auto;">
                  <center>
                    <br>
                    <h5> المواد الدراسية</h5>
                    <hr>
        
                     </center>
                     <form class="form-inline" action="{{route('index_filtering_subjects')}}" method="GET">
                      <div class="w3-half">
                          <input type="text" placeholder="اسم المادة ..."  class="w3-input w3-border "  id="filter" name="filter" value="{{$filter}}" >
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
                        <th scope="col">@sortablelink('subname','المادة')</th>
                        <th scope="col">الجامعة</th>
                        <th scope="col">القسم</th>
                        <th scope="col">الدراسة</th>
                        <th scope="col">@sortablelink('allmajors.mname','التخصص العام')</th>
                        <th scope="col">@sortablelink('allmajors.mname2','التخصص الدقيق')</th>
                        <th scope="col"></th>
          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($subjects as $subject)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $subject->id }}</td>
                        <td scope="row">{{$subject['subname']}}</td>
                        <td>
                          {{$subject->uname}}
                  </td>
                        <td>
                          {{$subject->dname}}
                  </td>
                  <td>
                    {{$subject->studyname}}
            </td>
                        <td>
                                {{$subject->mname}}
                        </td>
                        <td>
                          {{$subject->mname2}}
                  </td>
                        <td>
                          <a href="{{route('delete_subjects.post',$subject->id)}}" class=" w3-btn" ><i class="fa fa-trash-o" style="font-size:20px;color:rgb(203, 39, 39);"></i></a>
                        </td>
                      </tr>
                      
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $subjects->links("pagination::bootstrap-4") !!}
            </div>
          </div>   
      </ul>
    </div>
  </div>
  @endsection
