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
                                <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate"> <i class="fa fa-plus"></i> Data</button>
                            </div>
                        </div>        
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                                
                                         </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;   
                                        @endphp

                                        @foreach($data_user as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->role }}</td>
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
                            <h5 class="modal-title">Tambah Data User</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="user/store">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama User" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email User" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password User" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="selectRole" id="selectRole" required>
                                    <option selected>Choose...</option>
                                    <option value="admin">Admin</option>
                                    <option value="viewers">viewers</option>
                                    
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

@foreach($data_user as $edit_val)
<div class="modal fade" id="modalEdit{{ $edit_val->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Data User</h5>
                            <button type="button" value="" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="user/update/{{ $edit_val->id }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="{{ $edit_val->name }}" class="form-control" name="editNama" placeholder="Nama User" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $edit_val->email }}" name="editEmail" placeholder="Email User" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="editPassword" placeholder="Password User" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="editRole" id="editRole" required>
                                    <option selected>Choose...</option>
                                    <option <?php if ($edit_val['role']=='admin') echo "selected" ?> value="admin">Admin</option>
                                    <option <?php if ($edit_val['role']=='viewers') echo "selected" ?> value="viewers">viewers</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-undo"></i></button>
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> changes</button>
                        </div>
                        </form>
                </div>
       </div>
</div>
@endforeach

@foreach($data_user as $del_val)
<div class="modal fade" id="modalHapus{{ $del_val->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Data User</h5>
                            <button type="button" value="" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>

                        <form method="GET" action="user/destroy/{{ $del_val->id }}">
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