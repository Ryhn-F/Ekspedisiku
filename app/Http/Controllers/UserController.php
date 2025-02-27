<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
        public function index(){
            $sopirs = Sopir::latest()->get();
            return view('UserView.home',compact('sopirs'));
        }

        public function show($id){

            $sopir = Sopir::find($id);  // Fetch the record by ID
            if (!$sopir) {
                abort(404, 'Sopir not found');  // Handle the case where the record is not found
            }
            return view('UserView.detail',compact('sopir'));

        }
}
