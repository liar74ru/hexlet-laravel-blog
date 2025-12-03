@extends('layouts.app')

@section('content')
    <div class="article-simple">
        <a href="{{ route('articles.index') }}" class="back-link">← Назад к статьям</a>
        <h1>{{ $article->name }}</h1>
        <div class="content">
            {!! nl2br(e($article->body)) !!}
        </div>
        {!! html()->form('GET', route('articles.edit', $article->id))->open() !!}
                {!! html()->submit('Редактировать')->class('submit-btn') !!}
        {!! html()->form()->close() !!}
        {!! html()->form('DELETE', route('articles.destroy', $article->id))->open() !!}
                {!! html()->submit('Удалить')->class('delete-btn') !!}
        {!! html()->form()->close() !!}
    </div>
@endsection