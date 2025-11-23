@extends('layouts.app')

@section('content')
    <style>
        .article-item {
            margin-bottom: 2rem;
            padding: 1rem;
            border-left: 4px solid #3498db;
        }
        
        .article-item h2 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .article-item a {
            text-decoration: none;
        }
        
        .article-item a:hover h2 {
            color: #db3434ff;
        }
        
        .article-body {
            color: #7f8c8d;
            line-height: 1.6;
        }
        
        .search-form {
            margin-bottom: 2rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .search-form input[type="text"] {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 0.5rem;
        }
        
        .search-form input[type="submit"] {
            padding: 0.5rem 1rem;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .pagination {
            margin-top: 2rem;
            text-align: center;
        }
    </style>

    <div class="search-form">
        {!! html()->form('GET', route('articles.index'))->open() !!}
            {!! html()->input('text', 'q', $q ?? '')->placeholder('Поиск статей...') !!}
            {!! html()->submit('Найти') !!}
        {!! html()->form()->close() !!}
    </div>
    
    <h1>Список статей</h1>
    
    @foreach ($articles as $article)
        <div class="article-item">
            <a href="{{ route('articles.show', ['id' => $article->id]) }}">
                <h2>{{ $article->name }}</h2>
            </a>
            <div class="article-body">
                {{ Str::limit($article->body, 200) }}
            </div>
        </div>
    @endforeach
    
    <div class="pagination">
        {{ $articles->links() }}
    </div>
@endsection