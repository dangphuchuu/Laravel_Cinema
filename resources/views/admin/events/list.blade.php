@extends('admin.layout.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Events</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <a style="float:right;padding-right:30px;" class="text-light">
                                <button class=" btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#events">Create</button>
                            </a>
                            <table class="table align-items-center mb-0 ">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">Image</th>
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Content</th>
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Conditions</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Time</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($post as $value)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">{!! $value['title'] !!}</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img style="width: 300px"
                                                 src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{!! $value['image'] !!}.jpg"
                                                 alt="user1">
                                        </td>
                                        <td class="align-middle text-center text-sm ">
                                            <span class="mb-0 text-sm "
                                                  style="width:200px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical">{!! $value['content'] !!}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm ">
                                            <span class="mb-0 text-sm "
                                                  style="width:200px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical">{!! $value['conditions'] !!}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">{!! $value['created_at'] !!}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($value['status'] == 1)
                                                <a href="#">
                                                    <span class="badge badge-sm bg-gradient-success">Online</span>
                                                </a>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">{!! $value['users']['fullName'] !!}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#editEvent" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                               data-original-title="Edit event" data-bs-target="#editEvent{!! $value['id'] !!}"
                                               data-bs-toggle="modal">
                                                Edit
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:void(0)" data-url="{{ url('admin/events/delete', $value['id'] ) }}"
                                               class="text-secondary font-weight-bold text-xs delete-event" data-toggle="tooltip">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @include('admin.events.edit')
                                @endforeach
                                @include('admin.events.create')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-event').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to remove it?") === true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
                            if (data['success']) {
                                // alert(data.success);
                                trObj.parents("tr").remove();
                            } else if (data['error']) {
                                alert(data.error);
                            }
                        }
                    });
                }

            });
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.file-uploader .img_event').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".image-event").change(function () {
            readURL(this);
        });
    </script>
@endsection
