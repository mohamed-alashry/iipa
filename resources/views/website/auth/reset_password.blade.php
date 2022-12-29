@extends('website.layout.app')

@section('title', 'Login')

@section('content')

@include('website.layout._header_page')
<section class="bg-content-custom">
    <div class="container-fluid p-0">
        <div class="shadow-custom rounded-4 bg-white col-xl-10 col-lg-12 col-sm-12 mx-xl-auto mx-sm-0">
            <div class="row gx-0 p-3">
                <div class="col-12 text-center py-2">
                    <i class="fa-solid fa-arrow-right-to-bracket fs-3 text-info"></i>
                    <h3 class="firstWordInfo d-inline">Pleace Login Or Register</h3>
                    <p class="mt-2">حتي تتمكن من تقيدم طلباتك, واستفسارتك ومتابعتها لاحقًا</p>
                </div>
                <div class="col-lg-6 col-sm-12 p-1" dir="rtl">
                    <label for="email" class="form-label px-1">
                        <i class="fa-solid fa-arrow-left text-secondary opacity-50 fa-sm"></i>
                        البريد الإلكتروني:
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group flex-row-reverse">
                        <input type="email" class="form-control border border-end-0 text-start py-3 direction-input-rtl direction-input-ltr" id="email"
                            placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 p-1" dir="rtl">
                    <label for="exampleFormControlInput1" class="form-label px-1">
                        <i class="fa-solid fa-arrow-left text-secondary opacity-50 fa-sm"></i>
                        كلمة المرور:
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group shadow-sm rounded-4">
                        <input type="password" class="form-control border border-end-0 text-start py-3 direction-input-rtl direction-input-ltr"
                            id="exampleFormControlInput2" placeholder="كلمة المرور">
                        <span class="input-group-text bg-white border border-start-0 direction-span-rtl direction-span-ltr" id="basic-addon1">
                            <i class="fa-solid fa-eye text-secondary opacity-50 fa-sm"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 p-2">
                    <a class="float-start fs-6 w-auto m-0" href="{{ route('website.forget_password') }}">
                        استرجع
                        <span class="text-info fw-bold">
                            كلمة المرور
                        </span>
                        الخاصة بك.
                    </a>
                </div>
                <div class="row justify-content-center gx-0 pb-3">
                    <button type="button"
                        class="btn btn-primary rounded-4 px-lg-5 py-3 col-lg-4 col-sm-10 shadow-custom m-3">
                        <i class="fa-solid fa-circle-check"></i>
                        تسجيل دخول
                    </button>
                    <button type="button"
                        class="btn btn-light rounded-4 px-lg-4 py-3 col-lg-4 col-sm-10 shadow-custom m-3">
                        <i class="fa-solid fa-user-plus"></i>
                        سجل حساب جديد
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
