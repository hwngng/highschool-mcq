<div class="container-fluid">
    <form class="needs-validation" novalidate action="{{ route('admin.user.store', [], false) }}" id="newUserForm" method="POST">
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
                    <input class="file-upload" type="file" accept="image/*"/>
                    <input type="hidden" name="avatar" class="avatar-url">
                </div>
            </div>
            <div class="col-md-8 order-md-1">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="required">Họ:</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" placeholder="Vũ" value="{{ old('last_name') }}">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="required">Tên:</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
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
                        <label class="required">Tên đăng nhập:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                placeholder="user123" name="username" value="{{ old('username') }}">
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
                        <label class="required">Mật khẩu:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <div class="invalid-feedback" style="width: 100%;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="required">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete>
                        @error('password_confirmation')
                        <div class="invalid-feedback " style="width: 100%;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="required">Chức vụ:</label>
                        <select class=" custom-select d-block w-100" name="roles">
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
                        <label>Địa chỉ Email:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="you@example.com" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Ngày sinh:</label>
                        <input type="date" class="form-control" name="birthdate">
                            @error('birthdate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label>Địa chỉ:</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="address" placeholder="Số 27 Âu Cơ, Thị Trấn Ea Súp, Huyện Ea Súp, Tỉnh Đắk Lắk" value="{{ old('address') }}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label>Học sinh khối:</label>
                        <select class="custom-select d-block w-100 @error('password') is-invalid @enderror" name="grade_id">
                            <option value="">Chọn...</option>
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
                        <label>Trường học:</label>
                        <select class="custom-select d-block w-100 @error('password') is-invalid @enderror" name="school_id">
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
                        <label">Điện thoại di động:</label>
                        <input type="text" class="form-control" name="mobile_phone" placeholder="0123456789" value="{{ old('mobile_phone') }}">
                        @error('mobile_phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Điện thoại bàn:</label>
                        <input type="text" class="form-control" name="telephone" placeholder="(0262) 3333333" value="{{ old('telephone') }}">
                        @error('telephone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block save-button" type="submit">Tạo tài khoản</button>
    </form>
</div>
