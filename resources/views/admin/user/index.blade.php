@extends('layouts.app')

@section('header')
<link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
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
        width: 15%;
    }
    .col-6 {
        width: 8%;
    }
    .col-7 {
        width: 20%;
    }
    .col-8 {
        width: 11%;
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
@endsection

@section('content')
<div class="container">
    <div>
        <div>
            <a class="btn btn-success float-right mb-1" href="#" target="_blank">
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
                <tr id=" user-{{ $user->id }}">
                    <td>
                        {{ $i++ }}
                    </td>
                    <td id="last_name">
                        {{ $user->last_name }}
                    </td>
                    <td id="first_name">
                        {{ $user->first_name }}
                    </td>
                    <td id="username">
                        {{ $user->username }}
                    </td>
                    <td>
                        <select class=" custom-select d-block w-100" id="role" required>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->roles[0]->id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }} </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class=" custom-select d-block w-100" id="grade_id" required>
                            <option {{ !isset($user->grade_id) ? 'selected value="-1"' : '' }}>....</option>
                            @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}" {{ $user->grade_id == $grade->id ? 'selected' : '' }}>
                                {{ $grade->id }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class=" custom-select d-block w-100" id="school_id" required>
                            <option {{ !isset($user->school_id) ? ' selected value="-1" ' : '' }}>....</option>
                            @foreach ($schools as $school)
                            <option value="{{ $school->id }}"
                                {{ $user->school_id == $school->id ? 'selected' : '' }}> {{ $school->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td id="phone">
                        {{ $user->mobile_phone ?? $user->telephone ?? 'Chưa cập nhật' }}
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="#" target="_blank"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @include('admin.user.create') --}}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection


@section('end')
<script>




    $(document).ready(function () {
        // remove row
        $tableID.on('click', '.table-remove-btn', function () {
            let selectedRow = $(this).parents()[1];
            let userId = $(selectedRow).attr('id').split('-')[1];
            if (confirm("Are you sure you want to delete this user ?")) {
                // {{--  $.ajax({
                //     method: "GET",
                //     url: "{{ route('admin.user.destroy', '') }}" + '/' + userId,

                //     success: () => {
                //         notify('Deleted !', 'success');
                //         $(this).parents('tr').detach();
                //     },
                //     failure: () => {
                //         notify('Error ! Can not delete !', 'error');
                //     }
                // }); --}} 
            }
        });





        //update row
        $tableID.on('click', '.table-save-btn', function () {
            let selectedRow = $(this).parents()[1];
            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let userId = +$(selectedRow).attr('id').split('-')[1];
            let self = $(this);
            data = self.parent().data();
            data['_token'] = CSRF_TOKEN;
            data['id'] = userId;
            console.log(data);
            let icon = $(self).children();
            //{{-- $.ajax({
            //     method: "post",
            //     url: "{{ route('admin.user.update', '') }}" + '/' + userId,
            //     data: data,
            //     success: () => {
            //         self.removeClass('btn-warning');
            //         self.addClass('btn-success');
            //         self.prop('disabled', true);
            //         icon.removeClass('fa-minus');
            //         icon.addClass('fa-check');
            //         notify('Updated !', 'success');
            //     }
            // }); --}}
        });

    });




</script>
<script src="{{ asset('js/avatar-upload.js') }}"></script>
<script src="{{ asset('js/user-create-form.js') }}"></script>
@endsection
