
@extends('layouts.AdminLayout')

@section('content')

<div class="row">
    <!-- First Card: Form Edit Ekspedisi -->
    <div class="col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                Informasi Detail
            </div>
            <div class="card-body">

                    <div class="form-group">
                        <label for="nama_sopir">Nama Sopir</label>
                        <input type="text" name="nama_sopir" class="form-control" value="{{ old('nama_sopir', $sopir->nama_sopir) }}" readonly>
                    </div>



                    <div class="form-group">
                        <label for="kepala_bagian">Kepala Bagian</label>
                        <input class="form-control" name="kepala_bagian" readonly value="{{old('kepala_bagian',$sopir->kepala_bagian)}}">


                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $sopir->no_telp) }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="plat_no">Plat No.</label>
                        <input type="text" name="plat_no" class="form-control" value="{{ old('plat_no', $sopir->plat_no) }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input class="form-control" type="text" name="tujuan" value="{{ old('tujuan', $sopir->tujuan) }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="muatan">Muatan</label>
                        <input class="form-control" type="text" name="muatan" value="{{ old('muatan', $sopir->muatan) }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan Tambahan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" readonly>{{ old('keterangan', $sopir->keterangan) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tgl_berangkat">Tanggal Berangkat</label>
                        <input class="form-control"  type="date" name="tgl_berangkat" value="{{ old('tgl_berangkat', $sopir->tgl_berangkat) }}" readonly>
                    </div>



                    <div class="form-group">
                        <label for="deskripsi">Description</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" readonly>{{ old('deskripsi', $sopir->deskripsi) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text"
                               class="form-control
                               {{ $sopir->status == 'Sedang Berjalan' ? 'bg-gradient-warning' : ($sopir->status == 'Sudah Sampai Tujuan' ? 'bg-gradient-success' : '') }}
                               text-white"
                               value="{{ $sopir->status }}"
                               readonly>
                    </div>





            </div>
        </div>
    </div>

    <!-- Second Card: Form Edit Foto -->
    <div class="col-md-4 col-lg-4">
        <div class="card">
            <div class="card-header">
                Info Foto
            </div>
            <div class="card-body">
                <!-- List Section -->
                @php
                    $imageTitles = [
                        'Foto Sopir' => $sopir->foto_sopir,
                        'Foto Kendaraan' => $sopir->foto_kendaraan,
                        'Kartu SIM' => $sopir->kartu_sim,
                        'Foto Sertifikat' => $sopir->foto_sertim,
                        'Foto Surat' => $sopir->foto_surat
                    ];
                @endphp

                <!-- Loop through each image and title -->
                @foreach ($imageTitles as $title => $image)
                    @if ($image)
                        <div class="mb-3">
                            <h5>{{ $title }}</h5>
                            <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="{{ $title }}" style="width: 300px; height: auto;">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
