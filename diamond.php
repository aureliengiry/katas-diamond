<?php


$alphabet = array(
    'a',
    'b',
    'c',
    'd',
    'e',
    'f',
    'g',
    'h',
    'i',
    'j',
    'k',
    'l',
    'm',
    'n',
    'o',
    'p',
    'q',
    'r',
    's',
    't',
    'u',
    'v',
    'w',
    'x',
    'y',
    'z'
);

function alphaToNum($alphabet, $letter)
{
    $alphaFlip = array_flip($alphabet);

    if (isset($alphaFlip[$letter])) {
        return $alphaFlip[$letter];
    } else {
        return new Exception("Character {$letter} not found");
    }
}

/**
 * Build display for each row
 *
 * @param $alphabet
 * @param $middleColumn
 * @param $numRow
 * @param $numCol
 *
 * @return string
 */
function buildRow($alphabet, $middleColumn, $numRow, $nbColumnsMax)
{
    $output = '';
    for ($numCol = 0; $numCol <= $nbColumnsMax; $numCol++) {
        if ($numRow === 0) {
            if ($numCol == $middleColumn) {
                $output .= $alphabet[$numRow];
            } else {
                $output .= ' ';
            }
        } else {
            if (($numCol < $middleColumn && $numCol == $middleColumn - $numRow)
                || ($numCol > $middleColumn && $numCol == $middleColumn + $numRow)
            ) {
                $output .= $alphabet[$numRow];
            } else {
                $output .= ' ';
            }
        }
    }

    return $output;
}

/**
 * Build display of diamond
 *
 * @param $alphabet
 * @param $limit
 *
 * @return string
 */
function display($alphabet, $limit)
{
    $output = '';
    $nbColumnsMax = $limit * 2 + 1;
    $middleColumn = round($nbColumnsMax / 2) - 1;

    // Upper part of the diamond
    for ($row = 0; $row <= $limit; $row++) {
        $output .= buildRow($alphabet, $middleColumn, $row, $nbColumnsMax);
        $output .= "\n";
    }

    // Lower part of the diamond
    for ($row = $limit - 1; $row >= 0; $row--) {
        $output .= buildRow($alphabet, $middleColumn, $row, $nbColumnsMax);
        $output .= "\n";
    }

    return $output;
}

$letter = $argv[1];
$num = alphaToNum($alphabet, $letter);
echo display($alphabet, $num);



