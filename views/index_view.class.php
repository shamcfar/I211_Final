<?php


class IndexView {
    //this method displays the page header
    static public function displayHeader($page_title) {  
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $count = 0;
//retrieve cart content 
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            if ($cart) {
                $count = array_sum($cart);
            }
        }
//variables for users login, name, and role
        $login = '';
        $name = '';
        $role = 0;

//if the user has logged in, retrieve login, name, and role
        if (isset($_SESSION['login'])AND isset($_SESSION['name'])AND isset($_SESSION['role'])) {
            $login = $_SESSION['login'];
            $name = $_SESSION['name'];
            $role = $_SESSION['role'];
        }

        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title> <?php echo $page_title ?> </title>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link rel='shortcut icon' href='<?= BASE_URL ?>/www/img/favicon.ico' type='image/x-icon' />
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css' />
                <script>
                    //create the JavaScript variable for the base url
                    var base_url = "<?= BASE_URL ?>";
                </script>
            </head>
            <body>
                <div id='wrapper'>
                    <div id="banner">
                        <a href="<?= BASE_URL ?>/index.php" style="text-decoration: none" title="Books at the Edge of the World">
                            <div id="left">
                                <?php
                                if (isset($_SESSION['name']))
                                    echo "<h3>Welcome ", $name,"</h3>";
                                ?>
                                <img src="<?= BASE_URL ?>/www/img/edge.jpg" style="width: 380px; border: none" />
                                <span style='color: #000; font-size: 56pt; font-weight: bold; vertical-align: top'>
                                    Gimme That Book!
                                </span>
                                <div style='color: #000; font-size: 14pt; font-weight: bold'>Books Meant to be Read at the Edge of the World!</div>
                            </div>
                        </a>
                    </div>
                    <?php
                }//end of displayHeader function
                
                //this method displays the page footer
                public static function displayFooter() {
                    ?>
                    <br><br><br>
                    <div id="push"></div>
                </div>
                <div id="footer"><br>&copy 2018 Books at the Edge of the World. Zero Rights Reserved.</div>
                <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    } //end of displayFooter function
}
