<?php
    if( $_POST['preorden'] == ''&& $_POST['inorden'] ==''&& $_POST['postorden']==''){
        echo 'No ingreso ningun valor asi no se puede hacer el arbol';
        echo '<br>'.'( ￣＾￣)'.'<br>';
        echo 'DEVUELVETE'.'<br>';
        echo '<button><a href="index.html">Volver</a></button>';
    }else if 
    (($_POST['preorden'] != '' && $_POST['inorden'] == '' && $_POST['postorden'] == '') ||
    ($_POST['preorden'] == '' && $_POST['inorden'] != '' && $_POST['postorden'] == '') ||
    ($_POST['preorden'] == '' && $_POST['inorden'] == '' && $_POST['postorden'] != ''))
    {   
        echo 'Solo ingres asi no se puede hacer el arbol';
        echo '<br>'.'( ￣＾￣)'.'<br>';
        echo 'DEVUELVETE'.'<br>';
        echo '<button><a href="index.html">Volver</a></button>';

    }elseif 
    (($_POST['preorden'] != '' && $_POST['inorden'] != '' && $_POST['postorden'] == '') ||
    ($_POST['preorden'] != '' && $_POST['inorden'] == '' && $_POST['postorden'] != '') ||
    ($_POST['preorden'] == '' && $_POST['inorden'] != '' && $_POST['postorden'] != ''))
    {

    }elseif ($_POST['preorden'] != '' && $_POST['inorden'] != '' && $_POST['postorden'] != '') 
    {
        $pre = trim($_POST['preorden']);
        $in = trim($_POST['inorden']);
        $post = trim($_POST['postorden']);
    }


?>