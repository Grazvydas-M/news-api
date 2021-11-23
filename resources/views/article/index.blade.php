@extends('layouts.app')

<table class="table">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col"></th>
        <th scope="col">Date</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
    <div>
        <h2><i><b></b></i></h2>
    </div>
    <tr>

        <td>{{ $articles->title }}</td>
        <td>
            <img src="{{$articles->urlToImage}}" alt="News thumbnail" ; style="width: 400px; height: 300px">
        </td>
        @php
            $date = new \DateTime($articles->publishedAt);
            $years = $date->format('Y');
            $day = $date->format('D');
            $month = $date->format('m');
            $dateFormat = sprintf('%s %s %s', $years, $day, $month);
        @endphp
        <td style="width: 120px">{{$dateFormat}} </td>
        <td>{{ (substr($articles->content, 0, -14 ))}}
            <a href="{{$articles->url}}" class="btn btn-success" target="_blank">Original article</a>
        </td>
        <td><a href="{{route('sources.index')}}" class="btn btn-success" style="margin-top: 50%;">Home page</a></td>
    </tr>
    </tbody>
</table>
