@extends('layouts.master')
@section('title','Project R.J')
@section('content')
<div class="row">
	<div class="col-12 col-lg-6 col-xl-4">
	   <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="w-icon">
            <i class="fa fa-user text-white"></i>
          </div>
          <div class="media-body ml-3 border-left-xs border-light-3">
            {{-- <h4 class="mb-0 ml-3">{{totalMahasiswa()}}</h4> --}}
            <p class="mb-0 ml-3 extra-small-font">Total Mahasiswa</p>
          </div>
        </div>
      </div>
	   </div>
	 </div>
	 <div class="col-12 col-lg-6 col-xl-4">
	   <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="w-icon">
            <i class="fa fa-user text-white"></i>
          </div>
          <div class="media-body ml-3 border-left-xs border-light-3">
            <h4 class="mb-0 ml-3">{{totalDosen()}}</h4>
            <p class="mb-0 ml-3 extra-small-font">Total Dosen</p>
          </div>
        </div>
      </div>
	   </div>
	 </div>
	 <div class="col-12 col-lg-12 col-xl-4">
	   <div class="card">
      <div class="card-body">
        <div class="media align-items-center">
          <div class="w-icon">
            <i class="fa fa-question-circle-o text-white"></i>
          </div>
          <div class="media-body ml-3 border-left-xs border-light-3">
            <h4 class="mb-0 ml-3">87254</h4>
            <p class="mb-0 ml-3 extra-small-font">Total Requests</p>
          </div>
        </div>
      </div>
	   </div>
	 </div>
    </div>
    
<div class="row">
    <div class="col-12 col-lg-8 col-xl-8">
      
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
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rangking 5 Besar</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Rangking</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                        $ranking = 1;  
                      @endphp
                   @foreach (Ranking() as $m)
                    <tr>
                        <td>{{$ranking}}</td>
                        <td>{{$m->nama_lengkap()}}</td>
                        {{-- <td>{{$m->rataNilai}}</td> --}}
                    </tr>
                    @php
                    $ranking ++;  
                  @endphp
                    @endforeach
                  </tbody>
                </table>
                
            </div>
            </div>
          </div>
    
    </div>

    <div class="col-12 col-lg-4 col-xl-4">
       <div class="card">
          <div class="card-header">Weekly sales
            <div class="card-action">
            <div class="dropdown">
            <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
             <i class="icon-options"></i>
            </a>
             <div class="dropdown-menu dropdown-menu-right">
             <a class="dropdown-item" href="javascript:void();">Action</a>
             <a class="dropdown-item" href="javascript:void();">Another action</a>
             <a class="dropdown-item" href="javascript:void();">Something else here</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="javascript:void();">Separated link</a>
              </div>
             </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-container-2"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
              <canvas id="chart2" width="293" height="188" class="chartjs-render-monitor" style="display: block; width: 293px; height: 188px;"></canvas>
             </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center">
              <tbody>
                <tr>
                  <td><i class="fa fa-circle text-white mr-2"></i> Direct</td>
                  <td>$5856</td>
                  <td>+55%</td>
                </tr>
                <tr>
                  <td><i class="fa fa-circle text-light-1 mr-2"></i>Affiliate</td>
                  <td>$2602</td>
                  <td>+25%</td>
                </tr>
                <tr>
                  <td><i class="fa fa-circle text-light-2 mr-2"></i>E-mail</td>
                  <td>$1802</td>
                  <td>+15%</td>
                </tr>
                <tr>
                  <td><i class="fa fa-circle text-light-3 mr-2"></i>Other</td>
                  <td>$1105</td>
                  <td>+5%</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
   </div>

@endsection

@push('mid-scripts')

@endpush