@extends('layouts.master')
@section('title','Profile Mahasiswa')

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
          <img src="{{$mahasiswa->getAvatar()}}" alt="profile-image" class="profile">
              <h5 class="card-title">{{$mahasiswa->nama_depan.$mahasiswa->nama_belakang}}</h5>
              <p class="card-text">NPR  : {{$mahasiswa->nrp}}</p>
              <p class="card-text">E-mail : {{$mahasiswa->email}}</p>
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
              <li class="nav-item">
                  <a href="javascript:void();" data-target="#chartNilai" data-toggle="pill" class="nav-link"><i class="ti-bar-chart-alt"></i> <span class="hidden-xs">Chart Nilai</span></a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('mahasiswa.edit',$mahasiswa->id) }}" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
              </li>
          </ul>
          <div class="tab-content p-3">
              <div class="tab-pane active" id="profile">
                  <div class="row">
                      <div class="col-md-6">
                          <h6>Mata Pelajaran</h6>
                          <p>
                              {{$mahasiswa->makul->count()}}
                          </p>
                      </div>
                      <div class="col-md-6">
                          <h6>Rata-rata Nilai</h6>
                         <p>{{$mahasiswa->rataNilai()}}</p>
                      </div>
                      <div class="col-md-12">
                          <hr>
                        <button class="btn btn-light waves-effect waves-light m-1" data-toggle="modal" data-target="#modalmakul"><i class="fa fa-plus"></i> <span>ADD</span> </button>
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Mata kuliah</h5>
                              <div class="table-responsive">
                               <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">KODE</th>
                                      <th scope="col">NAMA</th>
                                      <th scope="col">SEMESTER</th>
                                      <th scope="col">NILAI</th>
                                      <th scope="col">DOSEN</th>
                                      <th scope="col">ACTION</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($mahasiswa->makul as $data) 
                                        <tr>
                                            <th scope="row">{{$data->kode}}</th>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->semester}}</td>
                                            <td>
                                                <a href="#" class="nilai" data-type="text" data-pk="{{$data->id}}" data-url="{{route ('mahasiswa.editnilai',$mahasiswa->id)}}" 
                                                    data-title="Masukkan Nilai">{{$data->pivot->nilai}}
                                                </a>
                                            </td>
                                            <td><a href="{{route('dosen.profile',$data->dosen_id)}}">{{$data->dosen->nama}}</a></td>
                                            <td>
                                                <a href="{{route ('mahasiswa.deletenilai',[$mahasiswa,$data->id])}}" class="btn btn-light waves-effect waves-light m-1" 
                                                    onclick="return confirm('Yakin Data Dihapus.? ')"><i class="fa fa-trash-o"></i>
                                                </a>
                                                {{-- <a href="/mahasiswa/{{$mahasiswa->id}}/{{$data->id}}/deletenilai" class="btn btn-light waves-effect waves-light m-1" 
                                                    onclick="return confirm('Yakin Data Dihapus.? ')"><i class="fa fa-trash-o"></i>
                                                </a> --}}
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
                  <!--/row-->
              </div>
              <div class="tab-pane" id="chartNilai">
                  <div class="alert alert-info alert-dismissible" role="alert">
                 <div id="chartNilai"></div>
                 
                </div>
                <div class="table-responsive">
                 
                </div>
              </div>
              <div class="tab-pane" id="edit">
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
                      </div>
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
                      <div class="form-group row">
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
    </div>
      
  </div>
<!--start overlay-->
    <div class="overlay toggle-menu"></div>
  <!--end overlay-->
  </div>

  <!-- Modal Tambah Makul -->
<div class="modal fade" id="modalmakul">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modelHeading">Tambah Nilai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <form action="{{ route('mahasiswa.addnilai',$mahasiswa->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-group row">
              <label for="input-10" class="col-sm col-form-label">Mata Kuliah</label>
              <div class="col-sm-4">
                <select class="form-control" id="makul" name="makul">
                    @foreach ($makul as $item)
                <option value="{{$item->id}}" >{{$item->nama}}</option>
                    @endforeach
                  </select>
              @error('jumlah_hari_kerja')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>
              <label for="input-11" class="col-sm col-form-label">Nilai</label>
              <div class="col-sm-4">
              <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="input-11" name="nilai" value="{{ old('nilai')}}">
              @error('nilai')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror    
              </div>
          </div> 
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save changes</button>
          </div>
          </form>
      </div>
    </div>
  </div>
  
@endsection

@push('after-scripts')
<script src="/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
                Highcharts.chart('chartNilai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Data Nilai Mahasiswa'
            },
            xAxis: {
                categories: {!!json_encode($categories)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Nilai',
                data: {!!json_encode($nilai)!!}

            }]
        });
        $(document).ready(function() {
            $('.nilai').editable();
        });
    </script>
@endpush