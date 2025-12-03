@extends('layouts.app')

@section('content')
    <div class="simple-form">
        <h2 class="mystyleH1">Новая статья</h2>
        
        {{ html()->modelForm($article, 'POST', route('articles.store'))->open() }}    
        @include('articles.form')   
        {{ html()->closeModelForm() }}
    </div>
@endsection