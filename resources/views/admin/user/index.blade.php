@extends('layouts.app')

@section('title', '- Quản lý người dùng')

@push('head')
<style>
    .col-1 {
        width: 2%;
    }
    .col-2 {
        width: 10%;
    }
    .col-3 {
        width: 10%;
    }
    .col-4 {
        width: 13%;
    }
    .col-5 {
        width: 11%;
    }
    .col-6 {
        width: 7%;
    }
    .col-7 {
        width: 24%;
    }
    .col-8 {
        width: 12%;
    }
    .col-9 {
        width: 11%;
    }

    .table>tbody>tr>td {
        vertical-align: middle;
    }

    .table>thead>tr>th {
        vertical-align: middle;
    }
</style>
<link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
@endpush

@section('content')
<div class="container">
    <div>
        <div>
            <a id="add-user-btn" class="btn btn-success float-right mb-1" href="javascript:void(0)">
                Thêm <i class="fas fa-plus"></i>
            </a>
        </div>
        <table class="table">
            <colgroup>
                <col class="col-1">
                <col class="col-2">
                <col class="col-3">
                <col class="col-4">
                <col class="col-5">
                <col class="col-6">
                <col class="col-7">
                <col class="col-8">
                <col class="col-9">
            </colgroup>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Tên Đăng Nhập</th>
                    <th>Quyền</th>
                    <th>Khối</th>
                    <th>Trường</th>
                    <th>Số điện thoại</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @isset($users)
                @foreach ($users as $user)
                <tr id="u-{{ $user->id }}">
                    <td class="order">
                        {{ $i++ }}
                    </td>
                    <td>
                        {{ $user->last_name }}
                    </td>
                    <td>
                        {{ $user->first_name }}
                    </td>
                    <td>
                        {{ $user->username }}
                    </td>
                    <td>
                        {{ $user->roles[0]->name }}
                    </td>
                    <td>
                        {{ $user->grade_id }}
                    </td>
                    <td>
                        {{ $user->school->name ?? '' }}
                    </td>
                    <td>
                        {{ $user->mobile_phone ?? $user->telephone ?? 'Chưa cập nhật' }}
                    </td>
                    <td>
                        <a class="edit-user-btn btn btn-primary btn-sm" href="#" target="_blank"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="deleteUser(event, {{ $user->id }})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="create-user-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tạo người dùng mới</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('admin.user.create')
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-user-modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh sửa</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="needs-validation" action="{{ route('admin.user.update', [], false) }}" id="edit-user-form" method="POST">
                        @csrf
                        <input type="hidden" name="id">
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
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                                        @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="required">Tên:</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                                        @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Tên đăng nhập:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="username" disabled>
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="required">Chức vụ:</label>
                                        <select class="custom-select d-block w-100" name="roles">
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
                                            <input type="email" class="form-control" name="email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="birthdate">Ngày sinh:</label>
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
                                        <label for="address">Địa chỉ:</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="address">
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
                                        <select class=" custom-select d-block w-100 @error('password') is-invalid @enderror" name="grade_id">
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
                                        <label for="school">Trường học:</label>
                                        <select class=" custom-select d-block w-100 @error('password') is-invalid @enderror" name="school_id">
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
                                        <input type="text" class="form-control" name="mobile_phone">
                                        @error('mobile_phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="telephone">Điện thoại bàn:</label>
                                        <input type="text" class="form-control" name="telephone">
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
                        <button class="btn btn-primary btn-lg btn-block save-button" type="submit">Cập nhật tài khoản</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection


@push('end')
<script src="{{ asset('js/avatar-upload.js') }}"></script>
<script>
    // remove row
    const deleteUser = function (e, userId) {
        e.preventDefault();
        if (confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
            $.ajax({
                type: "get",
                url: "{{ route('admin.user.destroy', '') }}" + '/' + userId,
                success: function (response) {
                    if (response['return_code'] == 0) {
                        $('#u-' + userId).animate("fast").animate({
                            opacity : "hide"
                        }, "slow", function () {
                            let nextRows = $(this).nextAll();
                            let order = parseInt($(this).children('td.order').text());
                            for (let i = 0; i < nextRows.length; ++i) {
                                $(nextRows[i]).children('td.order').text(order);
                                ++order;
                            }
                        });
                    } else {
                        alert("Có lỗi xảy ra, vui lòng ấn Ctrl + F5");
                    }
                },
                error: function () {
                    alert("Lỗi kết nối tới máy chủ, vui lòng kiểm tra kết nối mạng.");
                }
            });
        }
    };

    $(document).ready(function () {
        $('#add-user-btn').on('click', function () {
            $('#create-user-modal').modal('show');
        })

        $('.edit-user-btn').on('click', function (e) {
            e.preventDefault();

            let selectedRow = $(this).parents()[1];
            let userId = $(selectedRow).attr('id').split('-')[1];

            $.ajax({
                type: 'get',
                url: '{{ route('admin.user.show', '', false) }}' + '/' + userId,
                success: function (response) {
                    let editForm = $('#edit-user-form');
                    editForm.find('input[name="id"]').val(response['id']);
                    editForm.find('.profile-pic').attr('src', response['avatar']);
                    editForm.find('input[name="avatar"]').val(response['avatar']);
                    editForm.find('input[name="username"]').val(response['username']);
                    editForm.find('input[name="first_name"]').val(response['first_name']);
                    editForm.find('input[name="last_name"]').val(response['last_name']);
                    editForm.find('select[name="roles"]').val(response['roles'][0]['id']);
                    editForm.find('input[name="email"]').val(response['email']);
                    editForm.find('input[name="birthdate"]').val(response['birthdate']);
                    editForm.find('input[name="address"]').val(response['address']);
                    editForm.find('select[name="grade_id"]').val(response['grade_id']);
                    editForm.find('select[name="school_id"]').val(response['school_id']);
                    editForm.find('input[name="mobile_phone"]').val(response['mobile_phone']);
                    editForm.find('input[name="telephone"]').val(response['telephone']);
                }
            })

            $('#edit-user-modal').modal('show');
        });

        $('#edit-user-form').submit(function (e) {
            e.preventDefault();

            let form_url = $(this).attr("action");
            let form_method = $(this).attr("method");
            let form_data = $(this).serialize();
            if (form_data['roles'] == '1') {
                if (!confirm('Bạn có chắc chắn muốn chỉnh tài khoản này với quyền Quản trị viên?'))
                    return;
            }
            $.ajax({
                type: form_method,
                url: form_url,
                data: form_data,
                success: function (response) {
                    if (response['return_code'] == '0') {
                        alert('Cập nhật tài khoản thành công')
                        window.location.reload();
                    } else {
                        alert('Cập nhật tài khoản thất bại.\nVui lòng thử lại hoặc ấn Ctrl + F5 rồi tạo lại tài khoản')
                    }
                }
            });
        });

        $('#newUserForm').submit(function (e) {
            e.preventDefault();

            let form_url = $(this).attr("action");
            let form_method = $(this).attr("method");
            let form_data = $(this).serialize();
            if (form_data['roles'] == '1') {
                if (!confirm('Bạn có chắc chắn muốn tạo tài khoản này với quyền Quản trị viên?'))
                    return;
            }
            $.ajax({
                type: form_method,
                url: form_url,
                data: form_data,
                success: function (response) {
                    if (response['return_code'] == '0') {
                        alert('Thêm tài khoản thành công')
                        window.location.reload();
                    } else {
                        alert('Thêm tài khoản thất bại.\nVui lòng thử lại hoặc ấn Ctrl + F5 rồi tạo lại tài khoản')
                    }
                }
            });
        });
    });




</script>
@endpush
