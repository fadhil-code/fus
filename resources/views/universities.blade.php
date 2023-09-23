@extends('layoutMAIN')
@section('title','Universities')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>الجامعات</h5>
      <ul class="w3-ul cardmain w3-white">
          <form action="{{route('universities.post')}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="الجامعة"  class="inputlog-field" name="uname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم الجامعة</label>
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
                    <h5> الجامعات</h5>
                    <hr>

                     </center>

                  <form class="form-inline" action="{{route('index_filtering')}}" method="GET">
                    <div class="w3-half">
                        <input type="text" placeholder="اسم الجامعة ..."  class="w3-input w3-border "  id="filter" name="filter" value="{{$filter}}" >
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
                        <th scope="col">@sortablelink('uname','الجامعة') </th>
                        <th scope="col"></th>
          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($universities as $universitie)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $universitie['id'] }}</td>
                        <td scope="row">{{$universitie['uname']}}</td>
                        <td>
                          <a href="{{route('delete_universities.post',$universitie->id)}}" class=" w3-btn" ><i class="fa fa-trash-o" style="font-size:20px;color:rgb(203, 39, 39);"></i></a>

                      </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="d-flex justify-content-center">
                {!! $universities->links("pagination::bootstrap-4") !!}
            </div>
          </div> 
          

      </ul>
    </div>
  </div>
  @endsection
