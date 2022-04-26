<?php

class FormatorGenerator {
    public static function genInt($len){
        $seed = str_split('0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, $len) as $k) $rand .= $seed[$k];

        return $rand;
    }

    public static function genChar($len){
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, $len) as $k) $rand .= $seed[$k];

        return $rand;
    }

    /**
     * Récupère la date (16 Février 2019)
     *
     * @param [type] $date
     * @return void
     */
    public static function formatDate($date) {
        $date = strtotime($date);
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        $month = str_replace($english_months, $french_months, date('F', $date));
        $date = date('d', $date) . " " . $month . " " . date('Y', $date);

        return $date;
    }

    /**
     * Récupère l'heure (15h12)
     *
     * @param [type] $date
     * @return void
     */
    public static function getHeure($date)
    {
        $date = strtotime($date);
        $date = date('H \h i', $date);

        return $date;
    }

    /**
     * Récupère le "Il y a"
     * @param $ok : date
     */
    public static function getTime($ok)
    {
        $date = strtotime($ok);
        $now = date("U");
        // > 1 Semaine
        if(($now - $date) / 60 / 60 / 24 / 7 >= 1) $date = "Le " . Other::getDate($ok);
        // >= 1 Jour & <= 1 Semaine
        else if(($now - $date) / 60 / 60 / 24 >= 1)
        {
            $date = round(($now - $date) / 60 / 60 / 24);
            $date = "Il y a " . $date . "j";
        }
        // < 1 Jour & >= 1 Heure
        else if(($now - $date) / 60 / 60 >= 1)
        {
            $date = round(($now - $date) / 60 / 60);
            $date = "Il y a " . $date . "h";
        }
        // < 1 Heure & >= 1 minute
        else if(($now - $date) / 60 >= 1)
        {
            $date = round(($now - $date) / 60);
            $date = "Il y a " . $date . "m";
        }
        else
        {
            $date = $now - $date;
            $date = "Il y a " . $date . "s";
        }
        return $date;
    }

}