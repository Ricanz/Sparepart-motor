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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Kategori
                    </h4>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="mt-4" action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" name="kategori" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Deskipsi</label>
                                <input type="text" name="deskripsi" id="" class="form-control">
                                {{-- <textarea name="deskripsi" id="kategori" cols="13" class="form-control"></textarea> --}}
                            </div>
                            <div>
                                <button type="submit" class="btn waves-effect waves-light btn-success">Tambah Kategori</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>