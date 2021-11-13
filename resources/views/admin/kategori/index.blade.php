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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Kategori
                    </h4>
                    <br>
                    <a href="{{route('kategori.create')}}" class="btn btn-dark"><i class="fas fa-check"></i>&nbsp;&nbsp;Tambah Kategori</a>
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
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>
                                        <img height="90" src="{{('storage/Kategori/'.$item->foto)}}"></td>
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