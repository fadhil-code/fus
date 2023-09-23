@extends('layoutMAIN')
@section('title','دراسة الطالب')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>دراسة الطالب</h5>
      <ul class="w3-ul cardmain w3-white">
          <form action="{{route('studentstudy.post',$stid)}}" method="POST" class="" >
              @csrf
              @foreach($students as $student)
              الطالب {{$student['stname']}}
              @endforeach
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="spid" name="spid" class="form-select ">
              @foreach($allmajors as $allmajor)
              <option value="{{$allmajor['id']}}">{{$allmajor->departments->dname}} {{$allmajor->studies->studyname}} {{$allmajor['mname']}} {{$allmajor['mname2']}}</option>
            @endforeach

              </select>
              </div>
              </div>
              <div class="mb-3">
                <div class="inputlog-container">
                  <select  id="chid" name="chid" class="form-select ">
                  @foreach($channels as $channel)
                  <option value="{{$channel['id']}}">{{$channel->chname}}</option>
                @endforeach
    
                  </select>
                  </div>
                  </div>
                  <div class="mb-3">
                    <div class="inputlog-container">
                    <input placeholder="تاريخ المباشرة"  class="inputlog-field" name="mobashara" type="date">
                    <label for="inputlog-field" class="inputlog-label">ادخل تاريخ المباشرة</label>
                    <span class="inputlog-highlight"></span>
                    </div>
                </div>
          <button type="submit" class="contactButton"> اضافة
              <div class="iconButton">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
          </div>
              </button>
                </form>
                <div class="mb-3" style="overflow-x:auto;">
                  <table class="table table-bordered">
                  <thead>
                      <tr>
                        <th scope="col">الاسم</th>
                        <th scope="col">القسم</th>
                        <th scope="col">الدراسة</th>
                        <th scope="col">التخصص العام</th>
                        <th scope="col">التخصص الدقيق</th>
                        <th scope="col">تاريخ المباشرة</th>
                        <th scope="col">المرحلة</th>
                        <th scope="col">الحالة</th>
                        <th scope="col"></th>
          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($studentstudy as $studentstud)
                      <tr>
                        <th scope="row">{{$studentstud->students->stname}}</th>

                        <td>
                          {{$studentstud->allmajors->departments->dname}}
                  </td>
                  <td>
                    {{$studentstud->allmajors->studies->studyname}}
                 </td>
                  <td>
                                {{$studentstud->allmajors->mname}}
                        </td>
                        <td>
                          {{$studentstud->allmajors->mname2}}
                  </td>

                  <td>
                    {{$studentstud['mobashara']}}
            </td>

                  <td>
                    <form action="{{route('state_studentstudy',$studentstud->id)}}" method="POST" class="" >
                      @csrf
                      <select  id="state" name="state" class="form-select ">
                        <option value="0">التحضيري</option>
                        <option value="1">البحث</option>
                        </select>
                        <button type="submit" class="buttondelete"> حفظ </button>
                    </form>
                        <script type="text/javascript">
                          var test = "<?= $studentstud['state'] ?>";
                          if (test != '' && parseInt(test)) {
                              document.getElementById('state').selectedIndex = test;
                          }
                      </script>
                      @if ($studentstud['state']=='1')
                      <a href="{{route('delete_studentstudy.post',$studentstud->id)}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>المعلومات</a>
                      
                      @endif
                  </td>
                  <td>
                    <form action="{{route('position_studentstudy',$studentstud->id)}}" method="POST" class="" >
                      @csrf
                      <select  id="position" name="position" class="form-select ">
                        <option value="0">مستمر</option>
                        <option value="1">نجاح</option>
                        <option value="2">رسوب</option>
                        <option value="3">ترقين</option>
                        </select>
                        <button type="submit" class="buttondelete"> حفظ </button>
                    </form>
                        <script type="text/javascript">
                          var test = "<?= $studentstud['position'] ?>";
                          if (test != '' && parseInt(test)) {
                              document.getElementById('position').selectedIndex = test;
                          }
                      </script>
                  </td>

                        <td>

                          <a href="{{route('delete_studentstudy.post',$studentstud->id)}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  حذف</a>
                          <a href="{{route('supervisors',$studentstud->id)}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  اضافة مشرف</a>
                        </td>
                      </tr>
                      
                  @endforeach
                </tbody>
              </table>
          </div>   
      </ul>
    </div>
  </div>
  @endsection
