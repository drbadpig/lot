<?php

if (! function_exists('date_format_my')) {
    /**
     * MySql date format to Month, YEAR
     *
     * @param $date
     * @return string
     */
    function date_format_my($date): string
    {
        // months
        $months = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ];

        if ($date == null) return 0;

        // get month in russian
        $month = date('n')-1;

        // reformat to Month, Year
        return $months[$month].date(", Y", strtotime($date));
    }
}

if (! function_exists('thousands_format')) {
    /**
     * Number formatter (1000 - 1k etc)
     *
     * @param $num
     * @return string
     */
    function thousands_format($num): string
    {
        if ($num > 1000) {

            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int)$x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;

        }

        return $num;
    }
}
