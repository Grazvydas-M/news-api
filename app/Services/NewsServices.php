<?php

namespace App\Services;

use jcobhams\NewsApi\NewsApi;

class NewsServices
{
    public NewsApi $newsApi;

    public function __construct(NewsApi $newsApi)
    {
        $this->newsApi = $newsApi;
    }

    public function getSources(): array
    {
        $sources[] = $this->newsApi->getSources(null, 'en')->sources;

        return $sources;
    }

    public function getArticles(string $source, string $title = null): array
    {
        $articles[] = $this->newsApi->getEverything($title, $source)->articles;

        return $articles;
    }
}
