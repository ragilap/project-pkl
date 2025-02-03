@extends('layouts.app')
@section('main')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <section class="content-header">
        <div class="container-fluid">
            {{-- <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Compose</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Compose</li>
                    </ol>
                </div>
            </div> --}}


            <!-- /.col -->
            <div class="col-md-9" style="max-width:100%;">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Read Mail</h3>

                        <div class="card-tools">
                            @if ($previousMessage)
                                <a href="{{ route('messages.open-inbox', $previousMessage->id) }}" class="btn btn-tools"
                                    data-toggle="tooltip" title="Pesan Sebelumnya"><i class="fas fa-chevron-left"></i></a>
                          @endif
                                    @if($nextMessage)
                                <a href="{{ route('messages.open-inbox', $nextMessage->id) }}" class="btn btn-tools"
                                    data-toggle="tooltip" title="Pesan Berikutnya"><i class="fas fa-chevron-right"></i></a>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <style>
                                .subjek {
                                    -webkit-font-smoothing: antialiased;
                                    font-family: "Google Sans",
                                        Roboto,
                                        RobotoDraft,
                                        Helvetica,
                                        Arial,
                                        sans-serif;
                                    font-size: 1.375rem;
                                    font-variant-ligatures: no-contextual;
                                    color: #1f1f1f;
                                    font-weight: 400;
                                    margin-left: 50px;
                                }
                            </style>
                            <h2 class="subjek">{{ $message->subject }}</h2>
                            <h6>From: {{ $message->name }} <br>
                                Email:{{ $message->email }}
                        </div>
                        <span class="mailbox-read-time float-right"
                            style="margin-top:5px; margin-right:5px;">{{ Carbon\Carbon::parse($message->created_at)->format('D M Y') }}
                        </span>
                        </h6>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                {{-- <a type="button" href="{{route('message.destroy',$message->id)}}" class="btn btn-default btn-sm" data-container="body" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </a> --}}
                                {{-- <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                                    <i class="fas fa-share"></i>
                                </button> --}}
                            </div>
                            <!-- /.btn-group -->
                            {{-- <button type="button" class="btn btn-default btn-sm" title="Print">
                  <i class="fas fa-print"></i>
                </button> --}}
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <p>{{ $message->message }}</p>

                            {{-- <p>Thanks,<br>Jane</p> --}}
                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>

                    <!-- /.card-footer -->
                    <div class="card-footer">
                        <div class="float-right">
                            <a type="button" href="{{ route('message.crud') }}" class="btn btn-default"
                                data-toggle="tooltip" title="Kembali ke Halaman Inbox"><i class="fas fa-reply" style="margin-right:3px;"></i>Back</a>
                            {{-- <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button> --}}
                        </div>

                        <a class="btn btn-default">
                            <form method="POST" action="{{ route('message.destroy', $message->id) }}"
                                style="display: inline-block;">
                                @csrf
                                <button data-toggle="tooltip" title="Hapus Pesan" name="haveread" onclick="return confirm('Hapus Pesan?')">
                                    <i class="far fa-trash-alt" style="margin-right:3px;"></i>Hapus
                                </button>
                            </form>
                        </a>
                        {{-- <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button> --}}
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
@endsection
