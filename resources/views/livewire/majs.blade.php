<div>
   
    <div class="tabelcard " style="overflow-x:auto;">
        <center>
          <br>
          <h5> التخصصات</h5>
          <hr>

           </center>
            <div class="w3-half">
                <input type="text" wire:model.lazy="search" placeholder="اسم التخصص ..."  class="w3-input w3-border "   >
            
            </div>

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
                      <td scope="row">{{$major->mname}}</td>
                      <td>
                              {{$major->mname2}}
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
                        <a href="{{route('delete_depmajors.post',$major->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" "></i> مسح</a>

                      </td>
                    </tr>
                    
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {!! $allmajors->links("pagination::bootstrap-4") !!}
          </div>
        </div> 
</div>
