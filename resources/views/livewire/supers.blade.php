<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="tabelcard " style="overflow-x:auto;">
        <center>
          <br>
          <h5> الدراسات</h5>
          <hr>

           </center>
           

        <table class="mytable">
        <thead>
            <tr>
                <th scope="col">ت</th>
                <th scope="col">@sortablelink('id','id')</th>
                <th scope="col">اسم المشرف</th>
              <th scope="col">القسم</th>
              <th scope="col">الدراسة</th>
              <th scope="col">التخصص العام</th>
              <th scope="col">التخصص الدقيق</th>
              <th scope="col">تاريخ المباشرة</th>
              <th scope="col">تاريخ الاشراف</th>
              <th scope="col">حالة الاشراف</th>
              <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
          @foreach($supervisors as $supervisor)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $supervisor['id'] }}</td>
              <td scope="row">{{$supervisor->lecturerss->lecname}}</td>

              <td>
                {{$supervisor->studentstudy->allmajors->departments->dname}}
        </td>
        <td>
          {{$supervisor->studentstudy->allmajors->studies->studyname}}
  </td>
              <td>
                      {{$supervisor->studentstudy->allmajors->mname}}
              </td>
              <td>
                {{$supervisor->studentstudy->allmajors->mname2}}
        </td>

        <td>
          {{$supervisor->studentstudy->mobashara}}
  </td>
  <td>
    {{$supervisor->supdate}}
</td>
<td>
{{$supervisor->active}}
</td>
              <td>
                <a href="{{route('delete_supervisors.post',$supervisor->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>
                <a href="{{route('active_supervisors',$supervisor->id)}}" class=" tablebutton mybutton2" ><i class="fa fa-plus" ></i>  الغاء تفعيل</a>

              </td>
            </tr>
            
            @endforeach
          </tbody>
    </table>
</div>
</div>
