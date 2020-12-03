<?php

/**
 * Check if a string has some html tags
 * Exemple: '<p>My string</p>' => true
 * @param  string $string
 * @param  string $exeptions
 */
if (!function_exists('has_html'))
{
  function has_html(string $string, string $exeptions = null)
  {
      if($exeptions)
      {
        $regex = "/<(?!(?:".$exeptions.")\b)([\w]+)([^>]*>)?/";
      } else {
        $regex = "/<([\w]+)([^>]*>)?/";
      }

      return preg_match($regex,$string,$m) != 0;
  }
}
