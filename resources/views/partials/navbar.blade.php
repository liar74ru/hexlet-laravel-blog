<style>
.nav {
    background: white;
    padding: 1rem 0;
    border-bottom: 1px solid #e1e8ed;
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.nav-list {
    list-style: none;
    display: flex;
    gap: 2rem;
    margin: 0;
    padding: 0;
}

.nav-link {
    text-decoration: none;
    color: #2c3e50;
    font-weight: 500;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #3498db;
}

/* Адаптивность для мобильных */
@media (max-width: 768px) {
    .nav-list {
        flex-direction: column;
        gap: 1rem;
    }
    
    .nav-container {
        padding: 0 1rem;
    }
}
</style>
<nav class="nav">
    <div class="nav-container">
        <ul class="nav-list">
            <li>
                <a href="{{ route('welcome') }}" class="nav-link">Главная</a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="nav-link">О проекте</a>
            </li>
            <li>
                <a href="{{ route('articles.index') }}" class="nav-link">Список статей</a>
            </li>
            <li>
                <a href="{{ route('articles.create') }}" class="nav-link">Создать статью</a>
            </li>
        </ul>
    </div>
</nav>