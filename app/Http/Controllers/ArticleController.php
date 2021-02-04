<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('article.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * fungsi create mengirimkan semua baris kategoru yang akan digunakan untuk
     * multiple select ketika pembuatan artikel. Fungsi ini mengembalikan ke halaman
     * pembuatan artikel baru
     */
    public function create()
    {
        /** id 5 itu default kategori untuk semua artikel, tidak dipilih/dihapus/diedit */
        $categories = Category::where('id', '!=', '5')->get();

        return view('article.create', [
            'categories' => $categories,
        ]);
    }

    /** fungsi simpan article baru */
    public function store(Request $request)
    {
        /** buat validasi untuk setiap input form */
        $attribute = $request->validate([
            'title' => 'required|string',
            'categories' => 'required',
            'categories' => 'array|required',
            'content' => 'required|string',
            'images.*' => 'image',
            'images.0' => 'required',
            'images.1' => 'required',
            'images.2' => 'required',
        ]);

        /** buat index slug pada array attribut dari title */
        $attribute['slug'] = Str::of($attribute['title'])->slug('-');

        /** masukkan categoru default atau kategori dengan id 5 */
        array_push($attribute['categories'], '5');

        /**input ke dalam database*/
        $article = Auth::user()->articles()->create($attribute);

        /**simpan ke dalam tabel kategori */
        $article->categories()->attach($attribute['categories']);

        /** simpan semua input gambar ke dalam storage dan ambil path ke dalam array images */
        foreach ($attribute['images'] as $key => $image) {
            $article->images()->create([
                'image' => $image->store('images/article'),
            ]);
        }

        return redirect('/dashboard/articles')->with('status', 'Berhasil ditambahkan');
    }

    public function edit(Article $article)
    {
        return abort(404);
        /** id 5 itu default kategori untuk semua artikel, tidak dipilih/dihapus/diedit */
        $categories = Category::where('id', '!=', '5')->get();

        return view('article.edit', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Article $article)
    {
        /** buat validasi untuk setiap input form */
        $attribute = $request->validate([
            'title' => 'required|string',
            'categories' => 'required',
            'categories' => 'array|required',
            'content' => 'required|string',
            'images.*' => 'image',
            'images.0' => 'required',
            'images.1' => 'required',
            'images.2' => 'required',
        ]);

        /** update aja dulu artikelnya */
        $article->update($attribute);

        /**sinkronisasi kategori sebelumnya dengan yg dipilih. id yang tidak ada dlm array akan dihapus */
        $article->categories()->sync($attribute['categories']);

        /**hapus gambar terdahulu lalu input yg baru */
        $images = $article->images;
        foreach ($images as $key => $image) {
            Storage::delete($image->image);
        }
        $article->images()->delete();

        foreach ($attribute['images'] as $key => $image) {
            $article->images()->create([
                'image' => $image->store('images/article'),
            ]);
        }

        return redirect('/dashboard/articles');
    }

    /**
     * 1. hapus dulu file di storage
     * 2. hapus kategori ditabel antara. untuk siap2 barangkali onDelete cascade ga berfungsi
     */
    public function destroy(Article $article)
    {
        /**1 */
        $images = $article->images;
        foreach ($images as $key => $image) {
            Storage::delete($image->image);
        }

        /**2 */
        $article->categories()->detach();
        $article->delete();

        return redirect()->back();
    }
}
