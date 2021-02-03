@extends('layouts.master')
@section('title','Mahasiswa')
@section('content')
<div class="row">
<div class="col-12 col-lg-12 col-xl-12 border-light">
        <a href="{{ route('mahasiswa.tambah')}}" class="btn btn-light waves-effect waves-light m-1"> <i class="fa fa-plus"></i> <span>ADD</span> </a>
        <a href="{{ route('mahasiswa.export')}}" class="btn btn-light waves-effect waves-light m-1"> <i class="ti-export"></i> <span>EXCEL XLS</span> </a>
        <a href="{{ route('mahasiswa.pdf')}}" class="btn btn-light waves-effect waves-light m-1"> <i class="ti-export"></i> <span>PDF</span> </a>
        <button class="btn btn-light waves-effect waves-light m-1" data-toggle="modal" data-target="#importxls"><i class="ti-import"></i> <span>EXCEL XLS</span> </button>
        {{-- <a href="{{ route('mahasiswa.pdf')}}" class="btn btn-light waves-effect waves-light m-1"> <i class="ti-import"></i> <span>EXCEL XLS</span> </a> --}}
       <hr>
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
              <h5 class="card-title">Data Mahasiswa</h5>
			      <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nrp</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">E-Mail</th>
                      <th scope="col">Rata2 Nilai</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($mahasiswa as $no => $item)
                    <tr>
                        <td>{{ $mahasiswa->firstItem()+$no }}</td>
                        <td><a href="/mahasiswa/{{$item->id}}/profile">{{ $item->nrp}}</a></td>
                        <td>{{ $item->nama_depan}}</td>
                        <td>{{ $item->nama_belakang}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->rataNilai()}}</td>
                        <td>
                        {{-- <a href="{{ route('mahasiswa.edit',$data->id) }}" class="btn btn-light waves-effect waves-light m-1"> <i class="fa fa-edit"></i> </a> --}}
                            <a href="#" data-id="{{ $item->id}}" class="btn btn-light waves-effect waves-light m-1 btn-confirm"> <i class="fa fa-trash-o"></i>
                                <form action="{{ route('mahasiswa.hapus', $item->id )}}" id="delete{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $mahasiswa->links() }}
            </div>
            </div>
          </div>
        
    </div>
</div>
</div>

<div class="modal fade" id="importxls" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import XLS Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'mahasiswa.import', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::file('data_mahasiswa')  !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <input type="submit" class="btn btn-white btn-sm" value="Import">
      </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('after-scripts')

  <!--Sweet Alerts -->
  <script src="{{asset('assets/plugins/alerts-boxes/js/sweetalert.min.js')}}"></script>
  {{-- <script src="{{asset('assets/plugins/alerts-boxes/js/sweet-alert-script.js')}}"></script> --}}
  <script>
  $(".btn-confirm").click(function(e){
    id = e.target.dataset.id;
    swal({
      title: "Apakah Anda yakin?",
      text: "Data yang sudah dihapus ga bisa di balikin!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // swal("Poof! Your imaginary file has been deleted!", {
        //   icon: "success",
        // });
        $(`#delete${id}`).submit();
      } else {
        // swal("Your imaginary file is safe!");
      }
    });

});

</script>
  @endpush