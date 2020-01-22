<?php
/**
 * Created by PhpStorm.
 * User: JC
 * Date: 20/1/2020
 * Time: 20:15
 */



    function conectar() {
        $conex = mysqli_connect("localhost", "root", "","arisa")
        or die("No se puede conectar" . mysqli_error());
        return $conex;
    }

    function cierre() {
        mysqli_close();
    }

