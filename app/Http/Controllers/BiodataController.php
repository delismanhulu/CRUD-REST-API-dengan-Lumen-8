<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiodataController extends Controller
{
    // get data
    public function index() 
    {
        $data = Biodata::latest()->get();
        // $data = Biodata::latest()->where('id','22')->get();
        return response()->json([
            'success' => true,
            'message' =>'Data Kosong',
            'data'    => $data
        ], 200);
    }

    // buat detail
    public function show($id)
    
    {
        $biodata = Biodata::find($id);
        if ($biodata) {
            return response()->json([
                'success'   => true,
                'message'   => 'Detail biodata!',
                'data'      => $biodata
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak ditemukan',
            ], 404);
        }
    }

    // simpan
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap'   => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Semua Kolom Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);

        } else {
            $biodata = Biodata::create([
                'nama_lengkap'      => $request->input('nama_lengkap'),
                'alamat'            => $request->input('alamat'),
            ]);

            if ($biodata) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Anda Berhasil Disimpan!',
                    'data' => $biodata
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Biodata Anda Gagal Disimpan!',
                ], 400);
            }

        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap'  => 'required',
            'alamat'        => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Semua Inputan Wajib di isi !',
                'data'      => $validator->errors()
            ],401);

        } else {
            $biodata = Biodata::whereId($id)->update([
                'nama_lengkap'  => $request->input('nama_lengkap'),
                'alamat'        => $request->input('alamat'),
            ]);

            if ($biodata) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil di update',
                    'data' => $biodata
                ], 201);
                
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'biodata Gagal Diupdate!',
                ], 400);
            }
        }
    }

    public function delete($id)
    {
        $biodata = Biodata::whereId($id)->first();
       
        
        if ($biodata != null) {
            $biodata->delete();
            return response()->json([
                'success' => true,
                'message' => 'Biodata Berhasil Dihapus!',
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => ' Gagal di hapus !',
            ], 400);
        }
    
    }

}