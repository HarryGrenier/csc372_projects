<?php
// Check if a text input is between a min and max character count
function is_valid_text($text, $min = 2, $max = 50) {
    $text = trim($text);
    $length = strlen($text);
    return ($length >= $min && $length <= $max && preg_match("/^[a-zA-Z\s'-]+$/", $text));
}

// Check if a number input is a number and within a range
function is_valid_number($number, $min = 18, $max = 100) {
    return is_numeric($number) && $number >= $min && $number <= $max;
}

// Check if the selected option is valid
function is_valid_option($option, $valid_options) {
    return in_array($option, $valid_options);
}
?>
