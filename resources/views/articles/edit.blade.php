@extends('layouts.app')

@section('content')
    <div class="simple-form">
        <h2 class="mystyleH1">Редактировать статью</h2>
        
        {{ html()->modelForm($article, 'PATCH', route('articles.update', $article))->open() }}    
        @include('articles.form')
        {{ html()->closeModelForm() }}
    </div>
@endsection