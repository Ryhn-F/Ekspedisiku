<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SopirStoreRequest;
use App\Http\Requests\SopirUpdateRequest;
use App\Models\Sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SopirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sopirs = Sopir::latest()->get();

        return view('Admin.Sopir.index',compact('sopirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
return view('Admin.Sopir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SopirStoreRequest $request)
    {
        $data = $request->validated();

        // List of file fields to be saved
        $fileFields = ['kartu_sim', 'foto_surat', 'foto_kendaraan', 'foto_sertim', 'foto_sopir'];

        // Iterate over each file field and check if it's present before storing
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('assets/sopir', 'public');
            }
        }

        // Create the Sopir record
        Sopir::create($data);

        return redirect()->route('sopir.index')->with([
            'message'=> 'Data sukses di buat!',
            'alert-type'=> 'success'
           ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Sopir $sopir)
    {
            return view('Admin.Sopir.detail',compact('sopir'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sopir $sopir)
    {
        return view('Admin.Sopir.edit',compact('sopir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SopirUpdateRequest $request, Sopir $sopir)
    {
        $fileFields = ['kartu_sim', 'foto_surat', 'foto_kendaraan', 'foto_sertim', 'foto_sopir'];

        if ($request->validated()){
            $sopir->update($request->validated());


        }


       return redirect()->route('sopir.index')->with([
        'message'=> 'Data sukses di edit!',
        'alert-type'=> 'success'
       ]);



    }
    public function updateImage(Request $request , $sopirId){
        $fileFields = ['kartu_sim', 'foto_surat', 'foto_kendaraan', 'foto_sertim', 'foto_sopir'];
        $sopir = Sopir::findOrFail($sopirId);

        // Validate only the files that are present in the request
        $request->validate([
            'kartu_sim'=>'nullable|image',
            'foto_kendaraan'=>'nullable|image',
            'foto_sopir'=>'nullable|image',
            'foto_sertim'=>'nullable|image',
            'foto_surat'=>'nullable|image'
        ]);

        // Delete the old file for each field only if it exists in the request
        foreach ($fileFields as $field){
            if($request->hasFile($field)){
                Storage::delete('public/' . $sopir->$field);
            }
        }

        // Store the new file for each field only if it exists in the request
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $sopir[$field] = $request->file($field)->store('assets/sopir', 'public');
            }
        }

        // Save the changes
        $sopir->save();


        return redirect()->route('sopir.index')->with([
            'message'=> 'Data sukses di edit!',
            'alert-type'=> 'success'
           ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sopir $sopir)
    {
        $fileFields = ['kartu_sim', 'foto_surat', 'foto_kendaraan', 'foto_sertim', 'foto_sopir'];

        foreach ($fileFields as $field) {
            // Check if the field is not empty
            if ($sopir->$field && Storage::exists('public/' . $sopir->$field)) {
                // Delete the file from storage
                Storage::delete('public/' . $sopir->$field);
            }
        }

        // Delete the Sopir record from the database
        $sopir->delete();

        return redirect()->back()->with([
            'message' => 'Data Berhasil dihapus',
            'alert-type' => 'success'
        ]);
    }



}
