<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function addComent(Request $request, $id){
        $request->validate([
            'name' => 'required'
        ],
        [
            'name.required' => 'Komentar tidak boleh kosong!',
        ]);

        $id_user = Auth::id();

        Komentar::create([
            'name' => $request->input('name'),
            'user_id' => $id_user,
            'post_id' => $id,
        ]);
 
        return redirect('/post/' . $id);
    }
}
