@extends('layoutMAIN')
@section('title','قنوات القبول')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>قنوات القبول</h5>
      <ul class="w3-ul cardmain w3-white">
          <form action="{{route('channels.post')}}" method="POST" class="" >
              @csrf
          <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="القناة"  class="inputlog-field" name="chname">
              <label for="inputlog-field" class="inputlog-label">ادخل اسم القناة</label>
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
                    <h5> قنوات القبول</h5>
                    <hr>

                     </center>
                     <form class="form-inline" action="{{route('index_filtering_channels')}}" method="GET">
                      <div class="w3-half">
                          <input type="text" placeholder="اسم القناة ..."  class="w3-input w3-border "  id="filter" name="filter" value="{{$filter}}" >
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
                        <th scope="col">@sortablelink('chname','اسم القناة') </th>
                        <th scope="col"></th>
          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($channels as $channel)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $channel['id'] }}</td>
                        <td scope="row">{{$channel['chname']}}</td>
                        <td>
                          <a href="{{route('delete_channels.post',$channel->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>

                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $channels->links("pagination::bootstrap-4") !!}
            </div>
          </div>   
      </ul>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('channelsnav');
    };
    </script>
  @endsection
