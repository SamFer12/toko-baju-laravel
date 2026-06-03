<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();

        return view('supplier.index', compact('supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_supplier' => 'required',
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Supplier::create([
            'kode_supplier' => $request->kode_supplier,
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
        ]);

        return redirect()->back()
            ->with('success', 'Supplier berhasil ditambahkan');
    }

    public function destroy(string $id)
    {
        Supplier::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Supplier berhasil dihapus');
    }
}