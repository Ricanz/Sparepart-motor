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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Konfirmasi Pembayaran
                    </h4>
                    <br>
                    {{-- <a href="{{route('produk.create')}}" class="btn btn-dark"><i class="fas fa-check"></i>&nbsp;&nbsp;Tambah Produk</a> --}}
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
                                    <th scope="col">Nama Penguna</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Total Bayar </th>
                                    <th scope="col">Bukti Bayar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayaran as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->transaksi_id }}</td>
                                    <td>{{ $item->bayar }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <img height="90" src="{{('storage/Pembayaran/'.$item->bayar)}}"></td>
                                    <td>
                                        <a href="{{ route('kategori.edit', $item->id) }}">Edit</a>
                                        <form id="form-delete" action="{{ route('kategori.destroy', $item->id) }}" method="POST">
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