<?php

function mask($var)
{
    $firstChar = substr($var, 0, 1);
    $lastChar = substr($var, -1);
    $middleChars = str_repeat('*', strlen($var) - 2);
    return $firstChar . $middleChars . $lastChar;
}

function getFormatCourseSection($course, $year, $section)
{
    $yearMapping = [
        'FIRST' => 1,
        'SECOND' => 2,
        'THIRD' => 3,
        'FOURTH' => 4,
    ];

    $sectionMapping = [
        'ONE' => 1,
        'TWO' => 2,
        'THREE' => 3,
        'FOUR' => 4,
    ];

    $convertedYear = $yearMapping[$year];
    $convertedSection = $sectionMapping[$section];

    return $course . ' ' . $convertedYear . '-' . $convertedSection;
}

function getFormattedDate($dateString)
{
    $dateTime = new DateTime($dateString);
    $formatedDate = $dateTime->format('F j, Y');
    return $formatedDate;
}

function checkStatus($status)
{
    if ($status === 'OUT') {
        return "text-onSecondary bg-secondary";
    } else {
        return "text-bg-primary";
    }
}


function generateQRCode($qr_text, $qr_size)
{
    $googleChartApiUrl = "https://chart.googleapis.com/chart?chs=" . $qr_size . "x" . $qr_size . "&cht=qr&chl=" . $qr_text . "&choe=UTF-8";
    return $googleChartApiUrl;
}






