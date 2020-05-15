<?php

use Illuminate\Support\Str;

/**
 * Return a string with array as dot notation
 * Exemple: myfield[one][name] => myfield.one.name
 * @param  string s$tring
 */
if (!function_exists('array_to_dot'))
{
  function array_to_dot(string $string)
  {
      return (string)Str::of($string)->replace('[]', '')->replace('[', '.')->replace(']', '');
  }
}
