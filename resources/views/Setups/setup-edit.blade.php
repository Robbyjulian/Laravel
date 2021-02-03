<div class="form-group row"> 
    <input type="hidden" value="{{ $setup->id}}" id="id_data" name="id">
    <label for="input-10" class="col-sm col-form-label">Jumlah Hari Kerja </label>
         <div class="col-sm-4">
            <input type="text" class="form-control input-hari-kerja" id="jumlah_hari_kerja" name="jumlah_hari_kerja" value="{{ $setup->jumlah_hari_kerja}}">
            <span class="text-danger ml-2">
                <i id="hari-kerja-error"></i>
            </span>
        </div>
    <label for="input-11" class="col-sm col-form-label">Nama Aplikasi</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-nama-aplikasi" id="nama_aplikasi" name="nama_aplikasi" value="{{ $setup->nama_aplikasi}}">
            <span class="text-danger ml-2">
                <i id="nama-aplikasi-error"></i>
            </span>
        </div>
</div> 


