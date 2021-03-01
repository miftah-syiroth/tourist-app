<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $attributes = $request->validate([
            'title' => 'required|string',
            'categories' => 'required|array',
            'content' => 'required|string',
            'images.0' => 'image|required',
            'images.1' => 'image|required',
            'images.2' => 'image|required',
        ]);

        /** buat index slug pada array attribut dari title */
        $attributes['slug'] = Str::of($attributes['title'])->slug('-');

        /**input ke dalam tabel artikel*/
        $article = Auth::user()->articles()->create($attributes);

        /**masukkan sebuah category default lalu insert dalam database */
        array_push($attributes['categories'], '5');
        $article->categories()->attach($attributes['categories']);

        /** simpan semua input gambar ke dalam storage dan ambil path ke dalam array images */
        foreach ($attributes['images'] as $key => $image) {
            $article->images()->create([
                'image' => $image->store('images/article'),
            ]);
        }

        return redirect('/dashboard/articles')->with('status', 'Berhasil ditambahkan');
    }

    public function edit(Article $article)
    {
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
        /** VALIDASINYA MASIH ERROR, MASIH BISA LOLOS */
        $attributes = $request->validate([
            'title' => 'required|string',
            'categories' => 'required',
            'content' => 'required|string',
            'images' => 'image',
        ]);

        /** update aja dulu artikelnya, image dan kategori tidak termasuk fillable model */
        $article->update($attributes);

        /**tambahkan category default id 5, sinkronisasi untuk tabel many to many */
        array_push($attributes['categories'], '5');
        $article->categories()->sync($attributes['categories']);

        /**jika ada input gambar, maka kita hapus dulu gambar di storage lalu ubah 
         * databasenya berdasarkan id_gambar pada koleksi
         */
        if (Arr::exists($attributes, 'images')) {

            foreach ($attributes['images'] as $key => $image) {

                $row = ArticleImage::find($key);

                /**hapus file di storage berdasarkan id baris gambar */
                Storage::delete($row->image);

                $row->update([
                    'image' => $image->store('images/article'),
                ]);
            }
        }

        return redirect('/dashboard/articles');
    }

    /**
     * 1. hapus dulu file di storage
     */
    public function destroy(Article $article)
    {
        /**1 */
        $images = $article->images;

        foreach ($images as $key => $image) {
            Storage::delete($image->image);
        }

        $article->delete();

        return redirect()->back();
    }
}
