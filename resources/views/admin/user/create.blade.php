<link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
<div class="container-fluid">
    <form class="needs-validation" novalidate action="{{ route('admin.user.create', [], false) }}" id="newUserForm" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-center align-items-center mb-3">
                    <span class="badge badge-secondary badge-pill">Ảnh đại diện</span>
                </h4>

                <div class="avatar-wrapper">
                    <img class="profile-pic" src="" />
                    <div class="upload-button">
                        <i class="fa fa-arrow-circle-up avatar-hover"></i>
                    </div>
                    <label for="avatar"> &lt; 2MB</label>
                    <input class="file-upload" type="file" accept="image/*" id="avatar" />
                </div>
            </div>
            <div class="col-md-8 order-md-1">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="required">Họ:</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="lastName"
                            name="last_name" placeholder="Vũ" value="{{ old('last_name') }}">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="required">Tên:</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="firstName"
                            name="first_name" placeholder="Huyền Trang" value="{{ old('first_name') }}">
                        @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="username" class="required">Tên đăng nhập:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" placeholder="user123" name="username" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback" style="width: 100%;">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="required">Mật khẩu:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class=" form-control @error('password') is-invalid @enderror"
                                name="password" id="password">
                            @error('password')
                            <div class="invalid-feedback" style="width: 100%;">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password-confirm" class="required">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                            id="password-confirm" autocomplete>
                        @error('password_confirmation')
                        <div class="invalid-feedback " style="width: 100%;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="role" class="required">Chức vụ:</label>
                        <select class=" custom-select d-block w-100" id="role" name="roles">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">
                                {{ $role->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('roles')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email">
                            Địa chỉ Email:
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="birthdate">Ngày sinh:</label>
                        <input type="date" class=" form-control" id="birthdate" name="birthdate"
                            placeholder="01/01/2000">
                            @error('birthdate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="address" name="address" placeholder="Số 27 Âu Cơ, Thị Trấn Ea Súp, Huyện Ea Súp, Tỉnh Đắk Lắk">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="grade">Học sinh khối:</label>
                        <select class=" custom-select d-block w-100 @error('password') is-invalid @enderror" id="grade" name="grade_id">
                            @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">
                                {{ $grade->id }}
                            </option>
                            @endforeach
                        </select>
                        @error('grade_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-7 mb-3">
                        <label for="school">Trường học:</label>
                        <select class=" custom-select d-block w-100 @error('password') is-invalid @enderror" id="school" name="school_id">
                            <option value="">Chọn...</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                            </select>
                            @error('school_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>      
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="telephone">Điện thoại di động:</label>
                        <input type="text" class="form-control" id="mobile-phone" name="mobile_phone" placeholder="0123456789">
                        @error('mobile_phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telephone">Điện thoại bàn:</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="(0262) 3333333">
                        @error('telephone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <hr class="mb-4">


                <button class="btn btn-primary btn-lg btn-block save-button" type="submit"
                    name="submit-btn">Tiếp tục</button>
    </form>
</div>

<script src="{{ asset('js/avatar-upload.js') }}"></script>
<script src="{{ asset('js/user-create-form.js') }}"></script>

<script>
    $('#newUserForm').submit(function (e) {
        e.preventDefault();

        let form_data = $(this).serialize();
        $.ajax({
            type: form_method,
            url: form_url,
            data: form_data,
            success: function (response) {
                if (response['return_code'] == '0') {
                    if (!confirm("Thêm tài khoản thành công!")) {
                        close();
                    } else {
                        window.location.reload();
                    }
                } else {
                    alert("Thêm tài khoản thất bại.\nVui lòng thử lại hoặc ấn Ctrl + F5 rồi tạo lại tài khoản")
                }
            }
        });
    })
</script>