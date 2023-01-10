<!DOCTYPE html>
<html>

<head>
    <link href="/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>

<body>


    <div class="container pt-5">

        <h1 class="text-muted">Календарь</h1>

        <hr>

        <?php

        require_once "./classes/CalendarManager.class.php";

        const HOME = 0;
        const AWAY = 1;
        const HOME_ID = 2;
        const AWAY_ID = 3;

        $calendarManager = new CalendarManager();

        $tours = $calendarManager->createTours();

        for ($i = 0; $i < count($tours); $i++) { ?>

            <? if ($i === 0) : ?>

                <h2 class="text-muted pt-5">Первая половина</h2>

            <? elseif ($i === 19) : ?>

                <h2 class="text-muted pt-5">Вторая половина</h2>

            <? endif; ?>

            <h3 class="text-muted pt-5">Тур <?= $i + 1 ?></h3>

            <ul class="list-group list-group-flush pt-5">

                <?
                $tourMatches = $tours[$i];

                foreach ($tourMatches as $match) { ?>

                    <li class="list-group-item"><span id="team-<?= $match[HOME_ID] ?>"><?= $match[HOME] ?></span> - <span id="team-<?= $match[AWAY_ID] ?>"><?= $match[AWAY] ?></span></li>


            <? }
            }
            ?>

            </ul>

    </div>

    <script>
        $("span").click(function() {
            $("span").removeClass("bg-warning p-1")
            let id = "span#" + $(this).attr("id")
            $(id).addClass("bg-warning p-1")
        })
    </script>

</body>

</html>