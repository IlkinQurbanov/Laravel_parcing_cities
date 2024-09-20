<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас - {{ session('selected_city') ? session('selected_city')->name : 'Не выбран' }}</title>
</head>
<body>
    <header>
        <h1>Выбранный город: {{ session('selected_city') ? session('selected_city')->name : 'Не выбран' }}</h1>
    </header>
    <main>
        <h2>О нас</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum.</p>
    </main>
</body>
</html>
