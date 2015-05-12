<?php

// range of years for the copyright notice
function copyrightYears()
{
    $startYear = 2012;
    $currentYear = date('y');
    if ($startYear == $currentYear) {

        echo $startYear;

    } else {

        echo "{$startYear}&ndash;{$currentYear}";
    }
}

?>

<footer>
    <p class="hrule"></p>

    <p class="footerText"><?php print date('m/d/y') ?>
        &emsp;|&emsp;&copy; <?php copyrightYears(); ?>
        John Merigliano
    </p>
</footer>
