<div class="form-field">
    {{ html()->label('Название', 'name') }}
    {{ html()->input('text', 'name', old('name', $article->name ?? '')) }}
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-field">
    {{ html()->label('Текст статьи', 'body') }}
    {{ html()->textarea('body', old('body', $article->body ?? '')) }}
    @error('body')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

{{-- Кнопки действий --}}
<div class="form-actions">
    @if(isset($article) && $article->exists)
        {{ html()->submit('Обновить')->class('submit-btn') }}
        <a href="{{ route('articles.show', $article) }}" class="cancel-btn">Отмена</a>
    @else
        {{ html()->submit('Создать')->class('submit-btn') }}
        <a href="{{ route('articles.index') }}" class="cancel-btn">Отмена</a>
    @endif
</div>