<?php
    # phpinfo();
    $text = Array();
    $dott = Array();
    $width = Array();

    $skip = Array();
    $skip_ct = 0;
    $half_ct = 0;
    $red = false;
    $green = false;

    $json = file_get_contents('API/textdata.json');
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

    if(isset($_POST['textinput'])){
        if($_POST['textinput'] == ''){
            $chars = mb_str_split('ジェネレーター');
        }else{
            $chars = mb_str_split($_POST['textinput']);
        }
    }else{
        $chars = mb_str_split('ジェネレーター');
    }

    for ($c = 0; $c < count($chars); $c++) {
        for ($i = 0; $i < count($text); $i++) {
            if($text[$i] == $chars[$c]) {
                if($width[$i] == 'half'){
                    $half_ct++;
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
                                    $skip[$skip_ct] = $c + 1;
                                    $skip[$skip_ct + 1] = $c + 2;
                                    $skip_ct = $skip_ct + 2;
                                    $half_ct--;
                                    break;
                                case '\\':
                                    break;
                                default:
                                    $skip[$skip_ct] = $c + 1;
                                    $skip_ct = $skip_ct++;
                                    $half_ct--;
                                    break;
                            }
                        }else{
                            $skip[$skip_ct] = $c + 1;
                            $skip_ct = $skip_ct++;
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
        <link rel="stylesheet" href="CSS/styles.css" />
        <style>
            table td{
                width:3px;
                height:3px;
                min-width:3px;
                min-height:3px;
                aspect-ratio: 1 / 1;
            }

            .textmain{
                position: relative;
                width:640px;
                border:1px solid #c0c0c0;
                background-color:#000000;
                display:flex;
                overflow: hidden;
            }

            .scroller{
                animation:scroll;
                    animation-duration:<?php
                    if(isset($_POST['textinput'])){
                        $chars = mb_str_split($_POST['textinput']);
                
                        if((count($chars) - ($half_ct * 0.5)) > 8){
                            echo ((count($chars) * 1.6) - ($half_ct * 0.8)).'s';
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

            .form-gridder{
                display:grid;
                width:90%;
                background-color:#d8d8d8;
                border-radius:5px;
            }

            label{
                padding:5px;
            }

            textarea{
                height:100px;
                border:1px solid #999999;
                border-radius:5px;
                resize: none;
            }

            @keyframes scroll{
                from{
                    transform:translateX(640px);
                }

                to{
                    transform:translateX(<?php
                        if(isset($_POST['textinput'])){
                            $chars = mb_str_split($_POST['textinput']);
                            if((count($chars) - ($half_ct * 0.5)) > 8){
                                echo '-'.((count($chars) * 80) - ($half_ct * 40)).'px';
                                echo ');(/*'.$half_ct.'*/';
                            }else{
                                echo '-720px';
                            }
                        }else{
                            echo '-720px';
                        }
                    ?>);
                }
            }
        </style>
        <title>LEDジェネレーター｜LEDジェネレーター実験室</title>
        <link rel="icon" href="./favicon.ico">
    </head>
    <body>
        <nav></nav>
        <header></header>
        <main>
            <div class="textmain">
            <?php
                function looper($text, $chars, $c, $width, $dott, $skip_ct, $half_ct, $red, $green){
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
                            if((count($chars)- $skip_ct - ($half_ct * 0.5)) > 8){
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

                $skipper = 0;
                for ($c = 0; $c < count($chars); $c++) {
                    if(empty($skip[$skipper])){
                        looper($text, $chars, $c, $width, $dott, $skip_ct, $half_ct, $red, $green);
                    }else{
                        if($c != $skip[$skipper]){
                            looper($text, $chars, $c, $width, $dott, $skip_ct, $half_ct, $red, $green);
                        }else{
                            $skipper++;
                        }
                    }
                }
            ?>
            </div>
            <form acthon="index.php" method="POST">
                <div class="form-gridder">
                    <label for="text">ここに文章を入力してください。</label>
                    <textarea id="text" name="textinput" <?php 
                        if(isset($_POST['textinput'])){
                            $randArr = [
                                'この電車は回送電車です。ご乗車いただけません。',
                                '次は　西長野　',
                                '海は広いし大きい',
                                '日本人ならおあずけやろが。',
                                'スターライトパレード'
                            ];
                            if($_POST['textinput'] == ""){
                                echo 'placeholder="'.$randArr[rand(0,5)].'"';
                            }
                        }
                    ?>><?php 
                        if(isset($_POST['textinput'])){
                            if($_POST['textinput'] != ""){
                                echo $_POST['textinput'];
                            }
                        }
                    ?></textarea>
                </div>
                <button type="submit" class="wide-btn">決定</button>
            </form>
            <p>
                <a class="link-ace" href="signbord.php?<?php 
                    echo 'type1input=新快速,r&destination1input= 長　浜 &ridepos1input=白△&ridepos1numinput=１～12&time1hinput=12&time1minput=0&';
                    echo 'type2input=普　通,g&destination2input= 京　都 &ridepos2input=白○&ridepos2numinput=１～７&time2hinput=12&time2minput=2&';
                    echo 'type3input=普　通,g&destination3input= 高　槻 &ridepos3input=白○&ridepos3numinput=１～７&time3hinput=12&time3minput=7&';
                    echo 'type4input=快　速,n&destination4input= 大　津 &ridepos4input=黄↑&ridepos4numinput=２～11&time4hinput=12&time4minput=8&';
                ?>">発車標へ</a>
            </p>
            <div class="guide">
                <h2>使い方ガイド</h2>
                <ol>
                    <li>
                        お好きな文字を入力して「決定」ボタンを押してください。
                        すると入力された文字がLEDジェネレーターに反映されます。<br>
                        ※但し、すべての文字に対応しているわけではございません。
                    </li>
                    <li>
                        文字の後ろに「\(バックスラッシュ)」と「r」を打つことで赤文字を再現できます。<br>
                        また、文字の後ろに「\(バックスラッシュ)」と「g」を打つことで緑文字を再現できます。
                    </li>
                    <li>
                        「\(バックスラッシュ)」を入力したい場合は「\\」←このようにバックスラッシュを2本打つことで表示されます。
                    </li>
                </ol>
            </div>
        </main>
        <footer></footer>
        <script src="JAVA/script.js"></script>
    </body>
</html>
