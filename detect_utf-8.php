<?php

function mb_is_utf8($string) {
  return mb_detect_encoding($string, 'UTF-8') === 'UTF-8';
}

function preg_is_utf8($string) {
  return preg_match('/^.*$/u', $string) > 0; // preg_match('/^./u', $string)
}

function is_utf8_1($str) {
  $c = 0;
  $b = 0;
  $bits = 0;
  $len = strlen($str);
  for ($i=0; $i<$len; $i++) {
    $c = ord($str[$i]);

    if ($c > 128) {
      if ($c >= 254) return false;
      elseif ($c >= 252) $bits = 6;
      elseif ($c >= 248) $bits = 5;
      elseif ($c >= 240) $bits = 4;
      elseif ($c >= 224) $bits = 3;
      elseif ($c >= 192) $bits = 2;
      else return false;

      if (($i + $bits) > $len) return false;

      while($bits > 1){
          $i++;
          $b = ord($str[$i]);
          if ($b < 128 || $b > 191) return false;
          $bits--;
        }
      }
  }
  return true;
}

// From http://w3.org/International/questions/qa-forms-utf-8.html
function is_utf8_2($string) {
  return preg_match('%^(?:
      [\x09\x0A\x0D\x20-\x7E]            # ASCII
    | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
    |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
    | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
    |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
    |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
    | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
    |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
  )*$%xs', $string);
}

function isUTF8($string) {
  return (utf8_encode(utf8_decode($string)) == $string);
}
