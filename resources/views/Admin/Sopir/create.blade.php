@extends('layouts.AdminLayout')


@section('content')


<div class="card">
    <div class="card-header">
     Form Tambah Ekspedisi
    </div>
    <div class="card-body">
        <form action="{{route('sopir.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_sopir">Nama Sopir</label>
                <input type="text" name="nama_sopir" class="form-control" value="{{old('nama_sopir')}} " >
            </div>
            <div class="form-group">
                <label for="kepala_bagian">Kepala Bagian</label>
                <select class="form-select" name="kepala_bagian" >
                    <option selected> - </option>
                    <option value="Person_1">Person_1</option>
                    <option value="Person_2">Person_2</option>

                  </select>
            </div>
            <div class="form-group">
                <label for="no_telp">No_telp</label>
                <input type="text" name="no_telp" class="form-control" value="{{old('nama_sopir')}} " >
            </div>

            <div class="form-group">
                <label for="plat_no">Plat No. </label>
                <input type="text" name="plat_no" class="form-control" value="{{old('plat_no')}}">
            </div>

            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input class="form-control" type="text" name="tujuan" >

            </div>

            <div class="form-group">
                <label for="muatan">Muatan</label>
                <input class="form-control" type="text" name="muatan" >


            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan Tambahan</label>
                <textarea name="keterangan" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
            </div>




            <div class="form-group">
                <label for="tgl_berangkat">Tanggal Berangkat</label>
                <input class="form-select" type="date" name="tgl_berangkat" >

                <div class="form-group">
                    <label for="foto_kendaraan">Foto Kendaraan</label>
                    <input type="file" class="form-control" name="foto_kendaraan">
                </div>
                <div class="form-group">
                    <label for="kartu_sim">Foto Sim</label>
                    <input type="file" class="form-control" name="kartu_sim">
                </div>
                <div class="form-group">
                    <label for="foto_sopir">Foto Sopir</label>
                    <input type="file" class="form-control" name="foto_sopir">
                </div>
                <div class="form-group">
                    <label for="foto_sertim">Foto Surat Serah Terima</label>
                    <input type="file" class="form-control" name="foto_sertim">
                </div>


            <div class="form-group">
                <label for="foto_surat">Foto Surat Jalan</label>
                <input type="file" class="form-control" name="foto_surat">
            </div>

            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
            </div>


            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-select" name="status" >
                    <option selected> - </option>

                    <option value="Sedang Berjalan">Sedang Berjalan</option>
                    <option value="Sudah Sampai Tujuan">Sudah Sampai Tujuan</option>

                  </select>
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection
