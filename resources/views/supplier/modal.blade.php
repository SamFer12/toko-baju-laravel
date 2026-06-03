<div class="modal fade" id="modalSupplier">
    <div class="modal-dialog">

        <form action="{{ route('supplier.store') }}"
              method="POST"
              class="modal-content">

            @csrf

            <div class="modal-header">
                <h5 class="modal-title">
                    Tambah Supplier Baru
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Kode Supplier</label>
                        <input type="text"
                               name="kode_supplier"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Nama Supplier</label>
                        <input type="text"
                               name="nama_supplier"
                               class="form-control"
                               required>
                    </div>

                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              rows="3"
                              required></textarea>
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Telepon</label>
                        <input type="text"
                               name="telepon"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control">
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <button type="submit"
                        class="btn btn-dark">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>