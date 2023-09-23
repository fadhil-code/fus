<div>
    <div class="tabelcard " style="overflow-x:auto;">
        <center>
          <br>
          <h5> التدريسيين</h5>
          <hr>

           </center>
            <div class="w3-half">
                <input type="text"  wire:model.lazy="search"  placeholder="اسم التدريسي ..."  class="w3-input w3-border "   >
                
              </div>

        <table class="mytable">
                <thead>
                    <tr>
                      <th scope="col">ت</th>
                      <th scope="col">@sortablelink('id','id')</th>
                      <th scope="col">@sortablelink('lecname','الاسم')</th>
                      <th scope="col">الجامعة</th>
                      <th scope="col">القسم</th>
                    <th scope="col"></th>
        
                    </tr>
                </thead>
                <tbody>
                  @foreach($lecturerss as $lecturers)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $lecturers['id'] }}</td>
                      <td scope="row">{{$lecturers['lecname']}}</td>
                      <td>
                        {{$lecturers->departments->universities->uname}}
                      </td>
                      <td>
                              {{$lecturers->departments->dname}}
                      </td>
                      <td>
                <a href="{{route('delete_deplecturerss.post',$lecturers->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" "></i> مسح</a>
              </td>
                    </tr>
                    
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {!! $lecturerss->links("pagination::bootstrap-4") !!}
          </div>
        </div>   
   
</div>
