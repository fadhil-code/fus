<div>
    {{-- In work, do what you enjoy. --}}
    <button wire:click="getuncount">find</button>
    <div class="mb-3">
        <div class="inputlog-container">
          <select  id="unid" name="unid" class="inputlog-field ">
          @foreach($universities as $universitie)
          <option value="{{$universitie->id}}">{{$universitie->uname}}</option>
        @endforeach
          </select>
          <label for="inputlog-field" class="inputlog-label">اختر الجامعة</label>
          </div>
          </div>
</div>
