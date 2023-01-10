<?php


class CalendarManager
{

    private $teams = [
        "Ливерпуль",
        "Челси",
        "Тоттенхэм Хотспур",
        "Арсенал",
        "Манчестер Юнайтед",
        "Эвертон",
        "Лестер Сити",
        "Вест Хэм Юнайтед",
        "Уотфорд",
        "Борнмут",
        "Бернли",
        "Саутгемптон",
        "Брайтон энд Хоув Альбион",
        "Норвич Сити",
        "Шеффилд Юнайтед",
        "Фулхэм",
        "Сток Сити",
        "Мидлсбро",
        "Суонси Сити",
        "Дерби Каунти"
    ];

    public function createTours()
    {


        shuffle($this->teams);

        $teamsCount = count($this->teams);
        $halfTour = ($teamsCount - 1);
        $totalTours = $halfTour * 2;
        $matchesPerTour = $teamsCount / 2;
        $matches = [];
        $tours = [];
        $home = 0;
        $away = 0;
        $swap = 0;
        for ($round = 0; $round < $totalTours; $round++) {
            $matches = [];
            for ($match = 0; $match < $matchesPerTour; $match++) {
                $home = ($round + $match) % ($teamsCount - 1);
                $away = ($teamsCount - 1 - $match + $round) % ($teamsCount - 1);
                if ($match === 0) {
                    $away = $teamsCount - 1;
                }
                if ($round % 2 === 0) {
                    $swap = $home;
                    $home = $away;
                    $away = $swap;
                }

                $matches[] = [$this->teams[$home], $this->teams[$away], $home, $away];
            }
            $tours[] = $matches;
        }

        return $tours;
    }
}
