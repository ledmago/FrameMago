<?php

function session($name, $value = null)
{
  if ($value){
    $_SESSION[$name] = $value;
  }
  if (isset($_SESSION[$name]))
    return $_SESSION[$name];
}
function ifsession($name)
{
  if(isset($_SESSION[$name])){return $_SESSION[$name];}else{return false;}
}
