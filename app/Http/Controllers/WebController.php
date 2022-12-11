<?php

namespace App\Http\Controllers;

use App\Models\StaticElement;
use App\Models\Article;
use App\Models\Regency;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $about = StaticElement::find(1);
        preg_match('/^([^.!?]*[.!?]+){0,2}/', strip_tags($about->contents), $about);
        $regencies = Regency::whereHas('patients')->withCount('patients')->get();
        $articles = Article::latest()->category(2)->take(3)->get();
        return view('web.index', [
            'about'     => $about,
            'articles'  => $articles,
            'regencies' => $regencies,
        ]);
    }

    public function about()
    {
        $abouts = StaticElement::get();
        $profilFig = array(
            'image'     => "img/sekawans.jpg",
            'caption'   => "Sekawan'S TB bersama mahasiswa magang MSIB dan pasien sembuh pada kegiatan FGD 3 November 2022",
        );
        return view('web.tentang', [
            'profile'   => $abouts->find(1),
            'figure'    => $profilFig,
            'visimisi'  => $abouts->find(2),
            'structure' => $abouts->find(3)
        ]);
    }

    public function article()
    {
        $category = request()->segments()[0];
        match ($category) {
            'info-tbc'  => [
                $infos = Article::orderBy("id", "asc")->category(1)->get()->paginate(6),
                $view = view('web.infotbc', ['infos' => $infos])
            ],
            'artikel'   => [
                $articles = Article::orderBy("id", "asc")->category(2)->get()->paginate(12),
                $view = view('web.artikel', ['articles' => $articles])
            ],
            'kegiatan'  => [
                $actions = Article::orderBy("id", "asc")->category(3)->get()->paginate(12),
                $view = view('web.kegiatan', ['actions' => $actions])
            ]
        };
        return $view;
    }

    public function showArticle(Article $article)
    {
        $category = request()->segments()[0];
        return match ($category) {
            'info-tbc'  => view('web.showInfotbc', ['info' => $article]),
            'artikel'   => view('web.showArtikel', ['article' => $article]),
            'kegiatan'  => view('web.showKegiatan', ['action' => $article])
        };
    }

    public function case()
    {
        // jumlah patient tiap status di tiap regency
        $regencies = Regency::count('status')->get();
        return view('web.kasustbc', [
            'regencies' => $regencies,
        ]);
    }

    public function showCase(Regency $regency)
    {
        $regency = Regency::count('detailStatus')->find($regency->id);

        if (!$regency) {
            abort(404);
        }

        return view('web.showKasustbc', compact('regency'));
    }

    public function liveSearch(Request $request)
    {
        if ($request->ajax()) {
            $results = match ($request->target) {
                'info-tbc'  => $this->articleSearch(1, $request->search),
                'artikel'   => $this->articleSearch(2, $request->search),
                'kegiatan'  => $this->articleSearch(3, $request->search),
                default     => []
            };
        }
        return $results;
    }

    private function articleSearch($id, $search)
    {
        return Article::latest()->category($id)->where('title', 'like', '%' . $search . '%')->get();
    }
}
