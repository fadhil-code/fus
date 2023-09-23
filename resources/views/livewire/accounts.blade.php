<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="tabelcard w3-animate-bottom" style="overflow-x:auto;">
        <center>
          <br>
          <h5> المستخدمين</h5>
          <hr>

           </center>
            <div class="w3-half">
                <input type="text" wire:model.lazy="search" placeholder="اسم المستخدم ..."  class="w3-input w3-border "   >
            </div>
            
        <table class="mytable">
        <thead>
            <tr>
              <th scope="col">ت</th>
              <th scope="col">@sortablelink('id','id')</th>
              <th scope="col">@sortablelink('fullname','الاسم')</th>
              <th scope="col">@sortablelink('email','البريد الالكتروني')</th>
              <th scope="col">@sortablelink('universities.uname','الجامعة')</th>
              <th scope="col">@sortablelink('departments.dname','القسم')</th>

              <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
          @foreach($accounts as $account)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $account['id'] }}</td>

              <td scope="row">{{$account['fullname']}}</td>
              <td scope="row">{{$account['email']}}</td>
              <td>
                @if ($account['unid'])
                {{$account->universities->uname}}
                @else
                عام
                @endif
              </td>
              <td>
                @if ($account['did'])

                {{$account->departments->dname}}
                @else
                عام
                @endif
        </td>
              <td>
      <a href="{{route('delete_accounts.post',$account->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>

              </td>
            </tr>
            
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {!! $accounts->links("pagination::bootstrap-4") !!}
  </div>
</div>  
</div>
