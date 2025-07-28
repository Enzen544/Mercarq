<?php

if (!function_exists('format_cop_price')) {
    /**
     
     *
     * @param float|int $
     * @return string 
     */
    function format_cop_price($price)
    {
        $price = (float) $price;

        if ($price == 0) {
            return 'GRATUITO';
        }

        
        if (abs($price - floor($price)) > 0.000001) {
            return '$' . number_format($price, 2, ',', '.') . ' COP';
        }

        return '$' . number_format($price, 0, ',', '.') . ' COP';
    }
}

if (!function_exists('format_cop_price_simple')) {
    /**
     * 
     * 
     *
     * @param float|int 
     * @return string 
     */
    function format_cop_price_simple($price)
    {
   
        $price = (float) $price;

        if ($price == 0) {
            return 'GRATUITO';
        }
   
        return '$' . number_format($price, 4, ',', '.') . ' COP';
    }
}


/*
"autoload": {
    "files": [
        "app/helpers.php"
    ]
}
*/

?>