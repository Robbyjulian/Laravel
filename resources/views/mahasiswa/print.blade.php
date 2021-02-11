@extends('layouts.masterprint')
{{-- @section('title','Mahasiswa') --}}

{{-- @section('page-styles')

<style type="text/css" media="print">
    table {
            font-size: 10px;
        }
    @page { 
        margin : 20px;
    }
</style>
    
@endsection --}}
@section('content')


   <h4 class="text-center ">Universitas Minang Maimbau</h4>
        <table id="datatable-buttons" class="table table-sm table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nrp</th>
                <th class="text-center">First Name</th>
                <th class="text-center">Last Name</th>
                <th class="text-center">E-Mail</th>
                <th class="text-center">Rata2 Nilai</th>
                {{-- <th scope="col">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $no => $item)
                <tr>
                    <td class="text-center">{{ $mahasiswa->firstItem()+$no }}</td>
                    <td class="text-center">{{ $item->nrp}}</a></td>
                    <td class="text-center">{{ $item->nama_depan}}</td>
                    <td class="text-center">{{ $item->nama_belakang}}</td>
                    <td class="text-center">{{ $item->email}}</td>
                    <td class="text-center">{{ $item->rataNilai()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-lg-12">
                <div class="float-right" style="font-size: 13px;" >
                    <span>Ka. Bag. Keuangan & BMN</span>
                    <br><br><br><br><br><br>
                    <p style="margin-bottom:0px;">Robby Julian</p>
                    <span>NIP. 13xxxxxxxxxxxx</span>
                </div>
            </div>
        </div>
@endsection

@push('js')
<script>
    window.print();
    function myFunction(){
        window.close();

    }

</script>
    
@endpush