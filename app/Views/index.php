<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="<?= getenv('app.baseURL') ?>public/assets/images/favicon.ico">
    <link rel="stylesheet" href="<?= getenv('app.baseURL') ?>public/assets/css/vendor/bootstrap.min.css">
    <link href="https://abhishekjnvk.github.io/Font-Awesome-Pro/include/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= getenv('app.baseURL') ?>public/assets/css/vendor/lightbox.css">
    <link rel="stylesheet" href="<?= getenv('app.baseURL') ?>public/assets/css/style.css">

</head>

<body>
    <div class="main-page">
        <header class="header-area formobile-menu header--transparent black-logo-version ">
            <div class="header-wrapper" id="header-wrapper">
                <div class="header-left">
                    <div class="logo">
                        <a href="<?= getenv('app.baseURL') ?>">
                            <strong class="text-light">Link Shortener</strong>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <main class="page-wrapper">
            <div class="error-page-inner bg_color--4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner">
                                <form action="<?= getenv('app.baseURL') ?>home/create" id="link_form" method="post" class="text-light">
                                    <h2 class="title theme-gradient">Link Shortener</h2>
                                    <span>Shorten & Track Your Link</span>
                                    <?  if(isset($session_data)){ ?>
                                    <div class="alert alert-primary col-lg-4 mx-auto" role="alert">
                                        <?= $session_data ?><br />
                                        <?  if(isset($link_code)){ 
                                            $short_link=getenv('app.baseURL')."go/$link_code";
                                            echo "<a href='$short_link'>$short_link</a>";
                                        }?>
                                    </div>
                                    <?}?>
                                    <input name="link" autocomplete="off"  id="link" type="url" placeholder="Your Link" class="my-3 col-lg-4 text-light mx-auto" required /><br />
                                    <input name="password" autocomplete="off" id="password" type="text" placeholder="Analytics Password (Optional) " class="my-3 col-lg-4 text-light mx-auto" /><br />
                                    <div class="error-button">
                                        <button class="rn-button-style--2 btn_solid" type="button" onclick="check()">Create Shorten Link</buttons>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="footer-style-2 ptb--30 bg_image bg_image--1" data-black-overlay="6">
            <div class="wrapper plr--50 plr_sm--20">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="inner">
                            <div class="logo text-center text-sm-left mb_sm--20">
                                <a href="<?= getenv('app.baseURL') ?>">
                                    <strong class="text-light">LS</strong>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="inner text-center">
                            <ul class="social-share rn-lg-size d-flex justify-content-center liststyle">
                                <li><a target="_blank" href="https://facebook.com/abhishekjnvk"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a target="_blank" href="https://github.com/abhishekjnvk"><i class="fab fa-github"></i></a></li>
                                <li><a target="_blank" href="https://linkedin.com/in/abhishekjnvk"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="inner text-lg-right text-center mt_md--20 mt_sm--20">
                            <div class="text">
                                <p>Copyright ?? <a target="_blank" href="https://github.com/abhishekjnvk">abhishekjnvk.</a> All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= getenv('app.baseURL') ?>public/assets/js/vendor/modernizr.min.js"></script>
    <script src="<?= getenv('app.baseURL') ?>public/assets/js/vendor/jquery.js"></script>
    <script src="<?= getenv('app.baseURL') ?>public/assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?= getenv('app.baseURL') ?>public/assets/js/vendor/stellar.js"></script>
    <script src="<?= getenv('app.baseURL') ?>public/assets/js/vendor/particles.js"></script>
    <script src="<?= getenv('app.baseURL') ?>public/assets/js/vendor/masonry.js"></script>
    <script src="<?= getenv('app.baseURL') ?>public/assets/js/vendor/stickysidebar.js"></script>
    <script src="<?= getenv('app.baseURL') ?>public/assets/js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <script>
        function check() {
            jQuery(document).ready(function($) {
                let password = $("#password").val();
                let link = $("#link").val();
                console.log(link)
                console.log(validURL(link))
                if (!validURL(link)) {
                    $.alert("Invalid Link")
                } else {
                    if (!password) {
                        $.confirm({
                            title: "Are you sure?",
                            content: "If You proceed without a password all your link analytics will be public",
                            buttons: {
                                wait: {
                                    text: 'Cancel',
                                    action: function() {}
                                },
                                continue: {
                                    text: 'Continue Anyway!',
                                    action: function() {
                                        $("#link_form").submit();
                                    }
                                }
                            }
                        });
                    } else {
                        $("#link_form").submit();
                    }
                }
                return false;
            });
            return false;
        }
        function validURL(string) {
            let url;
            try {
                url = new URL(string);
            } catch (_) {
                return false;
            }
            return url.protocol === "http:" || url.protocol === "https:";
        }
    </script>
</body>

</html>