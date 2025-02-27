@extends('layouts.AdminLayout')

@section('content')

<div class="row">
    <!-- First Card: Form Edit Ekspedisi -->
    <div class="col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                Form Edit Ekspedisi
            </div>
            <div class="card-body">
                <form action="{{ route('sopir.update', $sopir->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Laravel requires this for updating resources --}}

                    <div class="form-group">
                        <label for="nama_sopir">Nama Sopir</label>
                        <input type="text" name="nama_sopir" class="form-control" value="{{ old('nama_sopir', $sopir->nama_sopir) }}">
                    </div>



                    <div class="form-group">
                        <label for="kepala_bagian">Kepala Bagian</label>
                        <select class="form-select" name="kepala_bagian">
                            <option value="Person_1" {{ old('kepala_bagian', $sopir->kepala_bagian) == 'Person_1' ? 'selected' : '' }}>Person_1</option>
                            <option value="Person_2" {{ old('kepala_bagian', $sopir->kepala_bagian) == 'Person_2' ? 'selected' : '' }}>Person_2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $sopir->no_telp) }}">
                    </div>

                    <div class="form-group">
                        <label for="plat_no">Plat No.</label>
                        <input type="text" name="plat_no" class="form-control" value="{{ old('plat_no', $sopir->plat_no) }}">
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input class="form-control" type="text" name="tujuan" value="{{ old('tujuan', $sopir->tujuan) }}">
                    </div>

                    <div class="form-group">
                        <label for="muatan">Muatan</label>
                        <input class="form-control" type="text" name="muatan" value="{{ old('muatan', $sopir->muatan) }}">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan Tambahan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control">{{ old('keterangan', $sopir->keterangan) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tgl_berangkat">Tanggal Berangkat</label>
                        <input class="form-select" type="date" name="tgl_berangkat" value="{{ old('tgl_berangkat', $sopir->tgl_berangkat) }}">
                    </div>



                    <div class="form-group">
                        <label for="deskripsi">Description</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control">{{ old('deskripsi', $sopir->deskripsi) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-select" name="status">
                            <option selected>{{ old('status', $sopir->status) }}</option>
                            <option value="Sedang Berjalan">Sedang Berjalan</option>
                            <option value="Sudah Sampai Tujuan">Sudah Sampai Tujuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Second Card: Form Edit Foto -->
    <div class="col-md-4 col-lg-4">
        <div class="card">
            <div class="card-header">
                Form Edit Foto
            </div>
            <div class="card-body">
                <form action="{{ route('sopir.updateImage', $sopir->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')



                    <div class="form-group">
                        @if($sopir->foto_sopir)
                            <img src="{{ asset('storage/' . $sopir->foto_sopir) }}" alt="Gambar Sopir" style="width: 300px">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="foto_sopir">Foto Sopir</label>
                        <input type="file" class="form-control" name="foto_sopir">
                    </div>

                    <div class="form-group">
                        @if($sopir->foto_kendaraan)
                            <img src="{{ asset('storage/' . $sopir->foto_kendaraan) }}" alt="Gambar Sopir" style="width: 300px">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="foto_kendaraan">Foto Kendaraan</label>
                        <input type="file" class="form-control" name="foto_kendaraan" value="{{ old('foto_kendaraan', $sopir->foto_kendaraan) }}">
                    </div>

                    <div class="form-group">
                        @if($sopir->kartu_sim)
                            <img src="{{ asset('storage/' . $sopir->kartu_sim) }}" alt="Gambar Sopir" style="width: 300px">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="kartu_sim">Foto Sim</label>
                        <input type="file" class="form-control" name="kartu_sim">
                    </div>

                    <div class="form-group">
                        @if($sopir->foto_sertim)
                            <img src="{{ asset('storage/' . $sopir->foto_sertim) }}" alt="Gambar Sopir" style="width: 300px">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="foto_sertim">Foto Surat Serah Terima</label>
                        <input type="file" class="form-control" name="foto_sertim">
                    </div>
                    <div class="form-group">
                        @if($sopir->foto_surat)
                            <img src="{{ asset('storage/' . $sopir->foto_surat) }}" alt="Gambar Sopir" style="width: 300px">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="foto_surat">Foto Surat Jalan</label>
                        <input type="file" class="form-control" name="foto_surat">
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
