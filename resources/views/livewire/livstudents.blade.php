<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="tabelcard " style="overflow-x:auto;">
        <center>
          <br>
          <h5> المواد الدراسية</h5>
          <hr>

           </center>
            <div class="w3-half">
                <input type="text"  wire:model.lazy="search" placeholder="اسم الطالب ..."  class="w3-input w3-border ">
            </div>

        <table class="mytable">
        <thead>
            <tr>
            <th scope="col">ت</th>
            <th scope="col">@sortablelink('id','id')</th>
            <th scope="col">@sortablelink('id','اسم الطالب')</th>
            <th scope="col">الجامعة</th>
            <th scope="col">القسم</th>
            <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $student['id'] }}</td>
              <td scope="row">{{$student->stname}}</td>

              <td>
                {{$student->departments->universities->uname}}
        </td>
              <td>
                      {{$student->departments->dname}}
              </td>

              <td>
                <a href="{{route('delete_depstudents.post',$student->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>
                <a href="{{route('depstudentstudy',$student->id)}}" class=" tablebutton mybutton2" ><i class="fa fa-address-card" ></i>  السيرة الدراسية </a>
                <a href="{{route('depstudentstudy',$student->id)}}" class=" tablebutton mybutton1" ><i class="fa fa-address-card" ></i>  المعلوات الشخصية </a>
              </td>
            </tr>
            
        @endforeach
      </tbody>
    </table>
</div> 
</div>
