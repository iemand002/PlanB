<?php

/**
 * Return sizes readable by humans
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
    @$size[$factor];
}

/**
 * Is the mime type an image
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

function delete_form($formParamsArray, $label = 'Delete', $submitClasses = 'btn btn-danger', $submitIconClasses = 'fa fa-trash-o')
{
    $form = Form::open(array_merge(['method' => 'delete'], $formParamsArray));
    $form .= "<button type='submit' class='$submitClasses'><i class='$submitIconClasses' aria-hidden='true'></i> $label</button>";
    return $form .= Form::close();
}