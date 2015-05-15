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

    return preg_replace('/[\r\n]+/', $text);
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


// make a 'read' connection to the db
// Create the database connection.
function dbConnectRead() {

    $conn = dbConnect('read');

    // Select the databse.
    // INNER will include only the records found with the exact match.
    // LEFT includes every record, even if a matching key is not found.
    $sql = 'SELECT article_id, image_id, title, article, filename, caption,
        DATE_FORMAT(created, "%a, %b, %D, %Y") AS date_created
        FROM blog LEFT JOIN photographs USING (image_id) ORDER BY created DESC';

    $result = $conn->query($sql) or die(mysqli_error());

    return $result;

    // Number of records
    // $numRows = $result->num_rows;
}



