<div class="modal fade"
    id="modalPenjualan">

    <div class="modal-dialog modal-lg">

        <form
            action="{{ route('penjualan.store') }}"
            method="POST"
            class="modal-content">

            @csrf

            <div class="modal-header">
                <h5>Transaksi Penjualan</h5>
            </div>

            <div class="modal-body">

                <div class="mb-3">

                    <label>Barang</label>

                    <select
                        name="barang_id[]"
                        class="form-control">

                        @foreach($barang as $b)

                        <option
                            value="{{ $b->id }}">

                            {{ $b->nama_barang }}
                            (stok: {{ $b->stok }})

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Jumlah</label>

                    <input
                        type="number"
                        name="jumlah[]"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Total</label>

                    <input
                        type="number"
                        name="total"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Bayar</label>

                    <input
                        type="number"
                        name="bayar"
                        class="form-control">

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