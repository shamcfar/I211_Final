<?php

//load configuration file
require_once 'application/config.php';

class AppView {

    //this method displays the page header
    public static function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title> <?php echo $page_title ?> </title>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link rel="shortcut icon" href="www/img/favicon.ico" type="image/x-icon" />
                <link type="text/css" rel="stylesheet" href="www/css/app_style.css" />
                <script>
                    base_url = "<?= BASE_URL ?>";
                </script>
            </head>
            <body>       
                <div id="top"></div>
                <div id='wrapper'>
                    <div id="banner">
                        <a href="index.php" style="text-decoration: none" title="Books at the Edge of the World">
                            <div id="left">
                                <img src='www/img/edge.jpg' style="width: 380px; border: none" />
                                <span style='color: #000; font-size: 56pt; font-weight: bold; vertical-align: top'>
                                    Gimme That Book!
                                    
                                </span>
                                <div style='color: #000; font-size: 14pt; font-weight: bold'>Books Meant to be Read at the Edge of the World!</div>
                            </div>
                        </a>
                        <div id="right">
                            <img src="www/img/books.jpg" style="width: 200px; border: none" />
                        </div>
                    </div>
                    <div id="searchbar">
                        <form method="get" action="search_movie.php">
                            <input name="query-terms" id="searchtextbox" placeholder="Search Books" autocomplete="off" onkeyup="handleKeyUp(event)">
                            <input type="submit" value="Go">
                        </form>
                        <div id="suggestionDiv"></div>
                    </div>

                    <?php
                } //end of displayHeader method
                
                //this method displays the page footer
                public static function displayFooter() {
                    ?>
                    <br><br><br>
                    <div id="push"></div>
                </div>
                <div id="footer"><br>&copy 2018 Books at the Edge of the World. Zero Rights Reserved.</div>
                <script src="www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    }

//end of displayFooter method
}
