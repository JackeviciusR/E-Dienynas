<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NationalIdentificationNumberRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // https://lt.wikipedia.org/wiki/Asmens_kodas
        $national_id = strval($value);
//    $rez = function($national_id) {
        $year = (3 == substr($national_id, 0, 1) || 4 == substr($national_id, 0, 1) ? '19' : '20');
//        dd($year);
        $year .= substr($national_id, 1, 2);
        $month = ('00' == substr($national_id, 3, 2) ? '01' : substr($national_id, 3, 2));
        $day = ('00' == substr($national_id, 5, 2) ? '01' : substr($national_id, 5, 2));

        if (preg_match("/^[3-6]{1}\d{10}/", $national_id)) {
            // tikriname ar egzistuoja nurodyta data, ar tai dar esanti/buvusi data, o ne busianti...
            if (checkdate($month, $day, $year) && $year . substr($national_id, 3, 4) <= date('Ymd')) { // 'y' - year(21), 'Y' - year(2021) 'm' - month, 'd' - day
                $numbers = str_split(substr($national_id, 0, 10));
                $K = 0;
                for ($i = 1; $i < 4; $i = $i + 2) {
                    $sum = 0;
                    foreach ($numbers as $key => $n) {
                        $sum += $n * ($key + $i);
                    }
                    if (10 != $sum % 11) {
                        $K = $sum % 11;
                        break;
                    }
                }
                if ($K == substr($national_id, -1)) {
                    return true;
                }
            }
        } elseif (preg_match('/^[9]{1}\d{10}/', $national_id)) {
            if (checkdate($month, $day, $year) && substr($national_id, 1, 6) <= date('ymd')) {
                return true;
            }
        }
        return false;
//    };
//    dd($rez($value));
//        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect national identification number!';
    }
}
