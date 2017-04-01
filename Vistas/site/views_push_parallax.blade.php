<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Pages - Admin Dashboard UI Kit - Views</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
        <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>
  <body class="fixed-header " style="border-color:#e6e6e6; border-width:1px 1px 0 1px; border-style:solid">
    <div class="view-port clearfix" id="chat">
      <div class="view bg-white">
        <!-- BEGIN View Header !-->
        <div class="navbar navbar-default">
          <div class="navbar-inner">
            <!-- BEGIN Header Controler !-->
            <a href="javascript:;" class="inline action p-l-10 link text-master">
              <i class="pg-plus"></i>
            </a>
            <!-- END Header Controler !-->
            <div class="view-heading">
              Push Parallax
              <div class="fs-11">Demo</div>
            </div>
            <!-- BEGIN Header Controler !-->
            <a href="#" class="inline action p-r-10 pull-right link text-master">
              <i class="pg-more"></i>
            </a>
            <!-- END Header Controler !-->
          </div>
        </div>
        <!-- END View Header !-->
        <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
          <div class="list-view-group-container">
            <div class="list-view-group-header text-uppercase">
              Transitions</div>
            <ul>
              <!-- BEGIN Chat User List Item  !-->
              <li class="chat-user-list clearfix">
                <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" data-toggle-view="#subView1" class="" href="#">
                  <p class="p-l-10 col-xs-height col-middle col-xs-12 text-master">
                    Lavona Erpelding
                  </p>
                </a>
              </li>
              <!-- END Chat User List Item  !-->
              <!-- BEGIN Chat User List Item  !-->
              <li class="chat-user-list clearfix">
                <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" data-toggle-view="#subView1" class="" href="#">
                  <p class="p-l-10 col-xs-height col-middle col-xs-12 text-master">
                    Eugena Braig
                  </p>
                </a>
              </li>
              <!-- END Chat User List Item  !-->
              <!-- BEGIN Chat User List Item  !-->
              <li class="chat-user-list clearfix">
                <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" data-toggle-view="#subView1" class="" href="#">
                  <p class="p-l-10 col-xs-height col-middle col-xs-12 text-master">
                    Aaron Shimmin
                  </p>
                </a>
              </li>
              <!-- END Chat User List Item  !-->
            </ul>
          </div>
        </div>
      </div>
      <!-- BEGIN Conversation View  !-->
      <div class="view chat-view bg-white clearfix">
        <div class="view chat-view bg-white clearfix" id="subView1">
          <div class="view-port clearfix" id="nestedView">
            <div class="view chat-view bg-white clearfix">
              <!-- BEGIN Header  !-->
              <div class="navbar navbar-default">
                <div class="navbar-inner">
                  <a href="javascript:;" class="link text-master inline action p-l-10" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                    <i class="pg-arrow_left"></i>
                  </a>
                  <div class="view-heading">
                    Level 1
                  </div>
                  <a href="#" class="link text-master inline action p-r-10 pull-right ">
                    <i class="pg-more"></i>
                  </a>
                </div>
              </div>
              <!-- END Header  !-->
              <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">
                    Nested Navigation</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#nestedView" data-navigate="view" class="" href="#">
                        <p class="p-l-10 col-xs-height col-middle col-xs-12 text-master">
                          Go Further
                        </p>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="view chat-view bg-white clearfix">
              <!-- BEGIN Header  !-->
              <div class="navbar navbar-default">
                <div class="navbar-inner">
                  <a href="javascript:;" class="link text-master inline action p-l-10" data-navigate="view" data-view-port="#nestedView" data-view-animation="push-parrallax">
                    <i class="pg-arrow_left"></i>
                  </a>
                  <div class="view-heading">
                    Level 2
                  </div>
                  <a href="#" class="link text-master inline action p-r-10 pull-right ">
                    <i class="pg-more"></i>
                  </a>
                </div>
              </div>
              <!-- END Header  !-->
              <p class="text-center m-t-20">
                Unlimted Levels
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- END Conversation View  !-->
    </div>
    <!-- BEGIN VENDOR JS -->
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
    <script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>