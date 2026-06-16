<div class="modal fade"
    id="modalBarangMasuk">

    <div class="modal-dialog">

        <form
            action="{{ route('barang-masuk.store') }}"
            method="POST"
            class="modal-content">

            @csrf

            <div class="modal-header">
                <h5>Tambah Barang Masuk</h5>
            </div>

            <div class="modal-body">

                <div class="mb-3">

                    <label>Tanggal</label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label>Barang</label>

                    <select
                        name="barang_id"
                        class="form-control">

                        @foreach($barang as $b)

                        <option value="{{ $b->id }}">
                            {{ $b->nama_barang }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Supplier</label>

                    <select
                        name="supplier_id"
                        class="form-control">

                        @foreach($supplier as $s)

                        <option value="{{ $s->id }}">
                            {{ $s->nama_supplier }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Jumlah</label>

                    <input
                        type="number"
                        name="jumlah"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Harga Beli</label>

                    <input
                        type="number"
                        name="harga_beli"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Keterangan</label>

                    <textarea
                        name="keterangan"
                        class="form-control"></textarea>

                </div>

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-primary">

                    Simpan

                </button>

            </div>

        </form>

    </div>
</div>