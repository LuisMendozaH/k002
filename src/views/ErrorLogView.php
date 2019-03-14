<!DOCTYPE html>
<html lang="es">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <title>{{title}}</title>
    <style><?php print (src\ui\StyleManager::addPart('base')); ?></style>
    <style>.md-red50 {background-color:#FFEBEE;color:#000000}.md-red100 {background-color:#FFCDD2;color:#000000}.md-red200 {background-color:#EF9A9A;color:#000000}.md-red300 {background-color:#E57373;color:#000000}.md-red400 {background-color:#EF5350;color:#FFFFFF}.md-red500 {background-color:#F44336;color:#FFFFFF}.md-red600 {background-color:#E53935;color:#FFFFFF}.md-red700 {background-color:#D32F2F;color:#FFFFFF}.md-red800 {background-color:#C62828;color:#FFFFFF}.md-red900 {background-color:#B71C1C;color:#FFFFFF}.md-red-accent100 {color:#FF1744!important}.md-red-accent200 {color:#D50000!important}.md-pink50 {background-color:#FCE4EC;color:#000000}.md-pink100 {background-color:#F8BBD0;color:#000000}.md-pink200 {background-color:#F48FB1;color:#000000}.md-pink300 {background-color:#F06292;color:#000000}.md-pink400 {background-color:#EC407A;color:#FFFFFF}.md-pink500 {background-color:#E91E63;color:#FFFFFF}.md-pink600 {background-color:#D81B60;color:#FFFFFF}.md-pink700 {background-color:#C2185B;color:#FFFFFF}.md-pink800 {background-color:#AD1457;color:#FFFFFF}.md-pink900 {background-color:#880E4F;color:#FFFFFF}.md-pink-accent100 {color:#FF4081!important}.md-pink-accent200 {color:#F50057!important}.md-purple50 {background-color:#F3E5F5;color:#000000}.md-purple100 {background-color:#E1BEE7;color:#000000}.md-purple200 {background-color:#CE93D8;color:#000000}.md-purple300 {background-color:#BA68C8;color:#FFFFFF}.md-purple400 {background-color:#AB47BC;color:#FFFFFF}.md-purple500 {background-color:#9C27B0;color:#FFFFFF}.md-purple600 {background-color:#8E24AA;color:#FFFFFF}.md-purple700 {background-color:#7B1FA2;color:#FFFFFF}.md-purple800 {background-color:#6A1B9A;color:#FFFFFF}.md-purple900 {background-color:#4A148C;color:#FFFFFF}.md-purple-accent100 {color:#EA80FC!important}.md-purple-accent200 {color:#D500F9!important}.md-indigo50 {background-color:#E8EAF6;color:#000000}.md-indigo100 {background-color:#C5CAE9;color:#000000}.md-indigo200 {background-color:#9FA8DA;color:#000000}.md-indigo300 {background-color:#7986CB;color:#FFFFFF}.md-indigo400 {background-color:#5C6BC0;color:#FFFFFF}.md-indigo500 {background-color:#3F51B5;color:#FFFFFF}.md-indigo600 {background-color:#3949AB;color:#FFFFFF}.md-indigo700 {background-color:#303F9F;color:#FFFFFF}.md-indigo800 {background-color:#283593;color:#FFFFFF}.md-indigo900 {background-color:#1A237E;color:#FFFFFF}.md-indigo-accent100 {color:#8C9EFF!important}.md-indigo-accent200 {color:#536DFE!important}.md-blue50 {background-color:#E3F2FD;color:#000000}.md-blue100 {background-color:#BBDEFB;color:#000000}.md-blue200 {background-color:#90CAF9;color:#000000}.md-blue300 {background-color:#64B5F6;color:#000000}.md-blue400 {background-color:#42A5F5;color:#000000}.md-blue500 {background-color:#2196F3;color:#000000}.md-blue600 {background-color:#1E88E5;color:#FFFFFF}.md-blue700 {background-color:#1976D2;color:#FFFFFF}.md-blue800 {background-color:#1565C0;color:#FFFFFF}.md-blue900 {background-color:#0D47A1;color:#FFFFFF}.md-blue-accent100 {color:#82B1FF!important}.md-blue-accent200 {color:#2979FF!important}.md-cyan50 {background-color:#E0F7FA;color:#000000}.md-cyan100 {background-color:#B2EBF2;color:#000000}.md-cyan200 {background-color:#80DEEA;color:#000000}.md-cyan300 {background-color:#4DD0E1;color:#000000}.md-cyan400 {background-color:#26C6DA;color:#000000}.md-cyan500 {background-color:#00BCD4;color:#000000}.md-cyan600 {background-color:#00ACC1;color:#000000}.md-cyan700 {background-color:#0097A7;color:#FFFFFF}.md-cyan800 {background-color:#00838F;color:#FFFFFF}.md-cyan900 {background-color:#006064;color:#FFFFFF}.md-cyan-accent100 {color:#18FFFF!important}.md-cyan-accent200 {color:#00E5FF!important}.md-teal50 {background-color:#E0F2F1;color:#000000}.md-teal100 {background-color:#B2DFDB;color:#000000}.md-teal200 {background-color:#80CBC4;color:#000000}.md-teal300 {background-color:#4DB6AC;color:#000000}.md-teal400 {background-color:#26A69A;color:#000000}.md-teal500 {background-color:#009688;color:#FFFFFF}.md-teal600 {background-color:#00897B;color:#FFFFFF}.md-teal700 {background-color:#00796B;color:#FFFFFF}.md-teal800 {background-color:#00695C;color:#FFFFFF}.md-teal900 {background-color:#004D40;color:#FFFFFF}.md-teal-accent100 {color:#64FFDA!important}.md-teal-accent200 {color:#1DE9B6!important}.md-green50 {background-color:#E8F5E9;color:#000000}.md-green100 {background-color:#C8E6C9;color:#000000}.md-green200 {background-color:#A5D6A7;color:#000000}.md-green300 {background-color:#81C784;color:#000000}.md-green400 {background-color:#66BB6A;color:#000000}.md-green500 {background-color:#4CAF50;color:#000000}.md-green600 {background-color:#43A047;color:#FFFFFF}.md-green700 {background-color:#388E3C;color:#FFFFFF}.md-green800 {background-color:#2E7D32;color:#FFFFFF}.md-green900 {background-color:#1B5E20;color:#FFFFFF}.md-green-accent100 {color:#69F0AE!important}.md-green-accent200 {color:#00E676!important}.md-lime50 {background-color:#F9FBE7;color:#000000}.md-lime100 {background-color:#F0F4C3;color:#000000}.md-lime200 {background-color:#E6EE9C;color:#000000}.md-lime300 {background-color:#DCE775;color:#000000}.md-lime400 {background-color:#D4E157;color:#000000}.md-lime500 {background-color:#CDDC39;color:#000000}.md-lime600 {background-color:#C0CA33;color:#000000}.md-lime700 {background-color:#AFB42B;color:#000000}.md-lime800 {background-color:#9E9D24;color:#000000}.md-lime900 {background-color:#827717;color:#FFFFFF}.md-lime-accent100 {color:#EEFF41!important}.md-lime-accent200 {color:#C6FF00!important}.md-yellow50 {background-color:#FFFDE7;color:#000000}.md-yellow100 {background-color:#FFF9C4;color:#000000}.md-yellow200 {background-color:#FFF59D;color:#000000}.md-yellow300 {background-color:#FFF176;color:#000000}.md-yellow400 {background-color:#FFEE58;color:#000000}.md-yellow500 {background-color:#FFEB3B;color:#000000}.md-yellow600 {background-color:#FDD835;color:#000000}.md-yellow700 {background-color:#FBC02D;color:#000000}.md-yellow800 {background-color:#F9A825;color:#000000}.md-yellow900 {background-color:#F57F17;color:#000000}.md-yellow-accent100 {color:#FFFF00!important}.md-yellow-accent200 {color:#FFD600!important}.md-orange50 {background-color:#FFF3E0;color:#000000}.md-orange100 {background-color:#FFE0B2;color:#000000}.md-orange200 {background-color:#FFCC80;color:#000000}.md-orange300 {background-color:#FFB74D;color:#000000}.md-orange400 {background-color:#FFA726;color:#000000}.md-orange500 {background-color:#FF9800;color:#000000}.md-orange600 {background-color:#FB8C00;color:#000000}.md-orange700 {background-color:#F57C00;color:#000000}.md-orange800 {background-color:#EF6C00;color:#000000}.md-orange900 {background-color:#E65100;color:#FFFFFF}.md-orange-accent100 {color:#FF9100!important}.md-orange-accent200 {color:#FF6D00!important}.md-brown50 {background-color:#EFEBE9;color:#000000}.md-brown100 {background-color:#D7CCC8;color:#000000}.md-brown200 {background-color:#BCAAA4;color:#000000}.md-brown300 {background-color:#A1887F;color:#FFFFFF}.md-brown400 {background-color:#8D6E63;color:#FFFFFF}.md-brown500 {background-color:#795548;color:#FFFFFF}.md-brown600 {background-color:#6D4C41;color:#FFFFFF}.md-brown700 {background-color:#5D4037;color:#FFFFFF}.md-brown800 {background-color:#4E342E;color:#FFFFFF}.md-brown900 {background-color:#3E2723;color:#FFFFFF}.md-gray50 {background-color:#FAFAFA;color:#000000}.md-gray100 {background-color:#F5F5F5;color:#000000}.md-gray200 {background-color:#EEEEEE;color:#000000}.md-gray300 {background-color:#E0E0E0;color:#000000}.md-gray400 {background-color:#BDBDBD;color:#000000}.md-gray500 {background-color:#9E9E9E;color:#000000}.md-gray600 {background-color:#757575;color:#FFFFFF}.md-gray700 {background-color:#616161;color:#FFFFFF}.md-gray800 {background-color:#424242;color:#FFFFFF}.md-gray900 {background-color:#212121;color:#FFFFFF}</style>
    <style><?php print (src\ui\StyleManager::addPart('base_icons')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('appbar')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_ripple')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_selections')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_tab')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_button')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_input')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_menu')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_snackbar')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_dialog')); ?></style>
    <style><?php print (src\ui\StyleManager::addPart('base_banner')); ?></style>
    <style>body{background-color:#FFF}</style>
    <link rel="preload" href="js/base.js" as="script" crossorigin="anonymous">
    <script></script>
    <script src="js/base.js" crossorigin="anonymous"></script>
    <script></script>
    <script>
        require(["ResourceLoader"], function(ResourceLoader) {
            ResourceLoader.setMap({"LyA7" :{
                "type" : "js", "src" : "js/Y8fkwV.js", "crossOrigin" : 1}, "Yu84" : {
                "type" : "css", "src" : "css/Wi48k9.css", "crossOrigin" : 1}, "Js8w" : {
                "type" : "js", "src" : "js/Hw8Cs7.js", "crossOrigin" : 1}
            });
            ResourceLoader.enableMapLoader({"BaseCore" :{"resources" : ["LyA7"]}});
        });
    </script>
    <link rel="apple-touch-icon" sizes="180x180" href="img/a/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/a/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/a/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/a/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="img/a/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, height=device-height, minimum-scale=1.0, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=EDGE">
    <meta name="title" content=""> 
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="">
    <meta property="og:image:height" content="">
</head>
<body>
<script></script>
<div class="_li">
    <div class="scrim HiddenEle"></div>
    <?php /*$this->view->render("appbar/default.html", $this->client_data);*/ ?>
    <div class="" style="position:relative;padding-top:48px">
        <div class="Cw Ws"></div>
        <div class="Cw We">
            <?php $this->view->render("form/log_table.html", $this->client_data) ?>
        </div>
        <div class="Cw Ws"></div>
    </div>
</div>
<script></script>
</body>
</html>