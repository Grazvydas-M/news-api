<?php

namespace App\Http\Controllers;

use App\Services\NewsServices;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SourcesController extends Controller
{
    private NewsServices $newsServices;

    public function __construct(NewsServices $newsServices)
    {
        $this->newsServices = $newsServices;
    }

    public function index(): View
    {
        $sources = $this->newsServices->getSources();

        return view('sources.index', ['sources' => $sources]);
    }

    public function articles(string $source)
    {
        $articles = $this->newsServices->getArticles($source);

        return view('articles.index', ['articles' => $articles, 'source' => $source]);
    }

    public function articleData(Request $request)
    {

       return view('article.index',  ['articles' => $request->toArray()]);
    }
}
