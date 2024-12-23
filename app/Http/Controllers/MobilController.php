<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = Mobil::where('nama', 'like', "%$katakunci%")
                ->orWhere('bahan_bakar', 'like', "%$katakunci%")
                ->orWhere('asal_negara', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Mobil::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('Mobil.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('bahan_bakar', $request->bahan_bakar);
        Session::flash('asal_negara', $request->asal_negara);

        $request->validate([
            'nama' => 'required|unique:Mobil,nama',
            'bahan_bakar' => 'required',
            'asal_negara' => 'required',
        ], [
            'nama.required' => 'NIM wajib diisi',
            'nama.unique' => 'NIM yang diisikan sudah ada dalam database',
            'bahan_bakar.required' => 'Nama wajib diisi',
            'asal_negara.required' => 'Jurusan wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'bahan_bakar' => $request->bahan_bakar,
            'asal_negara' => $request->asal_negara,
        ];
        Mobil::create($data);
        return redirect()->to('Mobil')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mobil::where('nama', $id)->first();
        return view('Mobil.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'bahan_bakar' => 'required',
            'asal_negara' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'bahan_bakar' => 'Bahan Bakar wajib diisi',
            'asal_negara.required' => 'Jurusan wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'bahan_bakar' => $request->bahan_bakar,
            'asal_negara' => $request->asal_negara,
        ];
        Mobil::where('nama', $id)->update($data);
        return redirect()->to('Mobil')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mobil::where('nama', $id)->delete();
        return redirect()->to('Mobil')->with('success', 'Berhasil melakukan delete data');
    }
}
