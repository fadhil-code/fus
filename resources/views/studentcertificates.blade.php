@extends('layoutstudentDetalies')
@section('title','الشهادات')
@section('content2')
<div id="titlediv" >
            <form action="{{route('studentcertificatesPost',$stid)}}" method="POST" class="" >
              @csrf
              <div class="mb-3">
                <div class="inputlog-container">
                  <select  id="title" name="title" class="inputlog-field">
                    <option value="1">بكالوريوس</option>
                    <option value="2">ماجستير</option>
                    </select>
                <label for="inputlog-field" class="inputlog-label">الشهادة</label>
                <span class="inputlog-highlight"></span>
                </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="inside" name="inside" class="inputlog-field">
                <option value="0">اختر</option>
                <option value="1">داخل العراق</option>
                <option value="2">خارج العراق</option>
                </select>
            <label for="inputlog-field" class="inputlog-label">بلد الدراسة</label>
            <span class="inputlog-highlight"></span>
            </div>
      </div>
      <div id="dakel" style="display: none" >
        <label  class="inputlog-label">تأييد التخرج</label>
        <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="عدد الكتاب"  class="inputlog-field" name="taeed" id="taeed">
              <label for="inputlog-field" class="inputlog-label">ادخل عدد كتاب التأييد</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
            <input placeholder="تاريخ التأييد"  class="inputlog-field" name="taeeddate" id="taeeddate" type="date">
            <label for="inputlog-field" class="inputlog-label">ادخل تاريخ التأييد</label>
            <span class="inputlog-highlight"></span>
            </div>
        </div>
        <div class="mb-3">
          <div class="inputlog-container">
          <input placeholder="المعدل"  class="inputlog-field" name="av" id="av">
          <label for="inputlog-field" class="inputlog-label">ادخل المعدل</label>
          <span class="inputlog-highlight"></span>
          </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
              <select  id="qu" name="qu" class="inputlog-field">
                <option value="0">اختر</option>
                <option value="1">الربع الاول</option>
                <option value="2">الربع الثاني</option>
                <option value="3">الربع الثالث</option>
                <option value="4">الربع الرابع</option>
                </select>
            <label for="inputlog-field" class="inputlog-label">تصنيف الارباع</label>
            <span class="inputlog-highlight"></span>
            </div>
       </div>
      </div>
      
      <div id="karej"  style="display: none">
        <label  class="inputlog-label">معادلة الشهادة</label>
        <div class="mb-3">
              <div class="inputlog-container">
              <input placeholder="عدد الشهادة"  class="inputlog-field" name="karar" id="karar">
              <label for="inputlog-field" class="inputlog-label">ادخل عدد الشهادة</label>
              <span class="inputlog-highlight"></span>
              </div>
          </div>
          <div class="mb-3">
            <div class="inputlog-container">
            <input placeholder="تاريخ الشهادة"  class="inputlog-field" name="karardate" id="karardate" type="date">
            <label for="inputlog-field" class="inputlog-label">ادخل تاريخ الشهادة</label>
            <span class="inputlog-highlight"></span>
            </div>
        </div>
      </div>
         <script type="text/javascript">
            const el = document.getElementById('inside');
            const dakel = document.getElementById('dakel');
            const karej = document.getElementById('karej');
            el.addEventListener('change', function handleChange(event) {
              if (event.target.value === '1') {
                dakel.style.display = 'block';
                karej.style.display = 'none';
              }
              else if(event.target.value === '2') 
              {
                dakel.style.display = 'none';
                karej.style.display = 'block';
              } 
               else {
                dakel.style.display = 'none';
                karej.style.display = 'none';
              }
            });
        </script>
          <center>
            <button type="submit" class="mybutton mybutton1"> اضافة </button>
           </center>
                </form>
                <div class="tabelcard w3-animate-bottom" style="overflow-x:auto;">
                  <center>
                    <br>
                    <h5> الشهادات</h5>
                    <hr>
                     </center>
                  <table class="mytable">
                  <thead>
                      <tr>
                        <th scope="col">ت</th>
                        <th scope="col">@sortablelink('title','الشهادة')</th>
                        <th scope="col">@sortablelink('inside','بلد الدراسة')</th>
                        <th scope="col">المعلومات</th>
                        <th scope="col"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($studentcertificates as $studentcertificate)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td scope="row">
                          @if ($studentcertificate['title']=='1')
                          بكالوريوس
                          @elseif($studentcertificate['title']=='2')
                          ماجستير
                          @else
                          لم يتم التحديد
                          @endif
                        </td>
                        <td >
                          @if ($studentcertificate['inside']=='1')
                          داخل العراق
                          @elseif($studentcertificate['inside']=='2')
                          خارج العراق
                          @else
                          لم يتم التحديد
                          @endif
                        </td>
                        <td >
                          @if ($studentcertificate['inside']=='1')
                         تأييدالتخرج  {{$studentcertificate['taeed']}}  في {{$studentcertificate['taeeddate']}} <br>
                         المعدل ({{$studentcertificate['av']}}) معدل الارباع ({{$studentcertificate['qu']}})
                          @elseif($studentcertificate['inside']=='2')
                          شهادة المعادلة {{$studentcertificate['karar']}} في  {{$studentcertificate['karardate']}}
                          @else
                          @endif
                        </td>
                        <td>
                <a href="{{route('delete_studentcertificates',$studentcertificate->id)}}" class=" tablebutton mybutton3" ><i class="fa fa-trash-o" ></i> مسح</a>
          
                        </td>
                      </tr>
                      
                  @endforeach
                </tbody>
              </table>

          </div>  
</div> 
<script type="text/javascript">
window.onload = function() {
  activenav('navtitle',['navstate','navdisc','navskil','navres']);
  activemainnav('depstudentsnav');

};

</script>

@endsection
