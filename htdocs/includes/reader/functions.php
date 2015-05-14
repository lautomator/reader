<?php

// Reader functions

$reader_date = date('m/d/y');

// convert a long block of text into paragraphs
function format_paragraphs($text)
{
    // Remove brackets and anything within them from Wiki text.
    $text = preg_replace('/\[\w+\]+/', '', $text);

    // Trim the text.
    $text = trim($text);

    return '<p>' . preg_replace('/[\r\n]+/', '</p><p>', $text . '</p>');
}

// range of years for the copyright notice
function copyrightYears()
{
    $startYear = 2015;
    $currentYear = date('Y');
    if ($startYear == $currentYear) {

        $years = $startYear;

    } else {

        $years = $startYear . "&ndash;" . $currentYear;
    }
    return $years;
}
