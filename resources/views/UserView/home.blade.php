@extends('layouts.userLayout')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-item-center">
        <h3>Daftar Ekspedisi</h3>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Sopir</th>
                        <th>Nama Sopir</th>
                        <th>Plat No.</th>
                        <th>Tujuan</th>

                        <th>Muatan</th>
                        <th>Status Pengiriman</th >
                            <th>No. Telp</th>
                            <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sopirs as $sopir )
                    <tr>
                        <td > {{$loop->iteration}}</td>
                        <td>
                            <img src="{{ asset('storage/'. $sopir->foto_sopir) }}" width="150" alt="Gambar Mobil" class="d-block mx-auto">
                        </td>
                        <td> {{$sopir->nama_sopir}}</td>
                        <td>{{$sopir->plat_no}}</td>
                        <td>{{$sopir->tujuan}}</td>

                        <td>{{$sopir->muatan}}</td>
                        <td>  <span class="{{ $sopir->status == 'Sedang Berjalan' ? 'text-warning' : ($sopir->status == 'Sudah Sampai Tujuan' ? 'text-success' : '') }}">
                            {{$sopir->status}}
                        </span></td>
                        <td>{{$sopir->no_telp}}</td>
                        <td >
                            <div class="d-flex flex-column align-items-center justify-content-between gap-2 d-block my-auto">

                                <a href="{{route('home.show',$sopir->id)}}" class="btn btn-sm btn-info"><i class="bi bi-list"></i></a>


                            </div>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Data Kosong </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
