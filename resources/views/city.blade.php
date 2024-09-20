<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Город: {{ $selectedCity->name }}</title>
</head>
<body>
    <header>
        <h1>
            Выбранный город: 
            {{ session('selected_city') ? session('selected_city')->name : 'Не выбран' }}
        </h1>
    </header>
    <h2>Навигация по выбранному городу:</h2>
    <ul>
        <li>
            <a href="{{ url($selectedCity->slug . '/news') }}">Новости</a>
        </li>
        <li>
            <a href="{{ url($selectedCity->slug . '/about') }}">О нас</a>
        </li>
    </ul>
    <main>
        <h2>Список городов:</h2>
        <ul>
            @foreach($cities as $cityItem)
                <li>
                    <a href="{{ url($cityItem->slug) }}" 
                       @if(session('selected_city') && session('selected_city')->slug == $cityItem->slug) 
                            style="font-weight:bold;" 
                       @endif>
                       {{ $cityItem->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Пагинация -->
        {{ $cities->links() }}

        <h2>Навигация по выбранному городу:</h2>
        <ul>
            <li>
                <a href="{{ url($selectedCity->slug . '/news') }}">Новости</a>
            </li>
            <li>
                <a href="{{ url($selectedCity->slug . '/about') }}">О нас</a>
            </li>
        </ul>
    </main>
</body>
</html>
