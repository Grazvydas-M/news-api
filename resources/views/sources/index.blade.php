@extends('layouts.app')

<table class="table">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($sources as $sourceList)
        @foreach($sourceList as $source)
            <tr>
                <td>{{ $source->name }}</td>
                <td>{{ $source->description }}</td>
                <td><a href="{{ route('articles.index', $source->id) }}" class="btn btn-success" style="margin: 3px">All Articles</a></td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
