@extends('layouts.app')

@section('main')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte3.12.min.css') }}">
    {{-- <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div cl     ass="col-sm-6">
                    <h1>Inbox</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> --}}
    <!-- /.card -->
    </div>
    <!-- /.col -->
    {{-- @if (session('success')) --}}
    <p id="icon" style="display: none" class="alert alert-success">Success</p>
    {{-- @endif --}}
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @include('sweetalert::alert')
    <div class="col-md-9" style="max-width:100%;">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>
                <form class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" name="q" value="{{ $q }}" class="form-control"
                            placeholder="Search Mail">
                        <div class="input-group-append">
                            <button class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"
                            data-toggle="tooltip" title="Pilih Semua"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="addTaskBtn btn btn-default btn-sm">
                            <i class="far fa-trash-alt" data-toggle="tooltip" title="Hapus Inbox"></i>
                        </button>
                        <a type="button" class=" markAsRead btn btn-default btn-sm">
                            <img src="{{ asset('img/mail-open.svg') }}" style="margin-top:3px;">
                        </a>
                        <a type="button" class=" MarkAsUnread btn btn-default btn-sm">
                            <img src="{{ asset('img/mail-close.svg') }}" style="margin-top:5px;">
                        </a>
                        {{-- <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-share"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-share"></i>
                            </button> --}}
                    </div>
                    <!-- /.btn-group -->
                    <a type="button" href="{{ route('message.crud') }}" class="btn btn-default btn-sm">
                        <i class="fas fa-sync-alt" data-toggle="tooltip" title="Refresh"></i>
                    </a>
                    <div class="float-right">
                        {{-- {{ $messages->firstItem() }} --}}
                        {{ $messages->lastItem() }} / {{ $messages->total() }}
                        <div class="btn-group">
                            @if ($messages->previousPageUrl())
                                <a href="{{ $messages->previousPageUrl() }}" class="btn btn-default btn-sm"
                                    data-toggle="tooltip" title="Halaman Sebelumnya">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @else
                                <button type="button" class="btn btn-default btn-sm" disabled>
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            @endif

                            @if ($messages->nextPageUrl())
                                <a href="{{ $messages->nextPageUrl() }}" class="btn btn-default btn-sm"
                                    data-toggle="tooltip" title="Halaman Berikutnya">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <button type="button" class="btn btn-default btn-sm" disabled>
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                    <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                        @foreach ($messages as $message)
                            <tr onclick="tomboltoggle('{{ $message->id }}')">
                                {{-- <td><button type="button" onclick="tomboltoggle()" id="tombol-href">Contoh</button></td> --}}
                                <td>
                                    <div>
                                        <input type="checkbox" class="haveReadCheckbox delete-checkbox"
                                            data-itemid="{{ $message->id }}" value="" id="check"
                                            onclick="stopCheckboxRedirect(event)">
                                        <label for="check"></label>
                                    </div>
                                </td>
                                {{-- <td class="mailbox-star"><a href="#"><i
                                            class="fas fa-star text-warning"></i></a>
                                               </td> --}}
                                <td class="mailbox-name"><a href="#">{{ $message->name }}</a></td>
                                <td class="mailbox-subject"><b>{{ $message->subject }}</b> -
                                    <a style="color:grey;"> {{ $message->message }}</a>
                                </td>
                                <td class="mailbox-attachment"></td>
                                <td><span class="badge badge-danger right pesan"
                                        style="{{ $message->haveread == 1 ? 'display: none;' : '' }};">
                                        1 </span></td>

                                <td class="mailbox-date right" style="width: 108px;">
                                    {{ $message->created_at->diffForHumans() }}</td>
                            </tr>

                            <script>
                                function tomboltoggle(id) {
                                    //  var tombol = document.getElementById("tombol-href");
                                    window.location.href = '/messages/' + 'inbox/' + id
                                    // console.log(id);
                                }

                                function stopCheckboxRedirect(event) {
                                    event.stopPropagation(); // Prevents the click event from reaching the parent <tr>
                                }
                            </script>
                        @endforeach
                    </tbody>
                </table>
                <script src="{{ asset('dist/js/ui-popover.js') }}"></script>

                <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer p-0">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                    <i class="far fa-square" data-toggle="tooltip" title="Pilih Semua"></i>
                </button>
                <div class="btn-group">
                    <button type="button" class=" addTaskBtn btn btn-default btn-sm">
                        <i class="far fa-trash-alt" data-toggle="tooltip" title="Hapus Inbox"></i>
                    </button>
                    {{-- <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-share"></i>
                            </button> --}}
                    <a type="button" class=" markAsRead btn btn-default btn-sm">
                        <img src="{{ asset('img/mail-open.svg') }}" style="margin-top:3px;">
                    </a>
                    <a type="button" class=" MarkAsUnread btn btn-default btn-sm">
                        <img src="{{ asset('img/mail-close.svg') }}" style="margin-top:5px;">
                    </a>
                </div>
                <!-- /.btn-group -->
                <a type="button" href="{{ route('message.crud') }}" class="btn btn-default btn-sm">
                    <i class="fas fa-sync-alt" data-toggle="tooltip" title="Refresh"></i>
                </a>
                <div class="float-right">
                    {{-- {{ $messages->firstItem() }} --}}
                    {{ $messages->lastItem() }} / {{ $messages->total() }}
                    <div class="btn-group">
                        @if ($messages->previousPageUrl())
                            <a href="{{ $messages->previousPageUrl() }}" class="btn btn-default btn-sm"
                                data-toggle="tooltip" title="Halaman Sebelumnya">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @else
                            <button type="button" class="btn btn-default btn-sm" disabled>
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @endif

                        @if ($messages->nextPageUrl())
                            <a href="{{ $messages->nextPageUrl() }}" class="btn btn-default btn-sm"
                                data-toggle="tooltip" title="Halaman Berikutnya">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button type="button" class="btn btn-default btn-sm" disabled>
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
                    </div>
                </div>
                <!-- /.btn-group -->
            </div>
            <!-- /.float-right -->
        </div>
    </div>
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- ./wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $(function() {

            $('.checkbox-toggle').click(function() {
                var clicks = $(this).data('clicks')
                if (clicks) {
                    //Uncheck all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                    $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass(
                        'fa-square')
                } else {
                    //Check all checkboxes
                    $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                    $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass(
                        'fa-check-square')
                }
                $(this).data('clicks', !clicks)
            })

            //Handle starring for font awesome
            $('.mailbox-star').click(function(e) {
                e.preventDefault()
                //detect type
                var $this = $(this).find('a > i')
                var fa = $this.hasClass('fa')

                //Switch states
                if (fa) {
                    $this.toggleClass('fa-star')
                    $this.toggleClass('fa-star-o')
                }
            })
        })
    </script>
    <!-- Tempatkan script SweetAlert di atas script yang menggunakan Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSuccessAlert(message) {
            Swal.fire({
                title: 'Success!',
                text: message,
                icon: 'success',
            }).then(() => {
                location.reload();
            });
        }
    </script>


    <script>
        $(document).ready(function() {
            let timeout

            // $(".haveReadCheckbox").change(function() {
            //     updateItemStatus($(this));
            // });

            $(".markAsRead").click(function() {
                markSelectedAsRead();
            });

            function updateItemStatus(checkbox) {
                var itemId = checkbox.data("itemid");
                var haveRead = checkbox.prop("checked");

                $.ajax({
                    url: "/messages/" + itemId + "/MarkAsRead",
                    method: "POST",
                    data: {
                        haveRead: haveRead
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response.status);
                        if (response.status == 'success') {
                            document.getElementByid("#icon").style.display = 'block';
                            showSuccessAlert(response.message).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function(error) {
                        console.error("Error updating item status:", error);
                    }
                });
            }

            function markSelectedAsRead() {

                $(".haveReadCheckbox:checked").each(function() {
                    var checkbox = $(this);
                    var itemId = checkbox.data("itemid");

                    checkbox.prop('disabled', false); // optional: disable checkbox after marking as read

                    $.ajax({
                        url: "/messages/" + itemId + "/MarkAsRead",
                        method: "POST",
                        data: {
                            haveRead: true
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response.status);
                            if (response.status == 'success') {
                                document.getElementById("icon").style.display = 'block';

                                clearTimeout(timeout)

                                timeout = setTimeout(() => {
                                    showSuccessAlert(response.message).then(() => {
                                        location.reload();
                                    });
                                }, 300);
                            }
                        },
                        error: function(error) {
                            console.error("Error updating item status:", error);
                        }
                    });
                })
            }

            $(".MarkAsUnread").click(function() {
                markSelectedAsUnRead();
            });

            function updateItemStatus(checkbox) {
                var itemId = checkbox.data("itemid");
                var UnRead = checkbox.prop("checked");

                $.ajax({
                    url: "/messages/" + itemId + "/Unread",
                    method: "POST",
                    data: {
                        UnRead: UnRead
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response.status);
                        if (response.status == 'success') {
                            document.getElementByid("#icon").style.display = 'block';
                            showSuccessAlert(response.message).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function(error) {
                        console.error("Error updating item status:", error);
                    }
                });
            }

            function markSelectedAsUnRead() {

                $(".haveReadCheckbox:checked").each(function() {
                    var checkbox = $(this);
                    var itemId = checkbox.data("itemid");

                    checkbox.prop('disabled', false); // optional: disable checkbox after marking as read

                    $.ajax({
                        url: "/messages/" + itemId + "/Unread",
                        method: "POST",
                        data: {
                            haveRead: true
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response.status);
                            if (response.status == 'success') {
                                document.getElementById("icon").style.display = 'block';

                                clearTimeout(timeout)

                                timeout = setTimeout(() => {
                                    showSuccessAlert(response.message).then(() => {
                                        location.reload();
                                    });
                                }, 300);
                            }
                        },
                        error: function(error) {
                            console.error("Error updating item status:", error);
                        }
                    });
                })
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSuccessAlert(message) {
            Swal.fire({
                title: 'Success!',
                text: message,
                icon: 'success',
            }).then(() => {
                location.reload();
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            let timeout
            // $(".haveReadCheckbox").change(function() {
            //     updateItemStatus($(this));
            // });

            $(".addTaskBtn").click(function() {
                Deleteitem();
            });

            function updateItemStatus(checkbox) {
                var itemId = checkbox.data("itemid");
                var haveRead = checkbox.prop("checked");
                let selectedItems = $('input[name="data-itemid"]:checked').map(function() {
                    return $(this).val();
                }).get();

                if (selectedItems.length === 0) {
                    alert('Please select items to delete.');
                    return;
                }
                $.ajax({
                    url: "/message/" + itemId + "/delete",
                    method: "POST",
                    data: {
                        haveRead: haveRead
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': '+json'
                    },
                    success: function(response) {

                        console.log(response.status);
                        if (response.status == 'success') {
                            document.getElementById("icon").style.display = 'block';
                            clearTimeout(timeout)
                            timeout = setTimeout(() => {
                                showSuccessAlert(response.message).then(() => {
                                    location.reload();
                                });
                            }, 300);
                        }
                    },
                    error: function(error) {
                        console.error("Error updating item status:", error);
                    }
                });
            }

            function Deleteitem() {
                $(".haveReadCheckbox:checked").each(function() {
                    var checkbox = $(this);
                    var itemId = checkbox.data("itemid");

                    checkbox.prop('disabled', true); // optional: disable checkbox after marking as read

                    $.ajax({
                        url: "/message/" + itemId + "/delete",
                        method: "POST",
                        data: {
                            haveRead: true
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Content-Type': '+json'
                        },
                        success: function(response) {
                            console.log(response.status);
                            if (response.status == 'success') {
                                document.getElementById("icon").style.display = 'block';

                                clearTimeout(timeout)
                                timeout = setTimeout(() => {
                                    showSuccessAlert(response.message).then(() => {
                                        location.reload();
                                    });
                                }, 300);
                            }

                        },
                        error: function(error) {
                            console.error("Error updating item status:", error);
                        }
                    });
                });
            }
        });
    </script>
@endsection


{{-- @extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card card-default col-md-11 bg-white p-4" style="margin-top: 5px; margin-left:50px;">
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px;">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari Informations"
                            style="width: 400px; border-radius:4px;" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="Telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>
                </form>
            </div>
            <div class="notification">
                Jumlah pesan belum dibaca: {{ \App\Models\Message::unreadCount() }}
            </div>
            <table class="table mb-0 ">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($messages as $message)
                        <tr class="{{$message->haveread == 0 ? 'bg-unread' : ''}}">
                            <td class="sequential-number"></td>
                            <td style="width: fit-content;">{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->message }}</td>
                            <td>
                                @if (!$message->haveread)
                                    <form action="{{ route('messages.open-inbox', $message->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit">Tandai Sebagai Sudah Dibaca</button>
                                    </form>
                                @endif


                                <form method="POST" action="{{ route('message.destroy', $message->id) }}"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Slider"
                                        onclick="return confirm('Hapus Data?')">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Update the sequential numbers
                                let startingIndex = {{ $startingIndex }};
                                let sequentialNumbers = document.querySelectorAll('.sequential-number');
                                sequentialNumbers.forEach(function(element, index) {
                                    element.textContent = startingIndex + index + 1;
                                });
                            });
                        </script>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" style="margin-top: 10px;">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function deleteSelected() {
            const selectedTasks = $('.task-checkbox:checked').map(function () {
                return $(this).data('index');
            }).get();

            $.ajax({
                type: 'POST',
                url: '/tasks/delete',
                data: {
                    selectedTasks: selectedTasks
                },
                success: function (data) {
                    // Refresh halaman setelah berhasil menghapus
                    location.reload();
                },
                error: function (error) {
                    console.error('Error deleting tasks:', error);
                }
            });
        }
    </script>

    <style>
        .bg-unread{
            --bs-table-bg-type:var(--bs-table-striped-bg);
        }
    </style>
@endsection --}}
