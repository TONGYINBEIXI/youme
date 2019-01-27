<?php

namespace  henan;
function ceshi(){
      echo 12;
}

namespace  shangdong;
function ceshi()
{
      echo 13;

}

//ceshi(); 非限定名字访问

// henan\ceshi(); 限定名称访问

// \henan\ceshi(); 完全限定名称访问