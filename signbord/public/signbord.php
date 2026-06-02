<?php
    $text = Array();
    $dott = Array();
    $width = Array();

    $skip = Array();
    $skip_ct = 0;
    $red = false;
    $green = false;

    $hourtext = '0';
    $minutetext = '0';

    $time1Bool = true;
    $ridepos1Bool = true;
    $destination1Bool = true;

    $time2Bool = true;
    $ridepos2Bool = true;
    $destination2Bool = true;

    $time3Bool = true;
    $ridepos3Bool = true;
    $destination3Bool = true;

    $time4Bool = true;
    $ridepos4Bool = true;
    $destination4Bool = true;

    $json = file_get_contents('api/textdata.json');
    $json = mb_convert_encoding($json, "UTF8" ,  'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $data = json_decode($json,true);/**/

    for ($i = 0; $i < count($data); $i++) {
        if ($data) {
            $text[$i] = $data[$i]['text'];
            $dott[$i] = $data[$i]['dott'];
            $width[$i] = $data[$i]['width'];
            //echo '<script>console.log("'..'");</script>';
        }
    }


    

    $skip_tx = Array();
    $skip_ct_tx = 0;
    $half_ct_tx = 0;

    if(isset($_GET['textinput'])){
        if($_GET['textinput'] == ''){
            $chars = mb_str_split('　　　　　　　　　　　　　　　　　　　　');
        }else{
            $chars = mb_str_split($_GET['textinput']);
        }
    }else{
        $chars = mb_str_split('　　　　　　　　　　　　　　　　　　　　');
    }

    for ($c = 0; $c < count($chars); $c++) {
        for ($i = 0; $i < count($text); $i++) {
            if($text[$i] == $chars[$c]) {
                if($width[$i] == 'half'){
                    $half_ct_tx++;
                }
            }
        }
    }
                
    for ($c = 0; $c < count($chars); $c++) {
        for ($i = 0; $i < count($text); $i++) {
            if ($text[$i] == $chars[$c]) {
                if(($c + 1) < count($chars)){
                    if($chars[$c + 1] == '\\'){
                        if(($c + 2) < count($chars)){
                            switch($chars[$c + 2]){
                                case 'r':
                                case 'g':
                                    $skip_tx[$skip_ct_tx] = $c + 1;
                                    $skip_tx[$skip_ct_tx + 1] = $c + 2;
                                    $skip_ct_tx = $skip_ct_tx + 2;
                                    $half_ct_tx--;
                                    break;
                                case '\\':
                                    break;
                                default:
                                    $skip[$skip_ct_tx] = $c + 1;
                                    $skip_ct_tx = $skip_ct_tx++;
                                    $half_ct_tx--;
                                    break;
                            }
                        }else{
                            $skip_tx[$skip_ct_tx] = $c + 1;
                            $skip_ct_tx = $skip_ct_tx++;
                        }
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/styles.css" />
        <style>
            main{
                min-width:1300px;
            }

            .bord{
                display:grid;
                max-width:1300px;
                background-color:#808080;
            }

            table{
                height:64px;
                min-height:64px;
            }
            
            .half-tbl{
                width:32px;
                min-width:32px;
            }
            
            .full-tbl{
                width:64px;
                min-width:64px;
            }

            table td{
                width:2px;
                height:2px;
                min-width:2px;
                min-height:2px;
                aspect-ratio: 1 / 1;
            }

            .bordhead{
                color:#ffffff;
                text-align:center;
            }

            .bord-c1 p, .bord-c2 p, .bord-c3 p, .bord-c4 p, .bord-c5 p{
                margin:0;
            }

            .bord-c1{
                width:192px;
            }

            .bord-c2{
                width:320px;
            }

            .bord-c3{
                width:192px;
            }

            .bord-c4{
                width:256px;
            }

            .bord-c5{
                width:320px;
            }

            .bord-side{
                border-left:10px solid #808080;
                border-right:10px solid #808080;
            }

            .bord-main{
                background-color:#000000;
            }

            .trainbord{
                display:grid;
                width:90%;
                margin:10px;
                background-color:#d8d8d8;
                border-radius:10px;
                font-size:18px;
            }

            .trainbord p{
                margin:10px 0;
                padding-left:10px;
            }

            .trainbord div{
                width:calc(100% - 20px);
                padding:10px;
                background-color:#ececec;
                border-radius:10px;
            }

            .trainbord input, .trainbord select{
                font-size:18px;
            }

            .trainbord fieldset{
                border:1px solid #999999;
                border-radius:10px;
            }

            textarea{
                width:90%;
                height:100px;
                border:1px solid #999999;
                border-radius:5px;
                resize: none;
            }

            .train-texter{
                overflow: hidden;
                width:1280px;
            }

            .scroller{
                animation:scroll;
                animation-duration:<?php
                    if(isset($_GET['textinput'])){
                        $chars = mb_str_split($_GET['textinput']);
                
                        if((count($chars) - ($half_ct_tx * 0.5)) > 20){
                            echo ((count($chars) * 1.6) - ($half_ct_tx * 0.8)).'s';
                        }else{
                            echo '25.6s';
                        }
                    }else{
                        echo '25.6s';
                    }
                ?>;
                animation-iteration-count: infinite;
                animation-fill-mode:both;
                animation-timing-function:linear;
            }

            @keyframes scroll{
                from{
                    transform:translateX(1280px);
                }

                to{
                    transform:translateX(<?php
                        if(isset($_GET['textinput'])){
                            $chars = mb_str_split($_GET['textinput']);
                            if((count($chars) - ($half_ct_tx * 0.5)) > 20){
                                echo '-'.((count($chars) * 64) - ($half_ct_tx * 32)).'px';
                                echo ');(/*'.$half_ct_tx.'*/';
                            }else{
                                echo '-1344px';
                            }
                        }else{
                            echo '-1344px';
                        }
                    ?>);
                }
            }

            @media(max-width:1320px){
                table{
                    height:48px;
                    min-height:48px;
                }
                
                .half-tbl{
                    width:24px;
                    min-width:24px;
                }
                
                .full-tbl{
                    width:48px;
                    min-width:48px;
                }

                table td{
                    width:1px;
                    height:1px;
                    min-width:1px;
                    min-height:1px;
                    aspect-ratio: 1 / 1;
                }

                main{
                    min-width:980px;
                }

                .bord{
                    max-width:980px;
                }

                .bord-c1{
                    width:144px;
                }

                .bord-c2{
                    width:240px;
                }

                .bord-c3{
                    width:144px;
                }

                .bord-c4{
                    width:192px;
                }

                .bord-c5{
                    width:240px;
                }

                .train-texter{
                    width:960px;
                }

                .scroller{
                    animation:scroll;
                    animation-duration:<?php
                        if(isset($_GET['textinput'])){
                            $chars = mb_str_split($_GET['textinput']);
                    
                            if((count($chars) - ($half_ct_tx * 0.5)) > 20){
                                echo ((count($chars) * 1.2) - ($half_ct_tx * 0.6)).'s';
                            }else{
                                echo '19.6s';
                            }
                        }else{
                            echo '19.6s';
                        }
                    ?>;
                    animation-iteration-count: infinite;
                    animation-fill-mode:both;
                    animation-timing-function:linear;
                }

                @keyframes scroll{
                    from{
                        transform:translateX(960px);
                    }

                    to{
                        transform:translateX(<?php
                            if(isset($_GET['textinput'])){
                                $chars = mb_str_split($_GET['textinput']);
                                if((count($chars) - ($half_ct_tx * 0.5)) > 20){
                                    echo '-'.((count($chars) * 48) - ($half_ct_tx * 24)).'px';
                                    echo ');(/*'.$half_ct_tx.'*/';
                                }else{
                                    echo '-1008px';
                                }
                            }else{
                                echo '-1008px';
                            }
                        ?>);
                    }
                }

            }

            @media(max-width:1000px){
                table{
                    height:32px;
                    min-height:32px;
                }
                
                .half-tbl{
                    width:16px;
                    min-width:16px;
                }
                
                .full-tbl{
                    width:32px;
                    min-width:32px;
                }

                table td{
                    width:12.5%;
                    height:12.5%;
                    min-width:0;
                    min-height:0;
                    aspect-ratio: 1 / 1;
                }

                main{
                    min-width:660px;
                }
                
                .bord{
                    max-width:660px;
                    width:660px;
                }

                .bord-c1, .bord-c2, .bord-c3, .bord-c4, .bord-c5{
                    font-size:12px;
                }

                .bord-c1{
                    width:96px;
                }

                .bord-c2{
                    width:160px;
                }

                .bord-c3{
                    width:96px;
                }

                .bord-c4{
                    width:128px;
                }

                .bord-c5{
                    width:160px;
                }

                .train-texter{
                    width:640px;
                }

                .scroller{
                    animation:scroll;
                    animation-duration:<?php
                        if(isset($_GET['textinput'])){
                            $chars = mb_str_split($_GET['textinput']);
                    
                            if((count($chars) - ($half_ct_tx * 0.5)) > 20){
                                echo ((count($chars) * 0.8) - ($half_ct_tx * 0.4)).'s';
                            }else{
                                echo '12.8s';
                            }
                        }else{
                            echo '12.8s';
                        }
                    ?>;
                    animation-iteration-count: infinite;
                    animation-fill-mode:both;
                    animation-timing-function:linear;
                }

                @keyframes scroll{
                    from{
                        transform:translateX(640px);
                    }

                    to{
                        transform:translateX(<?php
                            if(isset($_GET['textinput'])){
                                $chars = mb_str_split($_GET['textinput']);
                                if((count($chars) - ($half_ct_tx * 0.5)) > 20){
                                    echo '-'.((count($chars) * 32) - ($half_ct_tx * 16)).'px';
                                    echo ');(/*'.$half_ct_tx.'*/';
                                }else{
                                    echo '-672px';
                                }
                            }else{
                                echo '-672px';
                            }
                        ?>);
                    }
                }
            }
        </style>
        <title>発車標ジェネレーター｜LEDジェネレーター実験室</title>
        <link rel="icon" href="./favicon.ico">
    </head>
    <body>
        <nav></nav>
        <header></header>
        <main>
            <div class="bord">
                <div class="bordhead bord-side">
                    <h2>発車標ジェネレーター</h2>
                    <div style="display:flex;">
                        <div class="bord-c1">
                            <p>列車種別</p>
                        </div>
                        <div class="bord-c2">
                            <p>乗車位置</p>
                        </div>
                        <div class="bord-c3">
                            <p>出発時刻</p>
                        </div>
                        <div class="bord-c4">
                            <p>行先</p>
                        </div>
                        <div class="bord-c5">
                            <p>遅れ</p>
                        </div>
                    </div>
                </div>
                
                <div style="display:flex;" class="bord-side bord-main">
                    <div style="display:flex;" class="train-type">
                    <?php
                        function looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green){
                            for ($i = 0; $i < count($text); $i++) {
                                if ($text[$i] == $chars[$c]) {
                                    $im = 0;
                                    if($width[$i] == 'half'){
                                        echo '<table class="half-tbl"><tbody>';
                                        for ($ii = 1; $ii < 129; $ii++) {
                                            if($ii % 8 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                if($red){
                                                    echo'#ff0000';
                                                }else if($green){
                                                    echo'#00c000';
                                                }else{
                                                    echo'#ff8000';
                                                }
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 8 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }else{
                                        echo '<table class="full-tbl"><tbody>';
                                        for ($ii = 1; $ii < 257; $ii++) {
                                            if($ii % 16 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                if($red){
                                                    echo'#ff0000';
                                                }else if($green){
                                                    echo'#00c000';
                                                }else{
                                                    echo'#ff8000';
                                                }
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 16 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                    echo '</tbody></table>';
                                    $red = false;
                                    $green = false;
                                }
                            }
                        }
                        if(isset($_GET['type1input'])){
                            if($_GET['type1input'] == ''){
                                $chars = mb_str_split('回　送');
                            }else{
                                $chars = mb_str_split(explode(',', $_GET['type1input'])[0]);
                                switch(explode(',', $_GET['type1input'])[1]){
                                    case 'g':
                                        $red = false;
                                        $green = true;
                                        break;
                                    case 'r':
                                        $green = false;
                                        $red = true;
                                        break;
                                    default:
                                        $red = false;
                                        $green = false;
                                        break;
                                }
                            }
                        }else{
                            $chars = mb_str_split('回　送');
                        }

                        for ($c = 0; $c < count($chars); $c++) {
                            if(empty($skip[$skip_ct])){
                                looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                            }else{
                                if($c != $skip[$skip_ct]){
                                    looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                                }
                            }
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-pos">
                    <?php
                        function looper14($text, $chars, $c, $width, $dott){
                            for ($i = 0; $i < count($text); $i++) {
                                if ($text[$i] == $chars[$c]) {
                                    $im = 0;
                                    if($width[$i] == 'half'){
                                        echo '<table class="half-tbl"><tbody>';
                                        for ($ii = 1; $ii < 129; $ii++) {
                                            if($ii % 8 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                echo'#00c000';
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 8 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }else{
                                        echo '<table class="full-tbl"><tbody>';
                                        for ($ii = 1; $ii < 257; $ii++) {
                                            if($ii % 16 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                echo'#00c000';
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 16 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                    echo '</tbody></table>';
                                }
                            }
                        }
                        if(isset($_GET['ridepos1input'])){
                            if(isset($_GET['ridepos1numinput'])){
                                if($_GET['ridepos1input'] == '' || $_GET['ridepos1numinput'] == ''){
                                    $ridepos1Bool = false;
                                }
                            }else{
                                $ridepos1Bool = false;
                            }
                        }else{
                            $ridepos1Bool = false;
                        }

                        if($ridepos1Bool){
                            $texter = $_GET['ridepos1input'].$_GET['ridepos1numinput'];
                            $chars = mb_str_split($texter);
                        }else{
                            if(isset($_GET['type1input'])){
                                switch($_GET['type1input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        echo '<script>alert("乗車位置は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("乗車位置は必須項目です。");</script>';
                            }
                        }
                        $ridepos1Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper14($text, $chars, $c, $width, $dott);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-time">
                    <?php
                        function looper13($text, $chars, $c, $width, $dott){
                            for ($i = 0; $i < count($text); $i++) {
                                if ($text[$i] == $chars[$c]) {
                                    $im = 0;
                                    if($width[$i] == 'half'){
                                        echo '<table class="half-tbl"><tbody>';
                                        for ($ii = 1; $ii < 129; $ii++) {
                                            if($ii % 8 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                echo'#ff8000';
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 8 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }else{
                                        echo '<table class="full-tbl"><tbody>';
                                        for ($ii = 1; $ii < 257; $ii++) {
                                            if($ii % 16 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                echo'#ff8000';
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 16 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                    echo '</tbody></table>';
                                }
                            }
                        }
                        if(isset($_GET['time1hinput'])){
                            if(isset($_GET['time1minput'])){
                                if($_GET['time1hinput'] == '' || $_GET['time1minput'] == ''){
                                    $time1Bool = false;
                                }
                            }else{
                                $time1Bool = false;
                            }
                        }else{
                            $time1Bool = false;
                        }

                        if($time1Bool){
                            if($_GET['time1hinput'] < 10){
                                $hourtext = ' '.$_GET['time1hinput'];
                            }else{
                                $hourtext = $_GET['time1hinput'];
                            }

                            if($_GET['time1minput'] < 10){
                                $minutetext = '0'.$_GET['time1minput'];
                            }else{
                                $minutetext = $_GET['time1minput'];
                            }
                            $texter = $hourtext.'：'.$minutetext;
                            $chars = mb_str_split($texter);
                        }else{
                            if(isset($_GET['type1input'])){
                                switch($_GET['type1input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　 　');
                                        break;
                                    default:
                                        echo '<script>alert("出発時刻は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("出発時刻は必須項目です。");</script>';
                            }
                        }
                        $time1Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper13($text, $chars, $c, $width, $dott);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-dest">
                    <?php
                        function looper12($text, $chars, $c, $width, $dott, $skip_ct, $red, $green){
                            for ($i = 0; $i < count($text); $i++) {
                                if ($text[$i] == $chars[$c]) {
                                    $im = 0;
                                    if($width[$i] == 'half'){
                                        echo '<table class="half-tbl"><tbody>';
                                        for ($ii = 1; $ii < 129; $ii++) {
                                            if($ii % 8 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                echo'#00c000';
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 8 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }else{
                                        echo '<table class="full-tbl"><tbody>';
                                        for ($ii = 1; $ii < 257; $ii++) {
                                            if($ii % 16 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                echo'#00c000';
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 16 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                    echo '</tbody></table>';
                                }
                            }
                        }
                        if(isset($_GET['destination1input'])){
                            if($_GET['destination1input'] == ''){
                                $destination1Bool = false;
                            }
                        }else{
                            $destination1Bool = false;
                        }

                        if($destination1Bool){
                            $chars = mb_str_split($_GET['destination1input']);
                        }else{
                            if(isset($_GET['type1input'])){
                                switch($_GET['type1input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        echo '<script>alert("行先表示は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("行先表示は必須項目です。");</script>';
                            }
                        }
                        $destination1Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper12($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-behind">
                    <?php
                        function looper15($text, $chars, $c, $width, $dott, $skip_ct, $red, $green){
                            for ($i = 0; $i < count($text); $i++) {
                                if ($text[$i] == $chars[$c]) {
                                    $im = 0;
                                    if($width[$i] == 'half'){
                                        echo '<table class="half-tbl"><tbody>';
                                        for ($ii = 1; $ii < 129; $ii++) {
                                            if($ii % 8 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                echo'#ff0000';
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 8 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }else{
                                        echo '<table class="full-tbl"><tbody>';
                                        for ($ii = 1; $ii < 257; $ii++) {
                                            if($ii % 16 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                echo'#ff0000';
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 16 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                    echo '</tbody></table>';
                                }
                            }
                        }

                        if(isset($_GET['behind1input'])){
                            if(isset($_GET['behind1timeinput'])){
                                if($_GET['behind1timeinput'] == ''){
                                    $destination1Bool = false;
                                }
                            }else{
                                $destination1Bool = false;
                            }
                        }else{
                            $destination1Bool = false;
                        }

                        if($destination1Bool){
                            if(isset($_GET['behind1input'])){
                                if($_GET['behind1input'] == 'true'){
                                    switch($_GET['behind1timeinput']){
                                        case 3:
                                        case '3':
                                            $behindtime = '３';
                                            break;
                                        case 4:
                                        case '4':
                                            $behindtime = '４';
                                            break;
                                        case 5:
                                        case '5':
                                            $behindtime = '５';
                                            break;
                                        case 6:
                                        case '6':
                                            $behindtime = '６';
                                            break;
                                        case 7:
                                        case '7':
                                            $behindtime = '７';
                                            break;
                                        case 8:
                                        case '8':
                                            $behindtime = '８';
                                            break;
                                        case 9:
                                        case '9':
                                            $behindtime = '９';
                                            break;
                                        default:
                                            $vals = intval($_GET['behind1timeinput']) % 5;
                                            if($vals == 0){
                                                $behindtime = intval($_GET['behind1timeinput']);
                                            }else{
                                                $behindtime = intval($_GET['behind1timeinput']) - $vals;
                                            }
                                            break;
                                    }
                                    $behindtext = '遅れ約'.$behindtime.'分';
                                    $chars = mb_str_split($behindtext);
                                }
                            }

                        }else{
                            if(isset($_GET['type1input'])){
                                switch($_GET['type1input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }
                        $destination1Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper15($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                        }
                        $chars = [];
                    ?>
                    </div>
                </div>

                <div style="display:flex;" class="bord-side bord-main">
                    <div style="display:flex;" class="train-type">
                    <?php
                        if(isset($_GET['type2input'])){
                            if($_GET['type2input'] == ''){
                                $chars = mb_str_split('回　送');
                            }else{
                                $chars = mb_str_split(explode(',', $_GET['type2input'])[0]);
                                switch(explode(',', $_GET['type2input'])[1]){
                                    case 'g':
                                        $red = false;
                                        $green = true;
                                        break;
                                    case 'r':
                                        $green = false;
                                        $red = true;
                                        break;
                                    default:
                                        $red = false;
                                        $green = false;
                                        break;
                                }
                            }
                        }else{
                            $chars = mb_str_split('回　送');
                        }

                        for ($c = 0; $c < count($chars); $c++) {
                            if(empty($skip[$skip_ct])){
                                looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                            }else{
                                if($c != $skip[$skip_ct]){
                                    looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                                }
                            }
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-pos">
                    <?php
                        if(isset($_GET['ridepos2input'])){
                            if(isset($_GET['ridepos2numinput'])){
                                if($_GET['ridepos2input'] == '' || $_GET['ridepos2numinput'] == ''){
                                    $ridepos2Bool = false;
                                }
                            }else{
                                $ridepos2Bool = false;
                            }
                        }else{
                            $ridepos2Bool = false;
                        }

                        if($ridepos2Bool){
                            $texter = $_GET['ridepos2input'].$_GET['ridepos2numinput'];
                            $chars = mb_str_split($texter);
                        }else{
                            if(isset($_GET['type2input'])){
                                switch($_GET['type2input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        echo '<script>alert("乗車位置は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("乗車位置は必須項目です。");</script>';
                            }
                        }
                        $ridepos2Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper14($text, $chars, $c, $width, $dott);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-time">
                    <?php
                        if(isset($_GET['time2hinput'])){
                            if(isset($_GET['time2minput'])){
                                if($_GET['time2hinput'] == '' || $_GET['time2minput'] == ''){
                                    $time2Bool = false;
                                }
                            }else{
                                $time2Bool = false;
                            }
                        }else{
                            $time2Bool = false;
                        }

                        if($time2Bool){
                            if($_GET['time2hinput'] < 10){
                                $hourtext = ' '.$_GET['time2hinput'];
                            }else{
                                $hourtext = $_GET['time2hinput'];
                            }

                            if($_GET['time2minput'] < 10){
                                $minutetext = '0'.$_GET['time2minput'];
                            }else{
                                $minutetext = $_GET['time2minput'];
                            }
                            $texter = $hourtext.'：'.$minutetext;
                            $chars = mb_str_split($texter);
                        }else{
                            if(isset($_GET['type2input'])){
                                switch($_GET['type2input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　 　');
                                        break;
                                    default:
                                        echo '<script>alert("出発時刻は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("出発時刻は必須項目です。");</script>';
                            }
                        }
                        $time2Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper13($text, $chars, $c, $width, $dott);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-dest">
                    <?php
                        if(isset($_GET['destination2input'])){
                            if($_GET['destination2input'] == ''){
                                $destination2Bool = false;
                            }
                        }else{
                            $destination2Bool = false;
                        }

                        if($destination2Bool){
                            $chars = mb_str_split($_GET['destination2input']);
                        }else{
                            if(isset($_GET['type2input'])){
                                switch($_GET['type2input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        echo '<script>alert("行先表示は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("行先表示は必須項目です。");</script>';
                            }
                        }
                        $destination2Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper12($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                        }
                        $chars = [];
                    ?>
                    </div>
                </div>

                <div style="display:flex;" class="bord-side bord-main">
                    <div style="display:flex;" class="train-type">
                    <?php
                        if(isset($_GET['type3input'])){
                            if($_GET['type3input'] == ''){
                                $chars = mb_str_split('回　送');
                            }else{
                                $chars = mb_str_split(explode(',', $_GET['type3input'])[0]);
                                switch(explode(',', $_GET['type3input'])[1]){
                                    case 'g':
                                        $red = false;
                                        $green = true;
                                        break;
                                    case 'r':
                                        $green = false;
                                        $red = true;
                                        break;
                                    default:
                                        $red = false;
                                        $green = false;
                                        break;
                                }
                            }
                        }else{
                            $chars = mb_str_split('回　送');
                        }

                        for ($c = 0; $c < count($chars); $c++) {
                            if(empty($skip[$skip_ct])){
                                looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                            }else{
                                if($c != $skip[$skip_ct]){
                                    looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                                }
                            }
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-pos">
                    <?php
                        if(isset($_GET['ridepos3input'])){
                            if(isset($_GET['ridepos3numinput'])){
                                if($_GET['ridepos3input'] == '' || $_GET['ridepos3numinput'] == ''){
                                    $ridepos3Bool = false;
                                }
                            }else{
                                $ridepos3Bool = false;
                            }
                        }else{
                            $ridepos3Bool = false;
                        }

                        if($ridepos3Bool){
                            $texter = $_GET['ridepos3input'].$_GET['ridepos3numinput'];
                            $chars = mb_str_split($texter);
                        }else{
                            if(isset($_GET['type3input'])){
                                switch($_GET['type3input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        echo '<script>alert("乗車位置は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("乗車位置は必須項目です。");</script>';
                            }
                        }
                        $ridepos3Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper14($text, $chars, $c, $width, $dott);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-time">
                    <?php
                        if(isset($_GET['time3hinput'])){
                            if(isset($_GET['time3minput'])){
                                if($_GET['time3hinput'] == '' || $_GET['time3minput'] == ''){
                                    $time3Bool = false;
                                }
                            }else{
                                $time3Bool = false;
                            }
                        }else{
                            $time3Bool = false;
                        }

                        if($time3Bool){
                            if($_GET['time3hinput'] < 10){
                                $hourtext = ' '.$_GET['time3hinput'];
                            }else{
                                $hourtext = $_GET['time3hinput'];
                            }

                            if($_GET['time3minput'] < 10){
                                $minutetext = '0'.$_GET['time3minput'];
                            }else{
                                $minutetext = $_GET['time3minput'];
                            }
                            $texter = $hourtext.'：'.$minutetext;
                            $chars = mb_str_split($texter);
                        }else{
                            if(isset($_GET['type3input'])){
                                switch($_GET['type3input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　 　');
                                        break;
                                    default:
                                        echo '<script>alert("出発時刻は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("出発時刻は必須項目です。");</script>';
                            }
                        }
                        $time3Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper13($text, $chars, $c, $width, $dott);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-dest">
                    <?php
                        if(isset($_GET['destination3input'])){
                            if($_GET['destination3input'] == ''){
                                $destination3Bool = false;
                            }
                        }else{
                            $destination3Bool = false;
                        }

                        if($destination3Bool){
                            $chars = mb_str_split($_GET['destination3input']);
                        }else{
                            if(isset($_GET['type3input'])){
                                switch($_GET['type3input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        echo '<script>alert("行先表示は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("行先表示は必須項目です。");</script>';
                            }
                        }
                        $destination3Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper12($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-behind">
                    <?php
                        if(isset($_GET['behind3input'])){
                            if(isset($_GET['behind3timeinput'])){
                                if($_GET['behind3timeinput'] == ''){
                                    $destination3Bool = false;
                                }
                            }else{
                                $destination3Bool = false;
                            }
                        }else{
                            $destination3Bool = false;
                        }

                        if($destination3Bool){
                            if(isset($_GET['behind3input'])){
                                if($_GET['behind3input'] == 'true'){
                                    echo '<script>console.log("'.gettype($_GET['behind3input']).'")</script>';
                                    switch($_GET['behind3timeinput']){
                                        case 3:
                                        case '3':
                                            $behindtime = '３';
                                            break;
                                        case 4:
                                        case '4':
                                            $behindtime = '４';
                                            break;
                                        case 5:
                                        case '5':
                                            $behindtime = '５';
                                            break;
                                        case 6:
                                        case '6':
                                            $behindtime = '６';
                                            break;
                                        case 7:
                                        case '7':
                                            $behindtime = '７';
                                            break;
                                        case 8:
                                        case '8':
                                            $behindtime = '８';
                                            break;
                                        case 9:
                                        case '9':
                                            $behindtime = '９';
                                            break;
                                        default:
                                            $vals = intval($_GET['behind3timeinput']) % 5;
                                            if($vals == 0){
                                                $behindtime = intval($_GET['behind3timeinput']);
                                            }else{
                                                $behindtime = intval($_GET['behind3timeinput']) - $vals;
                                            }
                                            break;
                                    }
                                    $behindtext = '遅れ約'.$behindtime.'分';
                                    $chars = mb_str_split($behindtext);
                                }
                            }

                        }else{
                            if(isset($_GET['type3input'])){
                                switch($_GET['type3input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }
                        $destination3Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper15($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                        }
                        $chars = [];
                    ?>
                    </div>
                </div>

                <div style="display:flex;" class="bord-side bord-main">
                    <div style="display:flex;" class="train-type">
                    <?php
                        if(isset($_GET['type4input'])){
                            if($_GET['type4input'] == ''){
                                $chars = mb_str_split('回　送');
                            }else{
                                $chars = mb_str_split(explode(',', $_GET['type4input'])[0]);
                                switch(explode(',', $_GET['type4input'])[1]){
                                    case 'g':
                                        $red = false;
                                        $green = true;
                                        break;
                                    case 'r':
                                        $green = false;
                                        $red = true;
                                        break;
                                    default:
                                        $red = false;
                                        $green = false;
                                        break;
                                }
                            }
                        }else{
                            $chars = mb_str_split('回　送');
                        }

                        for ($c = 0; $c < count($chars); $c++) {
                            if(empty($skip[$skip_ct])){
                                looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                            }else{
                                if($c != $skip[$skip_ct]){
                                    looper11($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                                }
                            }
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-pos">
                    <?php
                        if(isset($_GET['ridepos4input'])){
                            if(isset($_GET['ridepos4numinput'])){
                                if($_GET['ridepos4input'] == '' || $_GET['ridepos4numinput'] == ''){
                                    $ridepos4Bool = false;
                                }
                            }else{
                                $ridepos4Bool = false;
                            }
                        }else{
                            $ridepos4Bool = false;
                        }

                        if($ridepos4Bool){
                            $texter = $_GET['ridepos4input'].$_GET['ridepos4numinput'];
                            $chars = mb_str_split($texter);
                        }else{
                            if(isset($_GET['type4input'])){
                                switch($_GET['type4input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        echo '<script>alert("乗車位置は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("乗車位置は必須項目です。");</script>';
                            }
                        }
                        $ridepos4Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper14($text, $chars, $c, $width, $dott);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-time">
                    <?php
                        if(isset($_GET['time4hinput'])){
                            if(isset($_GET['time4minput'])){
                                if($_GET['time4hinput'] == '' || $_GET['time4minput'] == ''){
                                    $time4Bool = false;
                                }
                            }else{
                                $time4Bool = false;
                            }
                        }else{
                            $time4Bool = false;
                        }

                        if($time4Bool){
                            if($_GET['time4hinput'] < 10){
                                $hourtext = ' '.$_GET['time4hinput'];
                            }else{
                                $hourtext = $_GET['time4hinput'];
                            }

                            if($_GET['time4minput'] < 10){
                                $minutetext = '0'.$_GET['time4minput'];
                            }else{
                                $minutetext = $_GET['time4minput'];
                            }
                            $texter = $hourtext.'：'.$minutetext;
                            $chars = mb_str_split($texter);
                        }else{
                            if(isset($_GET['type4input'])){
                                switch($_GET['type4input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　 　');
                                        break;
                                    default:
                                        echo '<script>alert("出発時刻は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("出発時刻は必須項目です。");</script>';
                            }
                        }
                        $time4Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper13($text, $chars, $c, $width, $dott);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-dest">
                    <?php
                        if(isset($_GET['destination4input'])){
                            if($_GET['destination4input'] == ''){
                                $destination4Bool = false;
                            }
                        }else{
                            $destination4Bool = false;
                        }

                        if($destination4Bool){
                            $chars = mb_str_split($_GET['destination4input']);
                        }else{
                            if(isset($_GET['type4input'])){
                                switch($_GET['type4input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        echo '<script>alert("行先表示は必須項目です。");</script>';
                                        break;
                                }
                            }else{
                                echo '<script>alert("行先表示は必須項目です。");</script>';
                            }
                        }
                        $destination4Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper12($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                        }
                        $chars = [];
                    ?>
                    </div>
                    <div style="display:flex;" class="train-behind">
                    <?php
                        if(isset($_GET['behind4input'])){
                            if(isset($_GET['behind4timeinput'])){
                                if($_GET['behind4timeinput'] == ''){
                                    $destination4Bool = false;
                                }
                            }else{
                                $destination4Bool = false;
                            }
                        }else{
                            $destination4Bool = false;
                        }

                        if($destination4Bool){
                            if(isset($_GET['behind4input'])){
                                if($_GET['behind4input'] == 'true'){
                                    echo '<script>console.log("'.gettype($_GET['behind4input']).'")</script>';
                                    switch($_GET['behind4timeinput']){
                                        case 3:
                                        case '3':
                                            $behindtime = '３';
                                            break;
                                        case 4:
                                        case '4':
                                            $behindtime = '４';
                                            break;
                                        case 5:
                                        case '5':
                                            $behindtime = '５';
                                            break;
                                        case 6:
                                        case '6':
                                            $behindtime = '６';
                                            break;
                                        case 7:
                                        case '7':
                                            $behindtime = '７';
                                            break;
                                        case 8:
                                        case '8':
                                            $behindtime = '８';
                                            break;
                                        case 9:
                                        case '9':
                                            $behindtime = '９';
                                            break;
                                        default:
                                            $vals = intval($_GET['behind4timeinput']) % 5;
                                            if($vals == 0){
                                                $behindtime = intval($_GET['behind4timeinput']);
                                            }else{
                                                $behindtime = intval($_GET['behind4timeinput']) - $vals;
                                            }
                                            break;
                                    }
                                    $behindtext = '遅れ約'.$behindtime.'分';
                                    $chars = mb_str_split($behindtext);
                                }
                            }

                        }else{
                            if(isset($_GET['type4input'])){
                                switch($_GET['type4input']){
                                    case '　　　,n':
                                    case '回　送,n':
                                    case '通　過,n':
                                        $chars = mb_str_split('　　　　');
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }
                        $destination4Bool = true;

                        for ($c = 0; $c < count($chars); $c++) {
                            looper15($text, $chars, $c, $width, $dott, $skip_ct, $red, $green);
                        }
                        $chars = [];
                    ?>
                    </div>
                </div>
                <div style="display:flex;" class="train-texter bord-side bord-main">
                    <div style="display:flex;">
                    <?php
                        function looper($text, $chars, $c, $width, $dott, $skip_ct_tx, $half_ct_tx, $red, $green){
                            for ($i = 0; $i < count($text); $i++) {
                                if ($text[$i] == $chars[$c]) {
                                    if(($c + 1) < count($chars)){
                                        if($chars[$c + 1] == '\\'){
                                            if(($c + 2) < count($chars)){
                                                if($chars[$c + 2] == 'r'){
                                                    $red = true;
                                                }
                                                if($chars[$c + 2] == 'g'){
                                                    $green = true;
                                                }
                                            }
                                        }
                                    }
                                    if((count($chars)- $skip_ct_tx - ($half_ct_tx * 0.5)) > 20){
                                        echo '<table class="scroller"><tbody>';
                                    }else{
                                        echo '<table><tbody>';
                                    }
                                    $im = 0;
                                    
                                    if($width[$i] == 'half'){
                                        for ($ii = 1; $ii < 129; $ii++) {
                                            if($ii % 8 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                if($red){
                                                    echo'#ff0000';
                                                }else if($green){
                                                    echo'#00c000';
                                                }else{
                                                    echo'#ff8000';
                                                }
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 8 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }else{
                                        for ($ii = 1; $ii < 257; $ii++) {
                                            if($ii % 16 == 1){
                                                echo '<tr>';
                                            }
                                            echo '<td style="background-color:';
                                            if (($im < count($dott[$i])) && ($ii == $dott[$i][$im])) {
                                                if($red){
                                                    echo'#ff0000';
                                                }else if($green){
                                                    echo'#00c000';
                                                }else{
                                                    echo'#ff8000';
                                                }
                                                $im++;
                                            }else{
                                                echo'#000000';
                                            }
                                            echo '"></td>';
                                            if($ii % 16 == 0){
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                    echo '</tbody></table>';
                                    $halfbool = false;
                                    $red = false;
                                    $green = false;
                                }
                            }
                        }
                        if(isset($_GET['textinput'])){
                            if($_GET['textinput'] == ''){
                                $chars = mb_str_split('　　　　　　　　　　　　　　　　　　　　');
                            }else{
                                $chars = mb_str_split($_GET['textinput']);
                            }
                        }else{
                            $chars = mb_str_split('　　　　　　　　　　　　　　　　　　　　');
                        }

                        $skipper = 0;
                        for ($c = 0; $c < count($chars); $c++) {
                            if(empty($skip_tx[$skipper])){
                                looper($text, $chars, $c, $width, $dott, $skip_ct_tx, $half_ct_tx, $red, $green);
                            }else{
                                if($c != $skip_tx[$skipper]){
                                    looper($text, $chars, $c, $width, $dott, $skip_ct_tx, $half_ct_tx, $red, $green);
                                }else{
                                    $skipper++;
                                }
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
            <form acthon="signbord.php" method="GET">
                <?php
                    for ($j = 1; $j < 5; $j++) {
                        echo '<div class="trainbord">
                            <p>'.$j.'列車目</p>
                            <div>
                                <fieldset>
                                    <legend>列車情報</legend>
                                    <label for="type'.$j.'">種別：</label>
                                    <select id="type'.$j.'" name="type'.$j.'input">
                                    </select>
                                    <label for="destination'.$j.'">行先：</label>
                                    <select id="destination'.$j.'" name="destination'.$j.'input">
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <legend>出発時刻</legend>
                                    <input id="time'.$j.'h" type="number" name="time'.$j.'hinput" min="0" max="23" value="12">
                                    <label for="time'.$j.'h">時</label>
                                    <input id="time'.$j.'m" type="number" name="time'.$j.'minput" min="0" max="59" value="0">
                                    <label for="time'.$j.'m">分発</label>
                                </fieldset>
                                <fieldset>
                                    <legend>乗車位置/列車案内</legend>
                                    <label for="ridepos'.$j.'">印：</label>
                                    <select id="ridepos'.$j.'" name="ridepos'.$j.'input">
                                    </select>
                                    <label for="ridepos'.$j.'num">番号：</label>
                                    <select id="ridepos'.$j.'num" name="ridepos'.$j.'numinput">
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <legend>遅れ</legend>
                                    <input type="radio" value="false" id="behind'.$j.'f" name="behind'.$j.'input" checked>
                                    <label for="behind'.$j.'f">なし</label>
                                    <input type="radio" value="true" id="behind'.$j.'t" name="behind'.$j.'input">
                                    <label for="behind'.$j.'t">あり</label>
                                    <input id="behind'.$j.'time" name="behind'.$j.'timeinput" min="3" max="60" value="3" disabled>
                                    <label for="behind'.$j.'time">分遅れ</label>
                                </fieldset>
                            </div>
                        </div>';
                    }
                ?>
                <div class="trainbord">
                    <p>その他案内</p>
                    <div>
                        <label for="text"></label>
                        <textarea id="text" name="textinput" <?php 
                            if(isset($_GET['textinput'])){
                                $randArr = [
                                    'この電車は回送電車です。ご乗車いただけません。',
                                    '次は　西長野　',
                                    '海は広いし大きい',
                                    '日本人ならおあずけやろが。',
                                    'スターライトパレード'
                                ];
                                if($_GET['textinput'] == ""){
                                    echo 'placeholder="'.$randArr[rand(0,4)].'"';
                                }
                            }
                        ?>><?php 
                            if(isset($_GET['textinput'])){
                                if($_GET['textinput'] != ""){
                                    echo $_GET['textinput'];
                                }
                            }
                        ?></textarea>
                    </div>
                </div>
                <button type="submit" class="wide-btn">決定</button>
            </form>
            <p>
                <a class="link-ace" href="index.php">LEDボードへ</a>
            </p>
            <div class="guide">
                <h2>使い方ガイド</h2>
                <ol>
                    <li>
                        JR西日本の発車標を模したものとなっております。
                    </li>
                    <li>
                        種別・行先・出発時刻・乗車位置の他、列車の遅れ時分表示、
                        さらには特急列車の場合は乗車位置の選択ができなくなる代わりに列車愛称を設定することもできます。
                    </li>
                </ol>
            </div>
            <div style="display:none;">
                <?php
                    for ($j = 1; $j < 5; $j++) {
                        if(isset($_GET['type'.$j.'input'])){
                            echo '<div id="type'.$j.'_js">'.$_GET['type'.$j.'input'].'</div>';
                        }
                        if(isset($_GET['ridepos'.$j.'input'])){
                            echo '<div id="ridepos'.$j.'_js">'.$_GET['ridepos'.$j.'input'].'</div>';
                        }
                        if(isset($_GET['ridepos'.$j.'numinput'])){
                            echo '<div id="ridepos'.$j.'num_js">'.$_GET['ridepos'.$j.'numinput'].'</div>';
                        }
                        if(isset($_GET['time'.$j.'hinput'])){
                            echo '<div id="time'.$j.'h_js">'.$_GET['time'.$j.'hinput'].'</div>';
                        }
                        if(isset($_GET['time'.$j.'minput'])){
                            echo '<div id="time'.$j.'m_js">'.$_GET['time'.$j.'minput'].'</div>';
                        }
                        if(isset($_GET['behind'.$j.'input'])){
                            echo '<div id="behind'.$j.'_js">'.$_GET['behind'.$j.'input'].'</div>';
                        }
                        if(isset($_GET['behind'.$j.'timeinput'])){
                            echo '<div id="behind'.$j.'time_js">'.$_GET['behind'.$j.'timeinput'].'</div>';
                        }
                        if(isset($_GET['destination'.$j.'input'])){
                            echo '<div id="destination'.$j.'_js">'.$_GET['destination'.$j.'input'].'</div>';
                        }
                        if(isset($_GET['textinput'])){
                            echo '<div id="text_js">'.$_GET['textinput'].'</div>';
                        }
                    }
                ?>
            </div>
        </main>
        <footer></footer>
        <script src="js/script.js"></script>
        <script src="js/signbord.js"></script>
    </body>
</html>
