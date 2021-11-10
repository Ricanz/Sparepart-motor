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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Ubah Data Produk
                    </h4>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-4" action="{{ route('produk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Deskipsi Produk</label>
                                <textarea name="deskripsi" id="" cols="13" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Foto Produk</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kategori_id"
                                class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="text" name="stok" class="form-control">
                            </div>
                            <div>
                                <button type="sumbit" class="btn waves-effect waves-light btn-success">Ubah Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>