@extends('layouts.app')

@section('content')
    
    <div class="page-container">
        <div class="search-form">
            {!! html()->form('GET', route('articles.index'))->open() !!}
                {!! html()->input('text', 'q', $q ?? '')->placeholder('Поиск статей...') !!}
                {!! html()->submit('Найти')->class('submit-btn') !!}
            {!! html()->form()->close() !!}
        </div>
        
        <h1 class="mystyleH1">Список статей</h1>
        
        @if($articles->count() > 0)
            <div class="articles-grid">
                @foreach ($articles as $article)
                    <div class="article-card">
                        <a href="{{ route('articles.show', $article->id) }}">
                            <h2>{{ $article->name }}</h2>
                        </a>
                        <div class="article-body">
                            {{ Str::limit($article->body, 150) }}
                        </div>
                        <div class="article-meta">
                            Статья #{{ $article->id }}
                            @if($article->created_at)
                                • {{ $article->created_at->format('d.m.Y') }}
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 3rem; color: #7f8c8d;">
                <h3>Статьи не найдены</h3>
                <p>Попробуйте изменить поисковый запрос</p>
            </div>
        @endif
        @include('components.pagination')
@endsection