@extends('layouts.master')
@section('title','Profile Dosen')

@push('page-styles')
<link href="/css/bootstrap-editable.css" rel="stylesheet"/>
@endpush

@section('content')
<div class="container-fluid">
    @if (session('message'))
        <div class="alert alert-icon-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <div class="alert-icon icon-part-success">
            <i class="fa fa-check"></i>
            </div>
            <div class="alert-message">
            <span><strong>Success!</strong> {{ session('message') }}<a href="javascript:void();" class="alert-link"></a></span>
            </div>
        </div>
       @endif
    @if (session('error'))
        <div class="alert alert-outline-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
             <div class="alert-icon">
              <i class="fa fa-times"></i>
             </div>
             <div class="alert-message">
               <span><strong>Danger!</strong> {{ session('error') }} <a href="javascript:void();" class="alert-link"></a></span>
             </div>
           </div>
       @endif
       <div class="row">
      <div class="col-lg-4">
         <div class="card profile-card-2">
          <div class="card-img-block">
              <img class="img-fluid" src="{{asset('images/background.jpg')}}" alt="Card image cap">
          </div>
          <div class="card-body pt-5">
          <img src="{{$dosen->getavatar()}}" alt="profile-image" class="profile">
              <h5 class="card-title">{{$dosen->nama}}</h5>
              <p class="card-text">Telepon  : {{$dosen->telpon}}</p>
              <p class="card-text">Alamat : {{$dosen->alamat}}</p>
          </div>

      </div>

      </div>

      <div class="col-lg-8">
         <div class="card">
          <div class="card-body">
          <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
              <li class="nav-item">
                  <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
              </li>
              {{-- <li class="nav-item">
                  <a href="javascript:void();" data-target="#chartNilai" data-toggle="pill" class="nav-link"><i class="ti-bar-chart-alt"></i> <span class="hidden-xs">Chart Nilai</span></a>
              </li> --}}
              {{-- <li class="nav-item">
                  <a href="" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
              </li> --}}
          </ul>
          <div class="tab-content p-3">
              <div class="tab-pane active" id="profile">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Mata kuliah Yang Diajar Sama Dosen : {{$dosen->nama}}</h5>
                              <div class="table-responsive">
                               <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">NAMA</th>
                                      <th scope="col">SEMESTER</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($dosen->makul as $makul)
                                        <tr>
                                        <td>{{$makul->nama}}</td>
                                        <td>{{$makul->semester}}</td>
                                        </tr>
                                        @endforeach
                                  </tbody>
                                </table>
                            </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  <!--/row-->
              </div>
              <div class="tab-pane" id="chartNilai">
                  <div class="alert alert-info alert-dismissible" role="alert">
                 <div id="chartNilai"></div>
                 
                </div>
                <div class="table-responsive">
                 
                </div>
              </div>
              {{-- <div class="tab-pane" id="edit">
                <form action="{{ route('mahasiswa.update',$mahasiswa->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Nrp</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="text" name="nrp" value="{{$mahasiswa->nrp}}" readonly>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">First name</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="text" name="nama_depan" value="{{$mahasiswa->nama_depan}}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="text" name="nama_belakang" value="{{$mahasiswa->nama_belakang}}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Email</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="email" name="email" value="{{$mahasiswa->email}}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                          <div class="col-lg-9">
                          <input class="form-control" type="file" name="avatar">
                          </div>
                      </div> --}}
                      {{-- <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Website</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="url" value="">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Address</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="text" value="" placeholder="Street">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label"></label>
                          <div class="col-lg-6">
                              <input class="form-control" type="text" value="" placeholder="City">
                          </div>
                          <div class="col-lg-3">
                              <input class="form-control" type="text" value="" placeholder="State">
                          </div>
                      </div>
                     
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Username</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="text" value="jhonsanmark">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Password</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="password" value="11111122333">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="password" value="11111122333">
                          </div>
                      </div> --}}
                      {{-- <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label"></label>
                          <div class="col-lg-9">
                              <input type="reset" class="btn btn-secondary" value="Cancel">
                              <input type="submit" class="btn btn-primary" value="Save Changes">
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
    </div> --}}
      
  </div>
<!--start overlay-->
    <div class="overlay toggle-menu"></div>
  <!--end overlay-->
  </div>

@endsection

@push('after-scripts')

@endpush