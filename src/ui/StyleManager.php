<?php
namespace src\ui;

class StyleManager{

    public static function addPart($key){
        $style['base'] = '
            *{border:0;margin:0;padding:0;outline:none;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}
            html,body,._li{height:100%}html{font-family:\'Roboto\',\'Noto\',\'sans-serif\', arial, helvetica;font-size:14px}body{-webkit-font-smoothing:antialiased;-webkit-tap-highlight-color:transparent;text-rendering:optimizeLegibility}
            a{text-decoration:none;color:inherit;display:block}.rl{position:relative}.Jw{position:relative;display:inline-block;vertical-align:top}.jF{float:none}.jL{float:left}.jR{float:right}.jO{position:relative;overflow:hidden}.scrim{position:fixed;z-index:1010;width:100%;height:100%;background-color:rgba(0, 0, 0, 0.12)}
            .HiddenEle{display:none}.ContextMenu{position:fixed;height:0;z-index:1025}button,input,textarea{-webkit-appearance:none;background:transparent}.Selected{background-color:rgba(0, 0, 0, 0.07)}
            button[raised]{
                box-shadow: 0px 2px 2px rgba(0,0,0,0.14), 0px 1px 5px 0px rgba(0,0,0,0.12), 0px 3px 1px -2px rgba(0,0,0,0.2)
            }
            button:disabled{
                opacity:0.5;
                cursor:default
            }
            button::-moz-focus-inner{
                border: 0;
            }
            .md-icon{
                width:24px;
                height:24px;
                display:inline-block;
                background-repeat:no-repeat;
                background-size:100%
            }
        ';
        $style['appbar'] = "
            .appbar{
                box-shadow:0px 1px 1px 0 rgba(0, 0, 0, 0.18)
            }
            .Yjj8{
                display:flex
            }
            .nj93{
                margin-left:auto;
                padding-right:24px
            }
            .s0Wk{
                padding:7px 0px
            }
            .Eu73{
                height:34px;
                font-size:14px;
                padding:0px 10px 0px 32px;
                border:1px solid #999;
                border-radius:4px
            }
            .Y8du{
                position:absolute;
                height:24px;
                width:24px;
                margin:5px
            }
            .Ejf8 .__text{
                text-transform:none!important
            }
            .JctY{
                position:relative;
                margin:0 24px;
                padding:10px 0
            }
            .J8y8{
                font-size:16px;
                line-height:28px
            }
            .Js73{
                position:relative;
                display:flex;
                padding:5px 5px 5px 12px;
                border-radius:2px;
                background-color:#F4F4F4
            }
            .Js73 > div {
                line-height:24px;
                height:24px;
            }
            .Js73 .Mcw {
                font-size:14px;
                margin-right:6px
            }
        ";
        $style['base_icons'] = "
            /* Search */
            ._ic_0e4{background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAABa0lEQVR4AeyWtUIYQRBAX6yLu0uH08Q9ZfInNHF36UKFlHwHNLi7u2uNN9hgg3PsCVtx753fzOkalgkJieErOXQwsWAHOXwjZjcvXohsYy7xBOYgycwhDs6RzEECcJZyxGA5Z/HJIUoQVAp4z22OL3ibdxs+WgmH8EUqorZzl83cpR1RU/FBDKI2cMrhAzYgaiyeydDUQc7hxDkGNSoDj1xH1CfsxDNEvYEnXmtaNiayNPK1vw+UgIkEfx+pRdOiMRGlkS14YlLTjmHimEZO4IlxTTuCiSMaOYkn2jQtChORGtlr+ycX4YlXrotptkb+wxM3XFa0J4j60E5TMaRRNXgmHlEbOevQ2DUi6gt8kGJorjsQNW23OpxbnOQEt3lPMYLKNJdsdpkjuv5lo9MX/nMBUT/jk3iHYUs9zwGQ4LeAaHTgxTgtpPOLpyj8Dn4LE4l79RbhLV7bvsVnsHmLz1gk0e7lQ0LmRzMAAAU5VLMEuZJZAAAAAElFTkSuQmCC')}
            /* Checkbox off */
            ._ic_0e5{background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAAbElEQVR4Ae3XoRWAMBAE0WkBAQ+6B0qAmsAkqeEw2DXhcPtXJ2MTzNLNnFSic5WTGbSBm/i4mxFpJRK2I5WUQEGKd730eQcccMABBxxwwAHBAQeEi0jY9ffzfUOaUj4gA2gLB6378sbBQjKzB/T87xaMP8L1AAAAAElFTkSuQmCC')}
            /* More vert */
            ._ic_0e6{background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAAZElEQVR4Ae3UgQXAMBRF0btCkUq2b1dodKSkSDtDGhQfoCRovfM2+J+LiLziiZxtEc8Ajkx9djDR3UI1W+muUM0K3SWqWfrgiWbz5IxjgMDO1bYRkJ9Si9QitUhGUovUIrVIRG5XfJJoggjXeQAAAABJRU5ErkJggg==')}
        ";
        $style['base_selections'] = "
            .md-checkbox{
                position:relative;
                display:inline-block;
                width:24px;
                height:24px;
                padding:4px;
                -webkit-box-sizing:content-box;
                -moz-box-sizing:content-box;
                -ms-box-sizing:content-box;
                box-sizing:content-box;
                border-radius:100%;
                cursor:pointer
            }
            .md-checkbox>.md-icon{
                pointer-events:none;
            }
            .md-checkbox>.md-ripple{

            }
            .md-checkbox>.md-ripple>.ripple{
                background-color:#6200EE
            }
            .md-checkbox:checked{
            }
            .md-checkbox[data-checked=true]{

            }
        ";
        $style['base_tab'] = "
            .md-tabs{
                position:relative;
                display:-ms-flexbox;
                display:-webkit-flex;
                display:flex;
                font-size:14px;
                -webkit-user-select:none;
                -moz-user-select:none;
                -ms-user-select:none;
                user-select:none;
                -webkit-tap-highlight-color:rgba(0,0,0,0);
                -webkit-tap-highlight-color:transparent;
            }
            
            .md-tab{
                display:-ms-inline-flexbox;
                display:-webkit-inline-flex;
                display:inline-flex;
                -ms-flex-align:center;
                -webkit-align-items:center;
                align-items:center;
                -ms-flex-pack:center;
                -webkit-justify-content:center;
                justify-content:center;
                -ms-flex:1 1 auto;
                -webkit-flex:1 1 auto;
                flex:1 1 auto;
                position:relative;
                padding:0px 16px;
                min-height:48px;
                max-height:72px;
                min-width:90px;
                max-width:360px;
                cursor:pointer;
                vertical-align:middle
            }
            
            .md-tab .__inner{
                height:100%;
                display:-ms-flexbox;
                display:-webkit-flex;
                display:flex;
                -ms-flex-direction:row;
                -webkit-flex-direction:row;
                flex-direction:row;
                -ms-flex-align:center;
                -webkit-align-items:center;
                align-items:center;
                -ms-flex-pack:center;
                -webkit-justify-content:center;
                justify-content:center;
                -ms-flex:1 1 auto;
                -webkit-flex:1 1 auto;
                flex:1 1 auto
            }
            
            .md-tab .__text{
                font-family:'Roboto', 'Noto', 'sans-serif', arial, helvetica;
                font-size:14px;
                font-weight:normal;
                text-transform:uppercase
            }
            
            .md-tab .__icon{
                
            }
            .md-tab-indicator{
                position:absolute;
                height:0;
                bottom:0;
                border-bottom:2px solid #6200EE;
                -webkit-transform-origin:left center;
                transform-origin:left center;
                transition:-webkit-transform;
                transition:.24s cubic-bezier(0.68, 0.22, 0.25, 0.9) transform;
                z-index:10
            }
        ";
        $style['base_button'] = "
            .md-menu-button{
                width:24px;
                height:24px;
                padding:4px;
                -webkit-box-sizing:content-box;
                -moz-box-sizing:content-box;
                -ms-box-sizing:content-box;
                -o-box-sizing:content-box;
                box-sizing:content-box
            }
            
            .md-button{
                display:-ms-inline-flexbox;
                display:-webkit-inline-flex;
                display:inline-flex;
                -ms-flex-align:center;
                -webkit-align-items:center;
                align-items:center;
                -ms-flex-pack:center;
                -webkit-justify-content:center;
                justify-content:center;
                position:relative;
                min-width:64px;
                min-height:36px;
                padding:0px 12px;
                text-transform:uppercase;
                font:inherit;
                vertical-align:baseline;
                -webkit-box-sizing:border-box;
                -moz-box-sizing:border-box;
                -ms-box-sizing:border-box;
                box-sizing:border-box;
                border-radius:4px;
                -webkit-tap-highlight-color:rgba(0, 0, 0, 0);
                -webkit-tap-highlight-color:transparent;
                outline-width:0;
                -webkit-user-select:none;
                -moz-user-select:none;
                -ms-user-select:none;
                cursor:pointer;
                z-index:0;
                -webkit-font-smoothing:antialiased
            }
        ";
        $style['base_ripple'] = "
            .md-ripple{
                display:block;
                overflow:hidden;
                border-radius:inherit;
                -webkit-mask-image:-webkit-radial-gradient(circle,#FFF,#000);
                mask-image:-moz-radial-gradient(circle, #FFF, #000);
                mask-image:radial-gradient(circle, #FFF, #000)
            }
            .md-ripple, .md-riple.fill::after{
                position:absolute;
                top:0;
                left:0;
                right:0;
                bottom:0;
                content:''
            }
            .md-ripple.fill{
                border-radius:1000000px
            }
            .md-ripple .ripple{
                position:absolute;
                border-radius:100%;
                background:currentColor;
                opacity:0.2;
                width:0;
                height:0;
                -webkit-transition:-webkit-transform 0.4s ease-out, opacity 0.4s ease-out;
                -moz-transition:-moz-transform 0.4s ease-out, opacity 0.4s ease-out;
                -ms-transition:-ms-transform 0.4s ease-out, opacity 0.4s ease-out;
                -o-transition:-o-transform 0.4s ease-out, opacity 0.4s ease-out;
                transition:transform 0.4s ease-out, opacity 0.4s ease-out;
                -webkit-transform:scale(0);
                -moz-transform:scale(0);
                -ms-transform:scale(0);
                -o-transform:scale(0);
                transform:scale(0);
                pointer-events:none;
                -webkit-touch-callout:none;
                -webkit-user-select:none;
                -khtml-user-select:none;
                -moz-user-select:none;
                -ms-user-select:none;
                user-select:none;
                will-change:transform
            }
            .md-ripple .ripple.held{
                opacity:0.4;
                -webkit-transform:scale(1);
                -moz-transform:scale(1);
                -ms-transform:scale(1);
                -o-transform:scale(1);
                transform:scale(1);
            }
            .md-ripple .ripple.done{
                opacity:0
            }
        ";
        $style['base_menu'] = '
            .Mvt{-webkit-transform:scale(1)!important;-moz-transform:scale(1)!important;-ms-transform:scale(1)!important;-o-transform:scale(1)!important;transform:scale(1)!important;}.Mw0{-webkit-transition:.3s ease;-moz-transition:.3s ease;-ms-transition:.3s ease;-o-transition:.3s ease;transition:.3s ease}.Mg3{visibility:hidden;-webkit-transform:scale(0.8);-moz-transform:scale(0.8);-ms-transform:scale(0.8);-o-transform:scale(0.8);transform:scale(0.8);will-change:transform}.Mg4{visibility:hidden;-webkit-transform:scale(0);-moz-transform:scale(0);-ms-transform:scale(0);-o-transform:scale(0);transform:scale(0);will-change:transform}.yM{min-width:112px;max-width:280px;border-radius:4px}.Me{padding:8px 0px;background-color:#FFF;color:#222;box-shadow:0 3px 6px 0 rgba(0, 0, 0, 0.16)}.Me>div{-webkit-transition:opacity .2s ease;-moz-transition:opacity .2s ease;-ms-transition:opacity .2s ease;-o-transition:opacity .2s ease;transition:opacity .2s ease;opacity:0}.Me .Jh{display:block;position:relative;padding:0px 16px;min-height:48px}.Me .Wdm{display:flex;-ms-flex-direction:row;:-webkit-flex-direction:row;flex-direction:row;-ms-flex-align:center;-webkit-align-items:center;align-items:center;font-family:\'sans-serif\',arial,helvetica;-webkit-font-smoothing:antialiased;font-weight:300;line-height:48px}
        ';
        $style['base_input'] = "
            .md-input{
                position:relative;
                min-width:240px;
                min-height:52px;
                padding-left:12px;
                padding-right:12px;
                font-size:15px;
            }
            .md-input + label{
                position:absolute;
                left:8px;
                padding:0 8px;
                margin-top:16px;
                line-height:17px;
                font-size:16px;
                cursor:text;
                pointer-events:none;
                -webkit-transition:transform 150ms cubic-bezier(0.4,0,0.2,1),opacity 150ms cubic-bezier(0.4,0,0.2,1);
                -moz-transition:.08s linear;
                -ms-transition:.08s linear;
                -o-transition:.08s linear;
                transition:transform 150ms cubic-bezier(0.4,0,0.2,1),opacity 150ms cubic-bezier(0.4,0,0.2,1);
            }
            .md-input + label + span{
                position:relative;
                display:block;
                width:100%;
                background:#6200EE
            }
            .md-input + label + span::before, .md-input + label + span::after{
                content:'';
                background:inherit;
                height:2px;
                bottom:0px;
                width:0;
                position:absolute;
                -webkit-transition:.2s ease;
                -moz-transition:.2s ease;
                -ms-transition:.2s ease;
                -o-transition:.2s ease;
                transition:.2s ease;
            }
            .md-input + label + span::before{
                left:50%
            }
            .md-input + label + span::after{
                right:50%
            }
            .md-input:focus ~ .md-bar::before, .md-input:focus ~ .md-bar::after{
                width:50%
            }     
            .md-active__normal{
                margin-bottom:28px!important;
                font-size:12px!important
            }
            .md-normal{
                min-height:52px;
                padding:0;
                padding-top:20px;
                border-bottom:1px solid #E2E2E2
            }
            .md-normal + label{
                margin:0;
                bottom:6px;
                color:#777777;
            }
            .md-filled{
                background-color:#E8E8E8;
                border-bottom:1px solid transparent;
                border-top-left-radius:4px;
                border-top-right-radius:4px;
                padding-top:16px;
            }
            .md-outline{
                background-color:transparent;
                border:1px solid #CCCCCC;
                border-radius:4px
            }
            .md-outline + label{
                color: #777777
            }

            .md-filled + label{
                padding:0 4px
            }
            .__helper{
                position:absolute;
                font-size:12px;
                margin-top:8px
            }
            .md-outline + .__active{
                color:#6200EE;
                -webkit-transform:scale(.75) translateY(-32px);
                transform:scale(.75) translateY(-32px);
                transform-origin:top left;
            }
            .md-filled + .__active{
                color:#6200EE;
                -webkit-transform:scale(.75) translateY(-11px);
                transform:scale(.75) translateY(-11px);
                transform-origin:top left;
            }
            input.error{
                border:2px solid red!important
            }
            input.error+label{
                color:red!important;
            }
        ";
        $style['base_snackbar'] = "
            .md-snackbar{
                display:flex;
                position:fixed;
                min-width:344px;
                padding:6px 0px;
                left:32px;
                bottom:32px;
                align-items:center;
                justify-content:flex-start;
                background-color:#323232;
                border-radius:4px;
                -webkit-transition:.25s ease;
            }
            .md-snackbar .__text{
                display:flex;
                margin-right:auto;
                padding-left:16px;
                align-items:center;
                font-size:14px;
                font-family:\'Roboto\',\'Noto\',\'sans-serif\',arial,helvetica;
                color:#FCFCFC;
            }
            .md-snackbar .__action{
                font-weight:500;
                font-family:\'Roboto\',\'Noto\',\'sans-serif\',arial,helvetica;
                min-height:36px;
                padding:0px 6px;
                margin:0px 8px;
                background:transparent;
                cursor:pointer;
                -webkit-user-select:none;
                -moz-user-select:none;
                user-select:none;
                color:#6200EE
            }
        ";
        
        // $style['base_snackbar'] = '.Nz0{bottom:32px!important}.
        //Nsb{display:flex;position:fixed;min-width:344px;padding:6px 0px;align-items:center;justify-content:flex-start;left:32px;bottom:-100px;-webkit-transition:.25s ease;background-color:#323232;border-radius:4px}
        //.Nst{display:flex;margin-right:auto;padding-left:16px;align-items:center;font-size:14px;font-family:\'sans-serif\',arial,helvetica;color:#FCFCFC;}
        //.Nas{padding-left:8px;padding-right:8px}
        //.Nba{font-weight:500;font-family:\'Roboto\',\'Noto\',\'sans-serif\',arial,helvetica;min-height:36px;padding:0px 6px;background:transparent;cursor:pointer;-webkit-user-select:none;color:#6200EE}';
        
        $style['base_dialog'] = '.DdL{min-width:280px;border-radius:4px}.DnY{background-color:#FFFFFF;box-shadow:0 3px 11px 0 rgba(0, 0, 0, 0.21)}.Dc6{opacity:0}.DtG{position:relative;font-family:\'Roboto\',\'Noto\',\'sans-serif\', arial;font-size:20px;padding:0px 24px}.DaD{position:relative;font-family:\'Roboto\',\'Noto\',\'sans-serif\', arial;font-size:16px;line-height:initial;padding:0px 24px}.Mw0>div:first-child{line-height:64px}.DJw{position:relative;overflow:hidden;line-height:initial}.Dvy{text-align:right;position:relative;line-height:initial;padding-left:24px;padding-right:8px;padding-top:8px;padding-bottom:8px}.Dvy .Dn0:first-child{margin-right:8px}.Dn0{color:#6200EE}.DwI{color:#777777}';
        $style['base_banner'] = '.Mb9{width:100%;background-color:#FFFFFF;border-bottom:1px solid #EFEFEF;position:fixed;visibility:hidden;-webkit-transition:.4s ease;z-index:1004}.MbW{-webkit-transform:translateY(-800px);-moz-transform:translateY(-800px);-ms-transform:translateY(-800px);-o-transform:translateY(-800px);transform:translateY(-800px);will-change:transform}.Mb7{position:relative;margin:0 auto;max-width:720px}.MsW{font-family:\'Roboto\',\'Noto\',\'sans-serif\', arial;font-size:14px}.MyN{display:flex;padding-left:24px;margin-right:auto;align-items:center;line-height:36px}.Mb2{-webkit-transform:translateY(0px);}.McE{display:flex;position:relative;padding-top:8px;padding-bottom:8px}.Mni{margin-right:8px;font-weight:500}';

        return preg_replace("/\t|\n|\s\s\s\s/", "", $style[$key]);
    }

}
