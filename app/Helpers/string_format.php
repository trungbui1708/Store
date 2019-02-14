<?php 
	function shorten_string($string, $wordsreturned)
    {
        $retval = $string;
        $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
        $string = str_replace("\n", " ", $string);
        $array = explode(" ", $string);
            if (count($array)<=$wordsreturned)
            {
                $retval = $string;
            }
            else
            {
                array_splice($array, $wordsreturned);
                $retval = implode(" ", $array)." ...";
            }
        return $retval;
    }
    function discount($price,$pr_discount)
    {
        $discount = $pr_discount;
        $price = $price - ($price * $discount / 100);
        return number_format($price);
    }
?>