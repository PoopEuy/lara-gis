@extends('layout.layout')
@section('content')
    
<div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
            <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ $title }}</h4>
                                <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate"> <i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>        
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tempat </th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Aksi</th>
                                                
                                         </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;   
                                        @endphp

                                        @foreach($data_koordinat as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_tempat }}</td>
                                            <td>{{ $row->latitude }}</td>
                                            <td>{{ $row->longitude }}</td>
                                            <td>
                                                {{-- <a href="#modalEdit{{ $row->id }}" data-toogle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit">Ubah</i></a>
                                                <a href="#modalHapus{{ $row->id }}" data-toogle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash">Hapus</i></a> --}}
                                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalEdit{{ $row->id }}"> <i class="fa fa-edit"></i>Ubah</button>
                                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus{{ $row->id }}"> <i class="fa fa-trash"></i>Hapus</button>
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
        </div>
            <!-- #/ container -->
</div>
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Koordinat</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="koordinat/store">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Tempat</label>
                                <input type="text" class="form-control" name="nama_tempat" placeholder="Nama Tempat" required>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" name="latitude" placeholder="Latitude" required>
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" name="longitude" placeholder="Latitude" required>
                            </div>
                              
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-undo"></i></button>
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
                        </div>
                        </form>
                </div>
       </div>
</div>
@foreach($data_koordinat as $edit_val)
<div class="modal fade" id="modalEdit{{ $edit_val->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Data Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="karyawan/update/{{ $edit_val->id }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Karyawan</label>
                                <input type="text" class="form-control" name="nama_tempat_edit" placeholder="Kode Karyawan" value="{{ $edit_val->nama_tempat }}" required>
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" name="nama_karyawan_edit" placeholder="Kode Karyawan" value="{{ $edit_val->nama_karyawan }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Cabang</label>
                                <select class="form-control" name="selectCabang_edit" id="selectCabang_edit" required>
                                    <option selected value="{{ $edit_val->kode_cabang }}">{{ $edit_val->kode_cabang }}</option>
                                    <option value="BGR">Bogor</option>
                                    <option value="JKT">Jakarta</option>
                                    {{-- @foreach ($data_mtype as $index => $item)
                                        <option value="{{ $item->type_batt }}" required="required">{{ $item->type_batt }}</option>
                                        
                                    @endforeach --}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Divisi</label>
                                <select class="form-control" name="selectDivisi_edit" id="selectDivisi_edit" required>
                                    <option selected>Choose...</option>
                                    <option value="IT">IT</option>
                                    <option value="GDNG">Gudang</option>
                                    {{-- @foreach ($data_mtype as $index => $item)
                                        <option value="{{ $item->type_batt }}" required="required">{{ $item->type_batt }}</option>

                                        
                                    @endforeach --}}
                                </select>
                            </div>

                             <div class="form-group">
                                <label>Departemen</label>
                                <select class="form-control" name="selectDepart_edit" id="selectDepart_edit" required>
                                    <option selected>Choose...</option>
                                    <option value="FINANCE">Financial Services</option>
                                    <option value="RND">Research & Development</option>
                                    {{-- @foreach ($data_mtype as $index => $item)
                                        <option value="{{ $item->type_batt }}" required="required">{{ $item->type_batt }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-undo"></i></button>
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
                        </div>
                        </form>
                </div>
       </div>
</div>
@endforeach

@foreach($data_koordinat as $del_val)
<div class="modal fade" id="modalHapus{{ $del_val->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Data Karyawan</h5>
                            <button type="button" value="" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>

                        <form method="GET" action="karyawan/destroy/{{ $del_val->id }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <h5>Apakah anda ingin menghapus data ini ?</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-undo"></i></button>
                            <button type="submit" class="btn btn-primary btn-danger"> <i class="fa fa-trash"></i>Hapus</button>
                        </div>
                        </form>
                </div>
       </div>
</div>
@endforeach 
@endsection