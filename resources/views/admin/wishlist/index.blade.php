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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Produk
                    </h4>
                    <br>
                    <a href="{{route('produk.create')}}" class="btn btn-dark"><i class="fas fa-check"></i>&nbsp;&nbsp;Tambah Produk</a>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Foto Produk</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->foto }}</td>
                                    <td>{{ $item->kategori_id }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>
                                        <a href="{{ route('produk.edit', $item->id) }}">Edit</a>
                                        <form id="form-delete" action="{{ route('produk.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>