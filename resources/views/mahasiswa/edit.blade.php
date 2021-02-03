@extends('layouts.master')
@section('title','Project R.J')
@section('content')
<div class="col-12 col-lg-12 col-xl-12 border-light">
    <div class="card-body">
        <div class="card">
            <div class="card-header text-uppercase">Inputs Sizing Options</div>
                <div class="card-body">
                <form action="{{ route('mahasiswa.update',$mahasiswa->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <div class="form-group row">
                            <label for="input-10" class="col-sm col-form-label">Nrp </label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control @error('nrp') is-invalid @enderror" name="nrp"
                            @if (old('nrp'))
                                value="{{ old('nrp') }}"
                            @else
                                value="{{ $mahasiswa->nrp }}"
                            @endif
                                id="nrp">

                            @error('nrp')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                            </div>
                            <label for="input-11" class="col-sm col-form-label">First Name</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control @error('nrp') is-invalid @enderror"  name="nama_depan" 
                                @if (old('nama_depan'))
                                    value="{{ old('nama_depan') }}"
                                @else
                                    value="{{ $mahasiswa->nama_depan }}"
                                @endif
                                    id="nama_depan">

                            @error('nama_depan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror    
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="input-10" class="col-sm col-form-label">Last Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('nrp') is-invalid @enderror" name="nama_belakang" 
                                    @if (old('nama_belakang'))
                                        value="{{ old('nama_belakang') }}"
                                    @else
                                        value="{{ $mahasiswa->nama_belakang }}"
                                    @endif   
                                    id="nama_belakang">

                                @error('nama_belakang')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <label for="input-11" class="col-sm col-form-label">Email</label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="input-11" name="email" 
                                     @if (old('email'))
                                        value="{{ old('email') }}"
                                    @else
                                        value="{{ $mahasiswa->email }}"
                                    @endif   
                                        id="email">

                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="file" name="avatar">
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger"><i class="fa fa-check-square-o"></i> Reset</button>
                            <button type="submit" class="btn btn-success" onclick="success_noti()"><i class="fa fa-check-square-o"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')

@endpush