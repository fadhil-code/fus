<div>
    {{-- Do your work, then step back. --}}
    <div class="tabelcard " style="overflow-x:auto;">
        <center>
          <br>
          <h5> السيرة الدراسية للطالب {{$stname}}</h5>
          <hr>

           </center>
           

        <table class="mytable">
        <thead>
            <tr>
                <th scope="col">ت</th>
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
                <td>{{ $loop->index + 1 }}</td>

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
          {{$studentstud->mobashara}}
  </td>

        <td>
          @if($studentstud['state']==0)
          التحضيري
          @else
          البحث
          @endif
          
        </td>
        <td>
          @if($studentstud['position']==0)
          مستمر
          @elseif($studentstud['position']==1)
          ناجح
          @elseif($studentstud['position']==2)
          راسب
          @elseif($studentstud['position']==3)
          ترقين
          @endif
          
        </td>

              <td>
                <a href="{{route('supervisors',$studentstud->id)}}" class=" tablebutton mybutton2" ><i class="fa fa-plus" ></i> مشرف </a>
                <a href="{{route('ststate',$studentstud->id)}}" class=" tablebutton mybutton2" ><i class="fa fa-exchange" ></i>  المرحلة </a>
                <a href="{{route('stposition',$studentstud->id)}}" class=" tablebutton mybutton2" ><i class="fa fa-edit" ></i> الحالة </a>
                <a href="{{route('delete_depstudentstudy.post',$studentstud->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>
              </td>
            </tr>
            
        @endforeach
      </tbody>
    </table>
</div>  
</div>
