<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use jcobhams\NewsApi\NewsApi;

class NewsServices
{
    private const ARTICLES_KEY = 'articles';
    private const SOURCES_KEY = 'sources';
    public NewsApi $newsApi;

    public function __construct(NewsApi $newsApi)
    {
        $this->newsApi = $newsApi;
    }

    public function getSources(): array
    {
        if (Cache::has(self::SOURCES_KEY)) {
            return Cache::get(self::SOURCES_KEY, []);
        }
        $sources[] = $this->newsApi->getSources(null, 'en')->sources;
        Cache::put(self::SOURCES_KEY, $sources, 3600);

        return $sources;
    }

    public function getArticles(string $source, string $title = null): array
    {
        if (Cache::has(self::ARTICLES_KEY . $source . $title)) {
            return Cache::get(self::ARTICLES_KEY . $source . $title, []);
        }
        $articles[] = $this->newsApi->getEverything($title, $source)->articles;
        Cache::put(self::ARTICLES_KEY . $source . $title, $articles, 600);

        return $articles;
    }
}
