<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <title>Date Calculator</title>
</head>
<body>
    <div id="app">
        <form>
            <input type="text" v-model="date1" placeholder="dd.mm.yyyy" class="form-control" />
            <input type="text" v-model="date2" placeholder="dd.mm.yyyy" class="form-control" />
            <button type="button" v-on:click="calculate" class="btn btn-success">Рассчитать</button>
            <button type="button" v-on:click="clear" class="btn btn-success">Сбросить</button>    
        </form>
        @verbatim
        <h1 v-if="error"> {{ error }}</h1>
        <ul v-else>
            <li v-for="(result, key) in results.data">
                    Между {{ result.date1 }} и {{ result.date2 }} годы: {{ result.yearsDifference }}, месяцы: {{ result.monthsDifference }}, дни: {{ result.daysDifference }}
            </li>
        </ul>
        @endverbatim
    </div>
    <script src="{{ mix('js/app.js')}}"></script>
</body>
</html>