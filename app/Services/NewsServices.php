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

    public function getSources()
    {
        $sources[] = $this->newsApi->getSources(null, 'en')->sources;

        return $sources;
    }

    public function getArticles(string $source)
    {
        $articles[] = $this->newsApi->getEverything(null, $source)->articles;

        return $articles;
    }
}
