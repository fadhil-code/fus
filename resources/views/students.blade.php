@extends('layoutMAIN')
@section('title','الطلاب')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>الطلاب</h5>
      <ul class="w3-ul cardmain w3-white">
        <form action="{{route('students.post')}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="اسم الطالب"  class="inputlog-field" name="stname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم الطالب</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="did" name="did" class="form-select ">
              @foreach($departments as $department)
              <option value="{{$department['id']}}">{{$department['dname']}}</option>
            @endforeach

              </select>
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
                      <th scope="col">سام الطالب</th>
                      <th scope="col">القسم</th>
                      <th scope="col"></th>
          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($students as $student)
                      <tr>
                        <th scope="row">{{$student['stname']}}</th>

                        <td>
                                {{$student->departments->dname}}
                        </td>

                        <td>
                          <a href="{{route('delete_students.post',$student->id)}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  حذف</a>
                          <a href="{{route('studentstudy',$student->id)}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  اضافة دراسة</a>


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
