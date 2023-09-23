@extends('layoutLogin')
@section('title','نظام متابعة الطلبة الالكتروني')
@section('content')
    <div class="w3-container">
        <div class="cardl" >
            <h5>نظام متابعة الطلبة</h5>

            <div class="mb-3">
                <img src="{{ asset('storage/images/1.jpg')}}" class="w3-circle " style="width:126px">

              </div>
            <form action="{{route('login.post')}}" method="POST" class="" >
                    @csrf
                <div class="mb-3">
                    <div class="inputlog-container">
                    <input placeholder="البريد الالكتروني" type="email" class="inputlog-field" name="email">
                    <label for="inputlog-field" class="inputlog-label">ادخل البريد الالكتروني</label>
                    <span class="inputlog-highlight"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="inputlog-container">
                        <input placeholder="كلمة المرور" type="password" class="inputlog-field" name="password" >
                        <label for="inputlog-field" class="inputlog-label">ادخل كلمة المرور</label>
                        <span class="inputlog-highlight"></span>
                        </div>
                </div>
                <button type="submit" class="contactButton"> تسجيل الدخول
                    <div class="iconButton">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                </div>
                    </button>
                      </form>
                    <hr>

                    </div>
        </div>
    </div>
@endsection

