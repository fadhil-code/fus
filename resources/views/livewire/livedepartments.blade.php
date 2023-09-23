<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="tabelcard " style="overflow-x:auto;">
        <center>
          <br>
          <h5> الاقسام</h5>
          <hr>

           </center>
            <div class="w3-half">
                <input type="text"  wire:model.lazy="search"  placeholder="اسم القسم ..."  class="w3-input w3-border "   >
            </div>

        <table class="mytable">
        <thead>
            <tr>
              <th scope="col">ت</th>
              <th scope="col">@sortablelink('id','id')</th>
              <th scope="col">@sortablelink('dname','القسم')</th>
              <th scope="col">@sortablelink('universities.uname','الجامعة')</th>
              <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
          @foreach($departments as $department)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $department['id'] }}</td>

              <td scope="row">{{$department['dname']}}</td>
              <td>
                      {{$department->universities->uname}}
              </td>
              <td>
                <a href="{{route('delete_departments.post',$department->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>
              </td>
            </tr>
            
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {!! $departments->links("pagination::bootstrap-4") !!}
  </div>
</div>  
</div>
