<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список городов</title>
</head>
<body>
    <header>
        <h1>Выбранный город: {{ session('selected_city') ? session('selected_city')->name : 'Не выбран' }}</h1>
    </header>
    <main>
        <h2>Выберите город:</h2>
        <ul>
            @foreach($cities as $city)
                <li>
                    <a href="{{ url($city->slug) }}" 
                       @if(session('selected_city') && session('selected_city')->slug == $city->slug) 
                            style="font-weight:bold;" 
                       @endif>
                       {{ $city->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Пагинация -->
        {{ $cities->links() }}
    </main>
</body>
</html>
