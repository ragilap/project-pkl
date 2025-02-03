@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}">
    <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin>
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap')}}" rel="stylesheet">
@endsection
<!-- Modal untuk setiap item -->
<div class="modal fade" id="detailModal{{ $image->id }}" tabindex="-1" role="dialog"
    aria-labelledby="detailModalLabel{{ $image->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width: 110%">
            <div class="modal-header" style="text-align: center;">
                <h5 class="modal-title" style="font-family: 'Lato', sans-serif;" id="detailModalLabel{{ $image->id }}">{{ $image->kalimat3 }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi konten modal dengan informasi pengguna -->
                <div class="detail-keterangan">
                    <div style="margin-bottom:10px"></div>

                    <div class="ml-3">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->kalimat3 }}">
                        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
