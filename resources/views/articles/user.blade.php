@section('styles')
<link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
@endsection
<!-- Modal untuk setiap item -->
<div class="modal fade" id="detailModal{{ $article->user->id }}" tabindex="-1" role="dialog"
    aria-labelledby="detailModalLabel{{ $article->user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 110%">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{ $article->user->id }}">Detail Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi konten modal dengan informasi pengguna -->
                <div class="detail-keterangan">
                <div style="margin-bottom:10px" >Name<a class="label" style="margin-left:54px;">:</a> <a style="margin-left:25px;">{{$article->user->name}}</a></p></div>
                <div style="margin-bottom:10px" >Username<a class="label" style="margin-left:25px;">:</a> <a style="margin-left:25px;">{{$article->user->username}}</a></p></div>
                <div style="margin-bottom:10px" >Email<a class="label" style="margin-left:59px;">:</a> <a style="margin-left:25px;">{{$article->user->email}}</a></p></div>
                <div class="ml-3">
                    @if ($article->user->profile_image)
                        <div class="image d-flex" style="width: 150px; height: 150px;">
                            <img src="{{ asset('uploads/profile_images/' . $article->user->profile_image) }}"
                                class="brand-image img-circle elevation-3" alt="Foto Profil">
                        </div>
                    @else
                        <div class="image d-flex" style="width: 150px; height: 150px;">
                            <img src="{{ asset('img/default.png') }}"
                                class="brand-image img-circle elevation-3" alt="Foto Profil">
                        </div>

                    @endif
                <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
            </div></div>
            <div class="modal-footer">
                <button  class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</div>

