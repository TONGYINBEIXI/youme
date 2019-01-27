<?php
/**
 * Created by PhpStorm.
 * User: 痛瘾悲喜
 * Date: 2017/12/5
 * Time: 22:24
 */
namespace zhongguo\henan;
header("content-type:text/html; charset=utf-8");
    function ceshi(){
         echo '河南';
    }

include ("./common.php");


namespace   meiguo\niuyue;
    function ceshi(){

       echo '纽约';
    }

    class Pepole{
        static $name='美国人';
    }

namespace  zhongguo\shandong;
    function ceshi(){

        echo '山东';
    }

namespace  zhongguo\shanxi;
   function ceshi(){

       echo  '山西';
   }

   class Pepole{
        static $name='山西人';
   }

   \ceshi();

   echo \Pepole ::$name;
   //ceshi();  非限定名称

   //\zhongguo\shandong\ceshi();
//use meiguo\niuyue\Pepole;
//   echo Pepole::$name;

//use meiguo\niuyue\Pepole as pe; //as pe 别名
//   echo pe::$name;

