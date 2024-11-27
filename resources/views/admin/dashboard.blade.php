@extends('admin.layout.app');

@section('content')
    <div class="pagetitle">
        <h1>Admin Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Profile</li>
                <li class="breadcrumb-item active">{{$pageTitle}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-5">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ !empty($admin_data->image) ? asset('storage/' . $admin_data->image) : asset('assets/img/no-imge.jpg') }}"
                            alt="Profile" class="rounded-circle">
                        <h2>{{ $admin_data->name }}</h2>
                        <h3>Admin</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="p-3">
                        <h5 class="card-title">About</h5>
                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque
                            temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae
                            quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                        <h5 class="card-title">Profile Details</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label admin-profile">Full Name</div>
                            <div class="col-lg-9 col-md-8 admin-profile">{{ $admin_data->name }}</div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-3 col-md-4 label admin-profile">Address</div>
                            <div class="col-lg-9 col-md-8 admin-profile">A108 Adam Street, New York, NY 535022</div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-3 col-md-4 label admin-profile">Phone</div>
                            <div class="col-lg-9 col-md-8 admin-profile">{{ $admin_data->phone }}</div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-3 col-md-4 label admin-profile">Email</div>
                            <div class="col-lg-9 col-md-8 admin-profile">{{ $admin_data->email }}</div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-7">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form  -->
                               
                                <form method="POST" action="{{route('web/admin.profile.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label admin-profile">Full
                                            Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control admin-profile"
                                                id="name" value="{{ $admin_data->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label admin-profile">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="username" type="text" class="form-control admin-profile"
                                                id="name" value="{{ $admin_data->username }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about"
                                            class="col-md-4 col-lg-3 col-form-label admin-profile">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control admin-profile" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone"
                                            class="col-md-4 col-lg-3 col-form-label admin-profile">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control admin-profile"
                                                id="Phone" value="{{ $admin_data->phone }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email"
                                            class="col-md-4 col-lg-3 col-form-label admin-profile">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control admin-profile"
                                                id="Email" value="{{ $admin_data->email }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="profileImage"
                                            class="col-md-4 col-lg-3 col-form-label admin-profile">Profile
                                            Image</label>

                                        <div class="upload-img-box mb-25">
                                            <img id="showImage" src="{{ !empty($admin_data->image) ? asset('storage/' . $admin_data->image) : getDefaultImage() }}">
                                            <input type="file" name="image" id="image">
                                            <div class="upload-img-box-icon">
                                                <i class="fa-solid fa-camera"></i>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                                <!-- Change Password Form -->

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                              
                                <form action="{{route('web/admin.change-password')}}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label admin-profile">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input id="currentPassword" name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror">
                                        </div>
                                        @error('old_password')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label admin-profile">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input id="newPassword" name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                        </div>
                                        @error('password')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="confirmPassword" class="col-md-4 col-lg-3 col-form-label admin-profile">Confirm Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input id="confirmPassword" name="password_confirmation" type="password" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <input type="checkbox" id="chk"> <span class="form-label">Show Passwords</span>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('style')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/image-preview.css') }}"> --}}
    <style>
        .upload-img-box {
            height: 150px;
            width: 150px;
        }

        .admin-profile {
            font-size: 14px;
        }
    </style>
@endpush

@push('script')
        <script>
     $(document).ready(function(){
        $('#image').change(function(e){
            // console.log(e);
            let reader = new FileReader();
            reader.onload = function(e){
                $("#showImage").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
          
        })
     })

    const pwdFields = [
        document.getElementById('newPassword'),
        document.getElementById('confirmPassword')
    ];
    const chk = document.getElementById('chk');

    chk.onchange = function() {
        pwdFields.forEach(field => {
            field.type = chk.checked ? "text" : "password";
        });
    }
    //checkbox jodi check hoi tahole field type hobe text. r jodi ta na hoi tahole hobe password.
</script>
@endpush
{{--  --}}
