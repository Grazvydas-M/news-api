@extends('layouts.app')

<table class="table">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Date</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <div>
        <h2><i><b>{{$source}}</b></i></h2>
    </div>
    @foreach($articles as $articlesList)
        @foreach($articlesList as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->description }}</td>

                @php
                    $date = new \DateTime($article->publishedAt);
                    $years = $date->format('Y');
                    $day = $date->format('D');
                    $month = $date->format('m');
                    $dateFormat = sprintf('%s %s %s', $years, $day, $month);
                @endphp
                <td style="width: 120px">{{$dateFormat}}</td>
                <td>
                    <img src="{{$article->urlToImage}}" alt="News thumbnail" style="width: 180px; height: 120px">
                </td>
                <td><a href="{{route('article.index', [$source, 'title' => $article->title])}}" target="_blank" class="btn btn-success" style="margin-top: 50%;">Read more</a></td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
