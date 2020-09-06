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
                        <a class="btn btn-primary btn-sm" href="#" target="_blank"><i class="fas fa-edit"></i></a>
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
@endsection


@push('end')
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
@endpush
