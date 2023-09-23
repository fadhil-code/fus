@extends('layoutMAIN')
@section('title','المستخدمين')
@section('content')
<div class="w3-row-padding w3-margin-bottom">
  <div class="w3-container" id="unidiv" >
      <h5>المستخدمين</h5>
      <ul class="w3-ul cardmain w3-white ">
          <form action="{{route('accounts.post')}}" method="POST" class="" >
              @csrf
              <div class="mb-3">
                <div class="inputlog-container">
                    <input  placeholder="الاسم الكامل"  class="inputlog-field"  name="fullname">
                  <label for="inputlog-field" class="inputlog-label">ادخل الاسم</label>
                  <span class="inputlog-highlight"></span>
                </div>
        </div>
        <div class="mb-3">
            <div class="inputlog-container">
            <input placeholder="البريد الالكتروني" type="email" class="inputlog-field" name="email">
            <label for="inputlog-field" class="inputlog-label">ادخل البريد الالكتروني</label>
            <span class="inputlog-highlight"></span>
            </div>
        </div>
        <div class="mb-3">
            <div class="inputlog-container">
                <input placeholder="كلمة المرور"  class="inputlog-field" name="password" >
                <label for="inputlog-field" class="inputlog-label">ادخل كلمة المرور</label>
                <span class="inputlog-highlight"></span>
                </div>
        </div>
      @if (! auth()->user()->unid)

          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="unid" name="unid" class="inputlog-field ">
                <option value="">اختر الجامعة</option>
                @foreach($universities as $universitie)
              <option value="{{$universitie['id']}}">{{$universitie['uname']}}</option>
            @endforeach
              </select>
              <label for="inputlog-field" class="inputlog-label">اختر الجامعة</label>
              </div>
              </div>
              
              <div class="mb-3">
                <div class="inputlog-container">
                  <select  id="did" name="did" class="inputlog-field ">
                  </select>
                  <label for="inputlog-field" class="inputlog-label">اختر القسم</label>
                  </div>
                  </div>

                <script type="text/javascript">
                  $(document).ready(function () {
                      $('#unid').on('change', function () {
                          var unid = this.value;
                          $('#did').html('');
                          $.ajax({
                              url: '{{ route('deps') }}?unid='+unid,
                              type: 'get',
                              success: function (res) {
                                  $('#did').html('<option value="">اختر القسم</option>');
                                  $.each(res, function (key, value) {
                                      $('#did').append('<option value="' + value
                                          .id + '">' + value.dname + '</option>');
                                  });
                              }
                          });
                      });
              
                  });
              </script>
              @else
              <div class="mb-3">
                <div class="inputlog-container">
                  <select  id="did" name="did" class="inputlog-field ">
                    <option value="">اختر القسم</option>
                    @foreach($departments as $department)
                  <option value="{{$department['id']}}">{{$department['dname']}}</option>
                @endforeach
                  </select>
                  <label for="inputlog-field" class="inputlog-label">اختر القسم</label>
                  </div>
                  </div>
              @endif
                  
              <center>
                <button type="submit" class="mybutton mybutton1"> اضافة </button>
               </center>
                </form>
                
          @livewire('accounts', ['unid'=>auth()->user()->unid])

        </ul>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function() {
      activemainnav('accountsnav');
    };
    </script>
  @endsection
