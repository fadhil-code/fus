<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="tabelcard " style="overflow-x:auto;">
        <center>
          <br>
          <h5> المواد الدراسية</h5>
          <hr>

           </center>
            <div class="w3-half">
                <input type="text"  wire:model.lazy="search" placeholder="اسم المادة ..."  class="w3-input w3-border ">
            </div>

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
              <td scope="row">{{$subject->subname}}</td>
              <td>
                {{$subject->allmajors->departments->universities->uname}}
        </td>
              <td>
                {{$subject->allmajors->departments->dname}}
        </td>
        <td>
          {{$subject->allmajors->studies->studyname}}
  </td>
              <td>
                      {{$subject->allmajors->mname}}
              </td>
              <td>
                {{$subject->allmajors->mname2}}
        </td>
              <td>
                <a href="{{route('delete_subjects.post',$subject->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" "></i> مسح</a>
              </td>
            </tr>
            
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {!! $subjects->links("pagination::bootstrap-4") !!}
  </div>
</div> 
</div>
