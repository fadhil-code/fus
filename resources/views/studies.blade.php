@extends('layoutMAIN')
@section('title','الدراسات')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>الدراسات</h5>
      <ul class="w3-ul cardmain w3-white">
          <form action="{{route('studies.post')}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="الدراسة"  class="inputlog-field" name="studyname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم الدراسة</label>
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
                    <h5> الدراسات</h5>
                    <hr>

                     </center>
                     <form class="form-inline" action="{{route('index_filtering_studies')}}" method="GET">
                      <div class="w3-half">
                          <input type="text" placeholder="اسم الدراسة ..."  class="w3-input w3-border "  id="filter" name="filter" value="{{$filter}}" >
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
                        <th scope="col">@sortablelink('studyname','الدراسة') </th>
                        <th scope="col"></th>
          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($studies as $studie)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $studie['id'] }}</td>
                        <td scope="row">{{$studie['studyname']}}</td>
                        <td>
                          <a href="{{route('delete_studies.post',$studie->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>

                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $studies->links("pagination::bootstrap-4") !!}
            </div>
          </div>   
      </ul>
    </div>
  </div>
  @endsection
