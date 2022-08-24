<?php

namespace App\Handlers;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggerHandler implements LoggerHandlerInterface
{
    public function handle(Request $request):void
    {
        $array = [2, 1, 2, 3, 5, 6, 8 ,1, 12, 15, 18, 1, 2, 3, 4, 6, 13, 15, 17];
        echo 'дан массив: [' . join(",", $array) . '] memory: ' .  memory_get_usage();
        echo '<hr>';
        $datetime = new DateTime();
        $timezone = new DateTimeZone('Europe/Moscow');
        $datetime->setTimezone($timezone);
        $time_start = $datetime->format('d.m.y H:i:s:ms');

        Log::info('Начал работать в ' . $time_start);
        $item = [];
        foreach ($array as $key => $val) {
            $item[] = [$val];
        }
        sort($item);

        $json = json_encode($item);
        echo "после сортировки получаем: " . $json . ' memory: ' .  memory_get_usage();
        sleep(1);

        echo '<hr>';
        $datetimeEnd = new DateTime();
        $timezoneEnd = new DateTimeZone('Europe/Moscow');
        $datetimeEnd->setTimezone($timezoneEnd);
        $time_end = $datetimeEnd->format('d.m.y H:i:s:ms');
        Log::info('Закончил работать в '. $time_end);
    }
}
