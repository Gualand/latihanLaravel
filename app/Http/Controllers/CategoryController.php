<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\directoryExists;

class CategoryController extends Controller
{
    public function create() {
        return view('page.category.create');
    }

    public function store(Request $request){

        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
        ],
        [
            'categoryName.required' => 'Nama kategori tidak boleh kosong!',
            'categoryDescription.required' => 'Deskripsi kategori harus diisi!',
        ]);

        DB::table('category')->insert([
            'categoryName' => $request->input('categoryName'),
            'categoryDescription' => $request->input('categoryDescription'),
        ]);

        return redirect('/category');
    }

    public function index() {
        $categories = DB::table('category')->get();
        return view('page.category.index', ['categories' => $categories]);
    }

    public function detail($id) {
        $detailCategory = DB::table('category')->where('id', $id)->first();

        return view('page.category.detail', ['detailCategory' => $detailCategory]);
    }

    public function edit($id) {
        $detailCategory = DB::table('category')->where('id', $id)->first();

        return view('page.category.edit', ['detailCategory' => $detailCategory]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
        ],
        [
            'categoryName.required' => 'Nama kategori tidak boleh kosong!',
            'categoryDescription.required' => 'Deskripsi kategori harus diisi!',
        ]);

        DB::table('category')
              ->where('id', $id)
              ->update([
                'categoryName' => $request->input('categoryName'),
                'categoryDescription' => $request->input('categoryDescription')
            ]);
            return redirect('/category');
    }

    public function delete($id) {
        DB::table('category')->where('id', $id)->delete();
    
        return redirect('/category');
    }
}
