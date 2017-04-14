<!DOCTYPE html>
<html>
    <head>
        <title>Meme Pump</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src='js/main.js'></script>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86484927-1', 'auto');
  ga('send', 'pageview');

</script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <style type="text/css">
            li{
            list-style-type: none;
                margin-right:10px;
                margin-bottom:10px;
                float:left;
                }
        </style>
		<link rel="icon"
      type="image/png"
      href="favicon.ico">

      <style>

      h3{
        color: #0002aa;
        text-shadow: 0 0 3px #FF0000;
        font-family: "Geo";
        font-size: 30px;
      }

      </style>

    </head>

    <body>
        <nav id="topNav" class="navbar navbar-default">
            <div class="container-fluid">
                <h1 id="super-title">Meme Pump</h1>
                <img id="slogan" src="res/pumpin.png" alt="Pumpin dem memes"
                     class="img-responsive"/>
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                 data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
        </nav>
            <!-- nav bar with buttons-->
            <div id="navbar" class='container-fluid'>

                <div id="buttonpanel" class="navbar-collapse collapse">
                <div id="thebuttonbar" class="navbar navbar" role="navigation">
                <ul class='nav nav-tabs'>
                    <li><a class="btn btn-lg" href='index.php' >Today's Pump</a>
                        </li>
                        <li><a class="btn btn-lg" href='allpumps.php'>All Pumps</a>
                            </li>
							<li><a class="btn btn-lg" href='image.php?image=<?php
										$images = scandir('adminuploads/');
										$remove = array('.','..');
										$images = array_diff($images,$remove);
										$number = rand(0,count($images)-1);
										echo $images[$number]?>'>Lucky Pump</a>
                            </li>
                            <li><a class="btn btn-lg" href='about.php'>About</a>
                                </li>
                                <li><a class="btn btn-lg" href='privacy.php'>Privacy Policy</a>
                                </li>
                </ul></div>
            </div>
            </div>


        <div id="content">
            <div id="today" class="container-fluid">
                <div id="pump" class="">
                        <a role='button' id='modalclick'>
                            <img class="img-thumbnail" src="" alt=""/>
                        </a>
                    </div>
                <div>
                <h3>What we're about</h3>
                <br>
                <div id='whatarewelookingfor' class="row">
                    <div class="col-lg-6">
                <p><i>Our service:</i></p><br>
                <p>The idea is simple: we wanted to build a website that only offers high quality memes with a very
                easy and simple interface. We wanted to build something that is easily accessible with the goal of
                enabling our users to suggest memes making for an interactive experience and exciting if you (the user)
                manage to score one of your memes on our site. And so our site was born, we didn't want to make a user account system to avoid convolution.
                Simple is always better, so come here guys whenever you want to see the latest trending meme or whenever you wish to view high quality memes
                on our streamlined web interface</p>
                    <br>
                    <div id="whiteWriting">
                    <p><i>What are pumps?</i></p><br>
                    <p>Pumps refer to the idea of the site: we pump out high quality memes everyday and our users help us
                        decide which memes to pump, so essentially a pump is a meme. We do not want any junk memes on our site hence why we are very selective
                     and only pump out the best out there!</p>
                    </div>
                    </div>
                </div>
                <div id="lastdiv" class="row">
                    <br><h5>Thank you for your support!</h5><br>
                </div>
                </div>
            </div>
        </div>

        <!--Script for generating cookies that omit the disclaimer tab once closed-->
        <script>

            function getNextWeek(){
                var today = new Date();
                var nextWeek = new Date(today.getFullYear(),today.getMonth(),
                        today.getDate()+7);
                return nextWeek;
            }

            function createDisclaimerCookie(){
                document.cookie="disclaimer=off;"+"expires="+getNextWeek().toUTCString()
                        +";"+"path=/";
            }

        </script>
        <div class='navbar-fixed-bottom'>
            <a role='button'><h2 id='disclaimer' title='Disclaimer'>Disclaimer</h2>
            </a>
            <div id='hiddenDiv'>
                <p id="disclaimerPara">This site does not own any of the <i>memes</i> and
                    is used for humour and parody purposes only.
                    Using this site means you accept the use of our cookies</p>
                <a role="button"><br><h4 id="closedisclaimer"
                                         onclick="createDisclaimerCookie();">
                        Close this tab</h4></a>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    </body>
</html>
