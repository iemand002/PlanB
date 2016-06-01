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

/**
 * @param $formParamsArray
 * @param string $label
 * @param string $submitClasses
 * @param string $submitIconClasses
 * @return string
 */
function delete_form($formParamsArray, $label = 'Verwijder', $submitClasses = 'btn btn-danger', $submitIconClasses = 'fa fa-trash-o')
{
    $form = Form::open(array_merge(['method' => 'delete'], $formParamsArray));
    $form .= "<button type='submit' class='$submitClasses'><i class='$submitIconClasses' aria-hidden='true'></i> $label</button>";
    return $form .= Form::close();
}
function reset_form($email)
{
    $form = Form::open(['method' => 'post','route'=> 'admin.reset-wachtwoord','class'=>'form-inline']);
    $form.=Form::hidden('email',$email);
    $form .= "<button type='submit' class='btn btn-xs btn-default'><i class='fa fa-lock' aria-hidden='true'></i> Reset wachtwoord</button>";
    return $form .= Form::close();
}