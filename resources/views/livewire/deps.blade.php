<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    
    <div class="mb-3">
        <div class="inputlog-container">
          <select  id="unid" name="unid" wire:model="unid" wire:change="finddeps" class="inputlog-field ">
            <option value="-1">اختر الجامعة</option>
          @foreach($universities as $universitie)
          <option value="{{$universitie->id}}">{{$universitie->uname}}</option>
        @endforeach
          </select>
          <label for="inputlog-field" class="inputlog-label">اختر الجامعة</label>
          </div>
          </div>
    <div class="mb-3">
        <div class="inputlog-container">
          <p wire:loading>جاري التحميل...</p>
          <select   id="did" name="did" class="inputlog-field ">
            <option value="-1">اختر القسم</option>
            @foreach($departments as $department)
          <option value="{{$department->id}}">{{$department->dname}}</option>
        @endforeach
          </select>
          <label for="inputlog-field" class="inputlog-label">اختر القسم</label>
          </div>
          </div>




</div>
