@extends('layouts.master')
@section('title','Setup Aplikasi')
@section('content')
<div class="row">
<div class="col-12 col-lg-12 col-xl-12 border-light">
  
  @if (sizeof($setup) == 0)
      {{-- <a href="{{ route('setup.tambah')}}" class="btn btn-light waves-effect waves-light m-1"> <i class="fa fa-plus"></i> <span>ADD</span> </a> --}}
      <button class="btn btn-light waves-effect waves-light m-1" data-toggle="modal" data-target="#largesizemodal"><i class="fa fa-plus"></i> <span>ADD</span> </button>
  @endif
       <hr>
       @if (session('message'))
        <div class="alert alert-icon-success alert-dismissible" role="alert" id="success-msg">
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
              <h5 class="card-title">Basic Table</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Jumlah hari Kerja</th>
                      <th scope="col">Nama Aplikasi</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($setup as $no => $data)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->jumlah_hari_kerja}}</td>
                        <td>{{ $data->nama_aplikasi}}</td>
                        <td>
                        <a href="#" data-id="{{ $data->id }}" class="btn btn-light waves-effect waves-light m-1 btn-edit"> <i class="fa fa-edit"></i> </a>
                            {{-- <a href="#" data-id="{{ $data->id}}" class="btn btn-light waves-effect waves-light m-1 btn-confirm"> <i class="fa fa-trash-o"></i>
                                <form action="{{ route('setup.hapus', $data->id )}}" id="delete{{ $data->id }}" method="POST">
                                  @csrf
                                  @method('delete')
                                </form>
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{ $setup->links() }} --}}
            </div>
            </div>
          </div>
   
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="largesizemodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modelHeading">Your modal title here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{ route('setup.simpan')}}" method="POST">
      @csrf
      <div class="modal-body">
          <div class="form-group row">
            <label for="input-10" class="col-sm col-form-label">Jumlah Hari Kerja </label>
            <div class="col-sm-4">
            <input type="text" class="form-control @error('jumlah_hari_kerja') is-invalid @enderror" id="input-10" name="jumlah_hari_kerja" value="{{ old('jumlah_hari_kerja')}}">
            @error('jumlah_hari_kerja')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <label for="input-11" class="col-sm col-form-label">Nama Aplikasi</label>
            <div class="col-sm-4">
            <input type="text" class="form-control @error('nama_aplikasi') is-invalid @enderror" id="input-11" name="nama_aplikasi" value="{{ old('nama_aplikasi')}}">
            @error('nama_aplikasi')
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
</div>

<!-- Modal EDIT -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Your modal title here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{ route('setup.simpan')}}" method="POST" id="form-edit">
      @csrf
      <div class="col-6" id="message"></div>
      <div class="modal-body">
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          <button type="button" class="btn btn-primary btn-update" ><i class="fa fa-check-square-o"></i> Save changes</button>
        </div>
        </form>
    </div>
  </div>
</div>

@endsection

@push('after-scripts')

  <!--Sweet Alerts -->
  <script src="{{asset('assets/plugins/alerts-boxes/js/sweetalert.min.js')}}"></script>
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

  @if($errors->any())
    $('#largesizemodal').modal('show')
  @endif

  $('.btn-edit').on('click', function(){
    // console.log($(this).data('id'))
    let id = $(this).data('id')
    $.ajax({
        url:`/setup/${id}/edit`,
        method:"GET",
        success:function(data){
          // console.log(data)
          $('#modal-edit').find('.modal-body').html(data)
          $('#modal-edit').modal('show')
        },
        error:function(erorr){
          console.log(erorr)
        }
    })
  })

  $('.btn-update').on('click', function(){
    // console.log($(this).data('id'))
    var id_data = $('#id_data').val();
    let id = $('#form-edit').find('#id_data').val()
    let formData = $('#form-edit').serialize()
    $('#hari-kerja-error').html("");
    $('#nama-aplikasi-error').html();
    console.log(formData)
    // // console.log(id)
    $.ajax({
      url:`/setup/${id}`,
      type:"PATCH",
      dataType: 'json',
      data:formData,
        success:function(data){
          
            $('#modal-edit').modal('hide')
          window.location.assign('setup')
            
        },error: function(request, status, error){
          console.log(request.responseText);
          console.log(status);
          console.log(error);
          errorData = jQuery.parseJSON(request.responseText);
          console.log(errorData.message);
          console.log(errorData.errors);
          var output = ''
          for (var prop in errorData.errors){
            console.log(errorData.errors[prop]);
            // output += errorData.errors[prop][0]
          }
          if(errorData.errors.jumlah_hari_kerja){
              $('#hari-kerja-error').html(errorData.errors.jumlah_hari_kerja);
              $('.input-hari-kerja').addClass('is-invalid');
          // $('#message').html('<span class="col-sm col-form-label"><strong>' +output+ '</strong></span>')
          }else{
             $('.input-hari-kerja').removeClass('is-invalid');
         }
         if(errorData.errors.nama_aplikasi){
            $('#nama-aplikasi-error').html(errorData.errors.nama_aplikasi);
            $('.input-nama-aplikasi').addClass('is-invalid');
          }else{
            $('.input-nama-aplikasi').removeClass('is-invalid');
         }
        }
      })
    })

  

</script>
  @endpush