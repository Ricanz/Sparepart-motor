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
                                    <th scope="col">Transaksi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Bukti Bayar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayaran as $item)  
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->transaksi_id }}</td>
                                    <td>
                                        {{ $item->status }}
                                    </td>
                                    <td>
                                        <img height="90" src="{{asset('storage/BuktiPembayaran/'.$item->bukti)}}"></td>
                                    <td>
                                        @if ($item->status == 'Progress')
                                        <form id="form-delete" action="{{ route('pembayaran.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" name="status" value="Cancel">
                                            <button type="submit">Cancel</button>
                                        </form>
                                      
                                        <form id="form-delete" action="{{ route('pembayaran.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" name="status" value="Approved">
                                            <button type="submit">Approved</button>
                                        </form>
                                        @else 
                                            Sudah
                                        @endif
                                        
                                       
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