<html><plasmo-csui></plasmo-csui><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style>article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}audio[controls],canvas,video{display:inline-block}[hidden],audio{display:none}mark{background:#FF0;color:#000}</style>
    <meta charset="utf-8">
 <title>Sales ERP | System</title>
    <meta name="description">

         <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/css/styleinvo.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/smoothness/jquery-ui.css">


    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>

@php

 use App\Models\treasury_sak;
    use App\Models\adahyt;
    use App\Models\sak;
     use App\Models\opt;
     use App\Models\adahy_type;
@endphp
<style type="text/css" media="screen">.uv-tray{position:fixed;-webkit-font-smothing:antialias;z-index:100000}.uv-tray.uv-bottom-right{bottom:10px;right:10px}.uv-tray.uv-top-right{top:10px;right:10px}.uv-tray.uv-bottom-left{bottom:10px;left:10px}.uv-tray.uv-top-left{top:10px;left:10px}.uv-tray-item{background:rgba(46,49,51,0.6);border-radius:24px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:inline-block;color:white;cursor:pointer;font-family:sans-serif;font-size:14px;font-weight:100;-webkit-font-smoothing:antialias;line-height:1;margin-left:4px;padding:0 24px;position:relative;-webkit-transition:all 300ms;-moz-transition:all 300ms;-o-transition:all 300ms;transition:all 300ms;width:48px;height:48px;vertical-align:middle;white-space:nowrap}.uv-ie8 .uv-tray-item{background:url(//widget.uservoice.com/images/clients/widget_environment/sixty_percent.png)}.uv-tray-item-hoverinfo{display:block;opacity:0;-webkit-transition:opacity 100ms;-moz-transition:opacity 100ms;-o-transition:opacity 100ms;transition:opacity 100ms;padding-right:48px;overflow:hidden;line-height:48px}.uv-top-left .uv-tray-item-hoverinfo,.uv-bottom-left .uv-tray-item-hoverinfo{padding-left:24px}.uv-top-right .uv-tray-item-hoverinfo,.uv-bottom-right .uv-tray-item-hoverinfo{padding-left:48px}.uv-tray-item-icon{position:absolute;top:0;opacity:0.8;-webkit-transition:opacity 100ms;-moz-transition:opacity 100ms;-o-transition:opacity 100ms;transition:opacity 100ms}.uv-top-right .uv-tray-item-icon,.uv-bottom-right .uv-tray-item-icon{right:0}.uv-top-left .uv-tray-item-icon,.uv-bottom-left .uv-tray-item-icon{left:0}.uv-tray-item-icon svg{width:48px;height:48px}.uv-init .uv-tray-item{background:rgba(46,49,51,0.9);width:245px}.uv-init .uv-tray-item .uv-tray-item-hoverinfo{opacity:1;-webkit-transition:opacity 400ms;-webkit-transition-delay:100ms;-moz-transition:opacity 400ms 100ms;-o-transition:opacity 400ms 100ms;transition:opacity 400ms 100ms}.uv-init .uv-tray-item .uv-tray-item-icon{opacity:1}.uv-ie8 .uv-init .uv-tray-item{background:url(//widget.uservoice.com/images/clients/widget_environment/ninety_percent.png)}.uv-init.uv-top-right .uv-tray-item-hoverinfo,.uv-init.uv-bottom-right .uv-tray-item-hoverinfo{padding-left:0}.uv-tray-item{background:rgba(46,49,51,0.6);width:48px}.uv-ie8 .uv-tray-item{background:url(//widget.uservoice.com/images/clients/widget_environment/sixty_percent.png)}.uv-tray-item:hover{background:rgba(46,49,51,0.9)}.uv-ie8 .uv-tray-item:hover{background:url(//widget.uservoice.com/images/clients/widget_environment/ninety_percent.png)}.uv-tray-item .uv-tray-item-hoverinfo{opacity:0}.uv-tray-item .uv-tray-item-icon{opacity:1}.uv-tray-item.uv-is-selected{background:rgba(46,49,51,0.75)}.uv-ie8 .uv-tray-item.uv-is-selected{background:url(//widget.uservoice.com/images/clients/widget_environment/seventy_five_percent.png)}.uv-tray-item.uv-is-selected:hover{background:rgba(46,49,51,0.9)}.uv-ie8 .uv-tray-item.uv-is-selected:hover{background:url(//widget.uservoice.com/images/clients/widget_environment/ninety_percent.png)}.uv-popover{position:absolute;color:black;z-index:100001}.uv-top-right .uv-popover{top:54px;right:4px}.uv-top-left .uv-popover{top:54px;left:4px}.uv-bottom-right .uv-popover{bottom:54px;right:4px}.uv-bottom-left .uv-popover{bottom:54px;left:4px}@media screen and (max-device-width: 480px){.uv-popover{position:fixed;bottom:10px;right:10px;left:10px;top:10px}}.uv-popover-content{-webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:#f0f3f7;width:325px;-webkit-transition:background 200ms;-moz-transition:background 200ms;-o-transition:background 200ms;transition:background 200ms}.uv-top-left .uv-popover-content,.uv-top-right .uv-popover-content,.uv-below .uv-popover-content{-webkit-box-shadow:rgba(0,0,0,0.3) 0 -10px 60px,rgba(0,0,0,0.1) 0 0 20px;-moz-box-shadow:rgba(0,0,0,0.3) 0 -10px 60px,rgba(0,0,0,0.1) 0 0 20px;box-shadow:rgba(0,0,0,0.3) 0 -10px 60px,rgba(0,0,0,0.1) 0 0 20px}.uv-bottom-left .uv-popover-content,.uv-bottom-right .uv-popover-content,.uv-above .uv-popover-content{-webkit-box-shadow:rgba(0,0,0,0.3) 0 10px 60px,rgba(0,0,0,0.1) 0 0 20px;-moz-box-shadow:rgba(0,0,0,0.3) 0 10px 60px,rgba(0,0,0,0.1) 0 0 20px;box-shadow:rgba(0,0,0,0.3) 0 10px 60px,rgba(0,0,0,0.1) 0 0 20px}@media screen and (max-device-width: 480px){.uv-popover-content{-webkit-box-shadow:rgba(0,0,0,0.6) 0 10px 60px,rgba(0,0,0,0.2) 0 0 20px;-moz-box-shadow:rgba(0,0,0,0.6) 0 10px 60px,rgba(0,0,0,0.2) 0 0 20px;box-shadow:rgba(0,0,0,0.6) 0 10px 60px,rgba(0,0,0,0.2) 0 0 20px;height:100%;width:100%}}@media only screen and (min-device-width: 768px) and (max-device-width: 1024px){.uv-popover-content{width:380px}}.uv-ie8 .uv-popover-content{position:relative}.uv-ie8 .uv-popover-content .uv-popover-content-shadow{display:block;background:black;content:'';position:absolute;left:-15px;top:-15px;width:100%;height:100%;filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius=15,MakeShadow=true,ShadowOpacity=0.30);z-index:-1}.uv-popover-tail{border:8px solid transparent;width:0;z-index:10;position:relative;-webkit-transition:border-top-color 200ms;-moz-transition:border-top-color 200ms;-o-transition:border-top-color 200ms;transition:border-top-color 200ms}.uv-top-left .uv-popover-tail,.uv-bottom-left .uv-popover-tail{margin-left:12px}.uv-top-right .uv-popover-tail,.uv-bottom-right .uv-popover-tail{margin-left:297px}.uv-bottom-left .uv-popover-tail,.uv-bottom-right .uv-popover-tail,.uv-above .uv-popover-tail{border-bottom:none;border-top:12px solid #f0f3f7}.uv-top-left .uv-popover-tail,.uv-top-right .uv-popover-tail,.uv-below .uv-popover-tail{border-top:none;border-bottom:12px solid #f0f3f7}@media screen and (max-device-width: 480px){.uv-popover-tail{display:none}}@media only screen and (min-device-width: 768px) and (max-device-width: 1024px){.uv-popover-tail{margin-left:350px}}.uv-popover-iframe-container{height:325px}@media screen and (max-device-width: 480px){.uv-popover-iframe-container{height:290px}.uv-popover-controls-hidden .uv-popover-iframe-container{height:auto}}@media only screen and (min-device-width: 768px) and (max-device-width: 1024px){.uv-popover-iframe-container{height:380px}}.uv-popover-iframe{-webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;border-radius:3px;overflow:hidden}.uv-popover-controls{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0 10px 3px;text-align:center;-webkit-transition:all 600ms;-webkit-transition-delay:600ms;-moz-transition:all 600ms 600ms;-o-transition:all 600ms 600ms;transition:all 600ms 600ms;height:42px;overflow:hidden}.uv-popover-controls-hidden .uv-popover-controls{opacity:0;height:0;padding:0 10px}.uv-popover-button{display:inline-block;border-top:1px solid #c8dbef;font-size:13px;line-height:1;padding:13px 18px;color:#297bcc;font-weight:500;margin:0 5px}.uv-popover-button:focus{outline:none}.uv-popover-button:hover{border-top:1px solid #a0c1e4;color:#314f70}.uv-reversed .uv-popover-button{-webkit-transition:all 200ms;-moz-transition:all 200ms;-o-transition:all 200ms;transition:all 200ms;color:white !important;border-top-color:white !important}.uv-bubble{position:absolute;text-align:center;z-index:100002}.uv-top-right .uv-bubble,.uv-top-left .uv-bubble{top:48px;padding-top:12px}.uv-bottom-right .uv-bubble,.uv-bottom-left .uv-bubble{bottom:48px;padding-bottom:12px}.uv-bubble-content{font-family:sans-serif;font-size:13px;line-height:28px;background:rgba(46,49,51,0.9);-webkit-border-radius:14px;-moz-border-radius:14px;-ms-border-radius:14px;-o-border-radius:14px;border-radius:14px;padding:0 10px;text-align:left}.uv-ie8 .uv-bubble-content{background:url(//widget.uservoice.com/images/clients/widget_environment/ninety_percent.png)}.uv-bubble-dismiss{display:inline-block;opacity:0.5;width:28px;-webkit-transition:all 200ms;-moz-transition:all 200ms;-o-transition:all 200ms;transition:all 200ms;text-align:center;margin:0 -10px 0 -6px}.uv-bubble-dismiss:hover{opacity:1;-webkit-transform:rotateZ(90deg);-moz-transform:rotateZ(90deg);-ms-transform:rotateZ(90deg);-o-transform:rotateZ(90deg);transform:rotateZ(90deg)}.uv-bubble-tail{border:6px solid transparent;position:absolute;margin:0 auto;width:0}.uv-bottom-left .uv-bubble-tail,.uv-bottom-right .uv-bubble-tail{border-top:8px solid rgba(46,49,51,0.9);border-bottom:none}.uv-top-left .uv-bubble-tail,.uv-top-right .uv-bubble-tail{border-bottom:8px solid rgba(46,49,51,0.9);border-top:none;top:4px}.uv-ie8 .uv-bubble-tail{border:none;background:url(//widget.uservoice.com/images/clients/widget_environment/bubble_tail.png);width:12px;height:8px}.uv-ie8.uv-top-left .uv-bubble-tail,.uv-ie8.uv-top-right .uv-bubble-tail{background:url(//widget.uservoice.com/images/clients/widget_environment/bubble_tail_up.png)}.uv-is-hidden{display:none}.uv-is-invisible{display:block !important;visibility:hidden !important}.uv-is-transitioning{display:block !important}.uv-no-transition{-moz-transition:none !important;-webkit-transition:none !important;-o-transition:color 0 ease-in !important;transition:none !important}.uv-fade{opacity:1;-webkit-transition:opacity 200ms ease-out;-moz-transition:opacity 200ms ease-out;-o-transition:opacity 200ms ease-out;transition:opacity 200ms ease-out}.uv-fade.uv-is-hidden{opacity:0}.uv-scale-top{opacity:1;-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-scale-top.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(-15%);-moz-transform:scale(0.8) translateY(-15%);-ms-transform:scale(0.8) translateY(-15%);-o-transform:scale(0.8) translateY(-15%);transform:scale(0.8) translateY(-15%)}.uv-scale-top-left{opacity:1;-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-scale-top-left.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(-15%) translateX(-10%);-moz-transform:scale(0.8) translateY(-15%) translateX(-10%);-ms-transform:scale(0.8) translateY(-15%) translateX(-10%);-o-transform:scale(0.8) translateY(-15%) translateX(-10%);transform:scale(0.8) translateY(-15%) translateX(-10%)}.uv-scale-top-right{opacity:1;-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-scale-top-right.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(-15%) translateX(10%);-moz-transform:scale(0.8) translateY(-15%) translateX(10%);-ms-transform:scale(0.8) translateY(-15%) translateX(10%);-o-transform:scale(0.8) translateY(-15%) translateX(10%);transform:scale(0.8) translateY(-15%) translateX(10%)}.uv-scale-bottom{opacity:1;-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-scale-bottom.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(15%);-moz-transform:scale(0.8) translateY(15%);-ms-transform:scale(0.8) translateY(15%);-o-transform:scale(0.8) translateY(15%);transform:scale(0.8) translateY(15%)}.uv-scale-bottom-left{opacity:1;-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-scale-bottom-left.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(15%) translateX(-10%);-moz-transform:scale(0.8) translateY(15%) translateX(-10%);-ms-transform:scale(0.8) translateY(15%) translateX(-10%);-o-transform:scale(0.8) translateY(15%) translateX(-10%);transform:scale(0.8) translateY(15%) translateX(-10%)}.uv-scale-bottom-right{opacity:1;-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-scale-bottom-right.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(15%) translateX(10%);-moz-transform:scale(0.8) translateY(15%) translateX(10%);-ms-transform:scale(0.8) translateY(15%) translateX(10%);-o-transform:scale(0.8) translateY(15%) translateX(10%);transform:scale(0.8) translateY(15%) translateX(10%)}.uv-slide-top{-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-slide-top.uv-is-hidden{-webkit-transform:translateY(-100%);-moz-transform:translateY(-100%);-ms-transform:translateY(-100%);-o-transform:translateY(-100%);transform:translateY(-100%)}.uv-slide-bottom{-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-slide-bottom.uv-is-hidden{-webkit-transform:translateY(100%);-moz-transform:translateY(100%);-ms-transform:translateY(100%);-o-transform:translateY(100%);transform:translateY(100%)}.uv-slide-left{-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-slide-left.uv-is-hidden{-webkit-transform:translateX(-100%);-moz-transform:translateX(-100%);-ms-transform:translateX(-100%);-o-transform:translateX(-100%);transform:translateX(-100%)}.uv-slide-right{-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-slide-right.uv-is-hidden{-webkit-transform:translateX(100%);-moz-transform:translateX(100%);-ms-transform:translateX(100%);-o-transform:translateX(100%);transform:translateX(100%)}
</style><style type="text/css" media="print">#uvTab {display:none !important;}</style><style type="text/css">.fb_hidden{position:absolute;top:-10000px;z-index:10001}
.fb_invisible{display:none}
.fb_reset{background:none;border-spacing:0;border:0;color:#000;cursor:auto;direction:ltr;font-family:"lucida grande", tahoma, verdana, arial, sans-serif;font-size:11px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal}
.fb_link img{border:none}
.fb_dialog{background:rgba(82, 82, 82, .7);position:absolute;top:-10000px;z-index:10001}
.fb_dialog_advanced{padding:10px;-moz-border-radius:8px;-webkit-border-radius:8px;border-radius:8px}
.fb_dialog_content{background:#fff;color:#333}
.fb_dialog_close_icon{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;_background-image:url(http://static.ak.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif);cursor:pointer;display:block;height:15px;position:absolute;right:18px;top:17px;width:15px;top:8px\9;right:7px\9}
.fb_dialog_mobile .fb_dialog_close_icon{top:5px;left:5px;right:auto}
.fb_dialog_padding{background-color:transparent;position:absolute;width:1px;z-index:-1}
.fb_dialog_close_icon:hover{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent;_background-image:url(http://static.ak.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}
.fb_dialog_close_icon:active{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent;_background-image:url(http://static.ak.fbcdn.net/rsrc.php/v2/yL/r/s816eWC-2sl.gif)}
.fb_dialog_loader{background-color:#f2f2f2;border:1px solid #606060;font-size:24px;padding:20px}
.fb_dialog_top_left,
.fb_dialog_top_right,
.fb_dialog_bottom_left,
.fb_dialog_bottom_right{height:10px;width:10px;overflow:hidden;position:absolute}
/* @noflip */
.fb_dialog_top_left{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;left:-10px;top:-10px}
/* @noflip */
.fb_dialog_top_right{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;right:-10px;top:-10px}
/* @noflip */
.fb_dialog_bottom_left{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;bottom:-10px;left:-10px}
/* @noflip */
.fb_dialog_bottom_right{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;right:-10px;bottom:-10px}
.fb_dialog_vert_left,
.fb_dialog_vert_right,
.fb_dialog_horiz_top,
.fb_dialog_horiz_bottom{position:absolute;background:#525252;filter:alpha(opacity=70);opacity:.7}
.fb_dialog_vert_left,
.fb_dialog_vert_right{width:10px;height:100%}
.fb_dialog_vert_left{margin-left:-10px}
.fb_dialog_vert_right{right:0;margin-right:-10px}
.fb_dialog_horiz_top,
.fb_dialog_horiz_bottom{width:100%;height:10px}
.fb_dialog_horiz_top{margin-top:-10px}
.fb_dialog_horiz_bottom{bottom:0;margin-bottom:-10px}
.fb_dialog_iframe{line-height:0}
.fb_dialog_content .dialog_title{background:#6d84b4;border:1px solid #3b5998;color:#fff;font-size:14px;font-weight:bold;margin:0}
.fb_dialog_content .dialog_title > span{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/yd/r/Cou7n-nqK52.gif)
no-repeat 5px 50%;float:left;padding:5px 0 7px 26px}
body.fb_hidden{-webkit-transform:none;height:100%;margin:0;left:-10000px;overflow:visible;position:absolute;top:-10000px;width:100%
}
.fb_dialog.fb_dialog_mobile.loading{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/ya/r/3rhSv5V8j3o.gif)
white no-repeat 50% 50%;min-height:100%;min-width:100%;overflow:hidden;position:absolute;top:0;z-index:10001}
.fb_dialog.fb_dialog_mobile.loading.centered{max-height:590px;min-height:590px;max-width:500px;min-width:500px}
#fb-root #fb_dialog_ipad_overlay{background:rgba(0, 0, 0, .45);position:absolute;left:0;top:0;width:100%;min-height:100%;z-index:10000}
#fb-root #fb_dialog_ipad_overlay.hidden{display:none}
.fb_dialog.fb_dialog_mobile.loading iframe{visibility:hidden}
.fb_dialog_content .dialog_header{-webkit-box-shadow:white 0 1px 1px -1px inset;background:-webkit-gradient(linear, 0 0, 0 100%, from(#738ABA), to(#2C4987));border-bottom:1px solid;border-color:#1d4088;color:#fff;font:14px Helvetica, sans-serif;font-weight:bold;text-overflow:ellipsis;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0;vertical-align:middle;white-space:nowrap}
.fb_dialog_content .dialog_header table{-webkit-font-smoothing:subpixel-antialiased;height:43px;width:100%
}
.fb_dialog_content .dialog_header td.header_left{font-size:12px;padding-left:5px;vertical-align:middle;width:60px
}
.fb_dialog_content .dialog_header td.header_right{font-size:12px;padding-right:5px;vertical-align:middle;width:60px
}
.fb_dialog_content .touchable_button{background:-webkit-gradient(linear, 0 0, 0 100%, from(#4966A6),
color-stop(0.5, #355492), to(#2A4887));border:1px solid #29447e;-webkit-background-clip:padding-box;-webkit-border-radius:3px;-webkit-box-shadow:rgba(0, 0, 0, .117188) 0 1px 1px inset,
rgba(255, 255, 255, .167969) 0 1px 0;display:inline-block;margin-top:3px;max-width:85px;line-height:18px;padding:4px 12px;position:relative}
.fb_dialog_content .dialog_header .touchable_button input{border:none;background:none;color:#fff;font:12px Helvetica, sans-serif;font-weight:bold;margin:2px -12px;padding:2px 6px 3px 6px;text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}
.fb_dialog_content .dialog_header .header_center{color:#fff;font-size:14px;font-weight:bold;line-height:18px;text-align:center;vertical-align:middle}
.fb_dialog_content .dialog_content{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;border:1px solid #555;border-bottom:0;border-top:0;height:150px}
.fb_dialog_content .dialog_footer{background:#f2f2f2;border:1px solid #555;border-top-color:#ccc;height:40px}
#fb_dialog_loader_close{float:left}
.fb_dialog.fb_dialog_mobile .fb_dialog_close_button{text-shadow:rgba(0, 30, 84, .296875) 0 -1px 0}
.fb_dialog.fb_dialog_mobile .fb_dialog_close_icon{visibility:hidden}
.fb_iframe_widget{display:inline-block;position:relative}
.fb_iframe_widget span{display:inline-block;position:relative;text-align:justify}
.fb_iframe_widget iframe{position:absolute}
.fb_iframe_widget_lift{z-index:1}
.fb_hide_iframes iframe{position:relative;left:-10000px}
.fb_iframe_widget_loader{position:relative;display:inline-block}
.fb_iframe_widget_fluid{display:inline}
.fb_iframe_widget_fluid span{width:100%}
.fb_iframe_widget_loader iframe{min-height:32px;z-index:2;zoom:1}
.fb_iframe_widget_loader .FB_Loader{background:url(http://static.ak.fbcdn.net/rsrc.php/v2/y9/r/jKEcVPZFk-2.gif) no-repeat;height:32px;width:32px;margin-left:-16px;position:absolute;left:50%;z-index:4}
.fb_connect_bar_container div,
.fb_connect_bar_container span,
.fb_connect_bar_container a,
.fb_connect_bar_container img,
.fb_connect_bar_container strong{background:none;border-spacing:0;border:0;direction:ltr;font-style:normal;font-variant:normal;letter-spacing:normal;line-height:1;margin:0;overflow:visible;padding:0;text-align:left;text-decoration:none;text-indent:0;text-shadow:none;text-transform:none;visibility:visible;white-space:normal;word-spacing:normal;vertical-align:baseline}
.fb_connect_bar_container{position:fixed;left:0 !important;right:0 !important;height:42px !important;padding:0 25px !important;margin:0 !important;vertical-align:middle !important;border-bottom:1px solid #333 !important;background:#3b5998 !important;z-index:99999999 !important;overflow:hidden !important}
.fb_connect_bar_container_ie6{position:absolute;top:expression(document.compatMode=="CSS1Compat"? document.documentElement.scrollTop+"px":body.scrollTop+"px")}
.fb_connect_bar{position:relative;margin:auto;height:100%;width:100%;padding:6px 0 0 0 !important;background:none;color:#fff !important;font-family:"lucida grande", tahoma, verdana, arial, sans-serif !important;font-size:13px !important;font-style:normal !important;font-variant:normal !important;font-weight:normal !important;letter-spacing:normal !important;line-height:1 !important;text-decoration:none !important;text-indent:0 !important;text-shadow:none !important;text-transform:none !important;white-space:normal !important;word-spacing:normal !important}
.fb_connect_bar a:hover{color:#fff}
.fb_connect_bar .fb_profile img{height:30px;width:30px;vertical-align:middle;margin:0 6px 5px 0}
.fb_connect_bar div a,
.fb_connect_bar span,
.fb_connect_bar span a{color:#bac6da;font-size:11px;text-decoration:none}
.fb_connect_bar .fb_buttons{float:right;margin-top:7px}
.fb_edge_widget_with_comment{position:relative;*z-index:1000}
.fb_edge_widget_with_comment span.fb_edge_comment_widget{position:absolute}
.fb_edge_widget_with_comment span.fb_send_button_form_widget{z-index:1}
.fb_edge_widget_with_comment span.fb_send_button_form_widget .FB_Loader{left:0;top:1px;margin-top:6px;margin-left:0;background-position:50% 50%;background-color:#fff;height:150px;width:394px;border:1px #666 solid;border-bottom:2px solid #283e6c;z-index:1}
.fb_edge_widget_with_comment span.fb_send_button_form_widget.dark .FB_Loader{background-color:#000;border-bottom:2px solid #ccc}
.fb_edge_widget_with_comment span.fb_send_button_form_widget.siderender
.FB_Loader{margin-top:0}
.fbpluginrecommendationsbarleft,
.fbpluginrecommendationsbarright{position:fixed !important;bottom:0;z-index:999}
/* @noflip */
.fbpluginrecommendationsbarleft{left:10px}
/* @noflip */
.fbpluginrecommendationsbarright{right:10px}
th{
height: 30px;
vertical-align: middle;
font-size: 14px;
}

</style><style>
        .flipX video::-webkit-media-text-track-display {
            transform: matrix(-1, 0, 0, 1, 0, 0) !important;
        }
        .flipXY video::-webkit-media-text-track-display {
            transform: matrix(-1, 0, 0, -1, 0, 0) !important;
        }
        .flipXYX video::-webkit-media-text-track-display {
            transform: matrix(1, 0, 0, -1, 0, 0) !important;
        }</style><style>
        @keyframes blinkWarning {
            0% { color: red; }
            100% { color: white; }
        }
        @-webkit-keyframes blinkWarning {
            0% { color: red; }
            100% { color: white; }
        }
        .blinkWarning {
            -webkit-animation: blinkWarning 1s linear infinite;
            -moz-animation: blinkWarning 1s linear infinite;
            animation: blinkWarning 1s linear infinite;
        }</style></head>
<body dir="rtl">

    <div class="border">
        <div class="tools" style="background: #e8eff5;">
          <script>
          function goBack()
{
window.history.back()
}
</script>
          
@php
$get_info = DB::table('reservation')->where('id',$id)->first();
$get_ad = DB::table('adahyt')->where('code',$get_info->code)->first();
$gopt = DB::table('opt')->where('code',$get_info->code)->first();

 $get_info = adahyt::where('id',$get_ad->id)->first();
   
                                        $sak_price = sak::where('name',$get_info->sak)->first()->price;
                                        $sak_price2 = sak::where('name',$get_info->sak)->first()->price2;
                                        $adahy_type_info = adahy_type::where('name',$get_info->adahy)->first();
@endphp


        <div style="margin:20px 5px;float: left;     width: 100%;   ">
                <button class="button" style="    width: 30%;" onclick="window.print();">طباعة</button>
        
                
                <a href="dashboard">		<button style="    width: 30%;" class="button"> الرئيسية</button></a>

            </div>



        </div>
        

        <style>
        .border {
padding: 6px;
margin: 0 auto;
border: 0px #B8CDC8 solid;
background: #fff;
-box-shadow: 0 0 1 #dee7e3;
-webkit-box-shadow: 0 0 0px #dee7e3;
-moz-box-shadow: 0 0 1px #dee7e3;
-webkit-border-radius: 0px;
-moz-border-radius: 3px;
border-radius: 0px;
width: 8.5in;
box-shadow: 0 0 0in -0.25in rgb(0 0 0 / 50%);
margin: 0 auto;
position: relative;
    </style>
    
        <div class="wrap" style="height: auto;">

    <header style="margin-top: -35px;">
<img src="/invo/sl.png">


<br>
    </header> <div style="direction: rtl ; font-size: 12px ; font-weight: bold ; MARGIN-TOP: -1PX">
    <article>
    <form name="f" action="#" method="post">
        <h1>Recipient</h1>
        <address contenteditable="0" style="">

        <div style="">

                 <table class="meta" style=" float: left ; width: 100%; margin-top: -5%; ">
            <tbody>
    
            
            
                    <tr>
            <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
font-size: 22px;"><span contenteditable="0">
                أضحية رقم
            </span></th>
 <td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
font-size: 22px;"><input type="text" style="width: 100%;    text-align: center;" name="date" value="{{$id}}" readonly=""></td>





            </tr>
            
            
                    <tr>
            <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
font-size: 22px;"><span contenteditable="0">
                 نوع الصك
            </span></th>
 <td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
font-size: 22px;"><input type="text" style="width: 100%;    text-align: center;" name="date" value="{{$get_ad->sak}}" readonly=""></td>





            </tr>
            
            
            
                    <tr>
            <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
font-size: 22px;"><span contenteditable="0">
               الوزن القائم  
            </span></th>
            @php
            $get_kilo = 0;
               $adahyt_sak = $get_ad->sak_c;
                                                       if($gopt->f_case > 0){
                                                           $get_kilo =  ((float)$gopt->f_weight + (float)$gopt->f_weight2) / $adahyt_sak;
                                                       }
                                                       @endphp
 <td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
font-size: 22px;"><input type="text" style="width: 100%;text-align: center;" value="{{$get_ad->kilo}} كيلو" name="date" readonly=""></td>





            </tr>
            
            
            
            
                    <tr>
            <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
font-size: 22px;"><span contenteditable="0">
             سعر الكيلو قائم
            </span></th>
 <td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
font-size: 22px;"><input type="text" style="width: 100%;text-align: center;" name="date" value="{{$adahy_type_info->price}} جنيه" readonly=""></td>





            </tr>
            
            
            
            
            
                    <tr>
            <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
font-size: 22px;"><span contenteditable="0">
                المحملات على الذبيحة 
            </span>
            <br>
            <span style="    font-size: 14;">
                نقل - إشراف بيطري - ذبح - تنظيف سقط - تعبئة
            </span>
            </th>
 <td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
font-size: 22px;"><input type="text" style="width: 100%; text-align: center;" name="date" value="{{(float)$sak_price2 * $get_ad->sak_c}} جنيه"  readonly=""></td>





            </tr>
            
            	@php
				$tots = (float)$get_ad->kilo * $adahy_type_info->price  + ((float)$sak_price2 * $get_ad->sak_c);
				@endphp
                            
                    <tr>
            <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
font-size: 22px;"><span contenteditable="0">
               إجمالى سعر الذبيحة
            </span></th>
 <td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
font-size: 22px;"><input type="text" style="width: 100%;text-align: center;" name="date" value="{{$tots}} جنيه"  readonly=""></td>





            </tr>
            	@php
			$getprice4 = $tots / $get_ad->sak_c;
			@endphp
            
                                <tr>
            <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
font-size: 22px;"><span contenteditable="0">
               سعر الصك
            </span></th>
 <td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
font-size: 22px;"><input type="text" style="width: 100%;text-align: center;" name="date" value="{{number_format((float)$getprice4, 2, '.', '')}} جنيه"  readonly=""></td>





            </tr>
                            
  			@php
				$check_opt = opt::where('code',$get_ad->code)->count();
				if($check_opt > 0){
				$get_opt = opt::where('code',$get_ad->code)->first();
				}
				@endphp
				
									<tr>
                <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
    font-size: 22px;"><span contenteditable="0">
                   الوزن الإجمالى المشفى   
                </span></th>
 	<td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
    font-size: 22px;"><input type="text" style="width: 100%;text-align: center;" name="date" @if($check_opt > 0) value="{{(float)$get_opt->f_weight + (float)$get_opt->f_weight2}} كيلو" 
    @else value="0"} readonly ></td>

				</tr>
				
				
												<tr>
                <th id="invoice_id_label" style=" direction: rtl ;     text-align: center;
    font-size: 22px;"><span contenteditable="0">
                   وزن الصك المشفى
                 بالكبدة
                </span></th>
 	<td id="invoice_id_value" style=" direction: rtl ; width: 100% ;     text-align: center;
    font-size: 22px;"><input type="text" style="width: 100%;text-align: center;" @php if($check_opt > 0){
    $saka = ((float)$get_opt->f_weight + (float)$get_opt->f_weight2) / $get_ad->sak_c;
    @endphp value="{{number_format((float)$saka, 2, '.', '')}} كيلو"
    @elsevalue="0"}
    name="date"  readonly ></td>

				</tr>

        </tbody></table>
        


<header>
<img src="/invo/ssl.png">
</header>
          </div>

    </address>


     



        



    </form></article></div>


   





</div>



</div></body></html>



