<x-app-layout>
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Ubah Artikel
                    </h4>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-4" action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}" >
                            </div>
                            <div class="form-group">
                                <label for="">Deskipsi</label>
                                <input type="text" name="deskripsi" id="" class="form-control" value="{{ $artikel->deskripsi }}">
                                {{-- <textarea name="deskripsi" id="kategori" cols="13" class="form-control"></textarea> --}}
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Foto</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>  
                            <div>
                                <button type="submit" class="btn waves-effect waves-light btn-success">Ubah Artikel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>