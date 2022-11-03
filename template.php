<?php

function renderTemplate($template, $params)
{
    $renderedTemplate = $template;

    // preg_match("/(\{\{[a-zA-Z- _]+\}\})/", $renderedTemplate, $slots);

    // for ($i=0; $i < count($slots); ++$i)
    // {
    //     if (in_array($slots[$i], $params))
    //     {
    //         $renderedTemplate = preg_replace($)
    //     }
    // }
    foreach($params as $key=>$value)
    {
        preg_replace("/(\{\{". $key ."\}\})/", $value, $renderedTemplate);
    }
    return $renderedTemplate;
}