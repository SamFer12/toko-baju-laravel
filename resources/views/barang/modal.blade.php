<div class="modal fade" id="modalBarang">
    <div class="modal-dialog">
        <form action="/barang" method="POST"
            class="modal-content">
            @csrf
            <div class="modal-header">
                <h5>Tambah Barang</h5>
            </div>
            <div class="modal-body">
                <input type="text"
                    name="kode_barang"
                    class="form-control mb-2"
                    placeholder="Kode Barang">
                <input type="text"
                    name="nama_barang"
                    class="form-control mb-2"
                    placeholder="Nama Barang">
                <input type="text"
                    name="kategori"
                    class="form-control mb-2"
                    placeholder="Kategori">
                <input type="number"
                    name="harga_beli"
                    class="form-control mb-2"
                    placeholder="Harga Beli">
                <input type="number"
                    name="harga_jual"
                    class="form-control mb-2"
                    placeholder="Harga Jual">
                <input type="number"
                    name="stok"
                    class="form-control mb-2"
                    placeholder="Stock">
                <select name="supplier_id"
                    class="form-control">
                    @foreach($supplier as $s)
                    <option value="{{ $s->id }}">
                        {{ $s->nama_supplier }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>