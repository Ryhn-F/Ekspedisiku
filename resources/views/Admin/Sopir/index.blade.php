@extends('layouts.AdminLayout')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-item-center">
        <h3>Daftar Ekspedisi</h3>
        <a href="{{route('sopir.create')}}" class="btn btn-primary">+</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Sopir</th>
                        <th>Nama Sopir</th>
                        <th>Plat No.</th>
                        <th>Tujuan</th>
                        <th>Muatan</th>
                        <th>Status Pengiriman</th>
                        <th>No. Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sopirs as $sopir )
                    <tr>
                        <td> {{$loop->iteration}}</td>
                        <td>
                            <img src="{{ asset('storage/'. $sopir->foto_sopir) }}" width="150" alt="Gambar Mobil" class="d-block mx-auto">
                        </td>
                        <td> {{$sopir->nama_sopir}}</td>
                        <td>{{$sopir->plat_no}}</td>
                        <td>{{$sopir->tujuan}}</td>
                        <td>{{$sopir->muatan}}</td>
                        <!-- Conditionally set text color based on status -->
                        <td>
                            <span class="{{ $sopir->status == 'Sedang Berjalan' ? 'text-warning' : ($sopir->status == 'Sudah Sampai Tujuan' ? 'text-success' : '') }}">
                                {{$sopir->status}}
                            </span>
                        </td>
                        <td>{{$sopir->no_telp}}</td>
                        <td>
                            <div class="d-flex flex-column align-items-center justify-content-between gap-2 d-block my-auto">
                                <a href="{{route('sopir.edit',$sopir->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{route('sopir.show',$sopir->id)}}" class="btn btn-sm btn-info"><i class="bi bi-list"></i></a>
                                <form onclick="return confirm('Anda yakin ingin menghapus data ini ?');" action="{{route('sopir.destroy',$sopir->id)}}" class="d-inline" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Data Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
