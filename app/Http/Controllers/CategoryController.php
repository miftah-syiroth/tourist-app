<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * fungsi ini menyimpan input kategori artikel baru dari halaman
     * pembuatan artikel. request post dilakukan validasi. Lalu simpan
     * menggunkan mass assignment insert data dan redirect kembali ke halaman
     * pembuatan artikel
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|max:20|alpha',
        ]);

        Category::create([
            'category' => $validated['category'],
        ]);

        return redirect()->back();
    }

    /**
     * 1. ambil semua kategori kecuali yang akan diedit dan kategori default. Array akan dilooping pada form pembuatan artikel
     * 2. passing ke view beserta category yang akan diedit
     */
    public function edit(Category $category)
    {
        /**1 */
        $categories = Category::where('id', '!=', $category->id)->where('id', '!=', '5')->get();

        /**2 */
        return view('article.create', [
            'categories' => $categories,
            'categoryUpdated' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category' => 'required|max:20|alpha',
        ]);

        $attribute = $request->all();
        $result = $category->update($attribute);

        return redirect('/dashboard/articles/create');
    }

    /** fungsi untuk menghapus kategori artikel */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('status', 'kategori berhasil dihapus');
    }
}
