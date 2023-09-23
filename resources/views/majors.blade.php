@extends('layoutMAIN')
@section('title','التخصصات')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>التخصصات</h5>
      <ul class="w3-ul cardmain w3-white">
        <form action="{{route('majors.post')}}" method="POST" class="" >
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
              <select  id="stdid" name="stdid" class="inputlog-field ">
                @foreach($studies as $studie)
              <option value="{{$studie['id']}}">{{$studie['studyname']}}</option>
            @endforeach
              </select>
              <label for="inputlog-field" class="inputlog-label">اختر الدراسة</label>
              </div>
              </div>

          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="التخصص العام"  class="inputlog-field" name="mname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم التخصص العام</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="التخصص الدقيق"  class="inputlog-field" name="mname2">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم التخصص الدقيق</label>
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
            <h5> التخصصات</h5>
            <hr>

             </center>
             <form class="form-inline" action="{{route('index_filtering_majors')}}" method="GET">
              <div class="w3-half">
                  <input type="text" placeholder="اسم التخصص ..."  class="w3-input w3-border "  id="filter" name="filter" value="{{$filter}}" >
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
                        <th scope="col">@sortablelink('mname','التخصص العام')</th>
                        <th scope="col">@sortablelink('mname2','التخصص الدقيق')</th>
                        <th scope="col">الجامعة</th>
                        <th scope="col">القسم</th>
                        <th scope="col">@sortablelink('studies.studyname','الدراسة')</th>
                      <th scope="col"></th>
          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($allmajors as $major)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $major['id'] }}</td>
                        <td scope="row">{{$major['mname']}}</td>
                        <td>
                                {{$major['mname2']}}
                        </td>
                        <td>
                          {{$major->departments->universities->uname}}
                       </td>
                        <td>
                                {{$major->departments->dname}}
                        </td>
                        <td>
                          {{$major->studies->studyname}}
                  </td>
                        <td>
                          <a href="{{route('delete_majors.post',$major->id)}}" class=" w3-btn" ><i class="fa fa-trash-o" style="font-size:20px;color:rgb(203, 39, 39);"></i></a>

                        </td>
                      </tr>
                      
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $allmajors->links("pagination::bootstrap-4") !!}
            </div>
          </div>   
      </ul>
    </div>
  </div>
  @endsection
