<?php

	$imageArray = scandir("adminuploads/");
	$remove = array(".","..");
	$imageArray = array_diff($imageArray,$remove);
	sort($imageArray,SORT_NUMERIC);
	$imageArray = array_reverse($imageArray);

	if(isset($_GET['shuffle'])){
		shuffle($imageArray);
	}

	//User input
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

	//setting elements per page
	$perPage = isset($_GET['perPage'])
	&& $_GET['perPage'] <= 50 ? (int)$_GET['perPage']: 24;

	//positioning
	$start = ($page>1) ? ($page * $perPage) - $perPage : 0;

	//pages
	$total = count($imageArray);
	$pages = ceil($total / $perPage);

	$imagesPerPage = array_chunk($imageArray,$perPage);

	//last page calculating
	if($page==$pages){
		$lastPage="yes";
	}else{
	$lastPage = "no";
	}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Meme Pump</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel='stylesheet' type='text/css' href='css/jquery-ui.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script src='js/allpumps.js'></script>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86484927-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="js/button.js"></script>
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
            .gallery{
                width:200px;
                height:200px;
            }
            #listContainer{
                text-align: center;
            }
            .pagination li{
                margin:0;
            }
            #allpumps{
                display:none;
            }
			h3{
				color: white;
				font-family: 'Geo';
				font-size: 30px;
				margin-left:40px;
			}
			@media screen and (max-width:600px){
				img{
					width:100%;
				}
				li{
					padding-bottom:20px;
				}
			}
        </style>
        <link rel="icon"
      type="image/png"
      href="favicon.ico">
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
            <div id="allpumps" class="container-fluid">
			<div>
				<h3>Click a pump to see a larger version</h3>
			</div>
                <ul>
					<?php if($lastPage!="yes"):?>
                    <?php for($y = 0;$y < $perPage;$y++):?>
					<li><a href="image.php?image=<?php echo $imagesPerPage[$page-1][$y]; ?>"><img
                                                    src='adminuploads/<?php echo $imagesPerPage[$page-1][$y]?>'
					alt='<?php echo $imagesPerPage[$page-1][$y]?>'
                                        class='gallery img-thumbnail'></a></li>
					<?php endfor; ?>
					<?php else:?>
					<?php for($y = 0;$y < count($imagesPerPage[$pages-1]);$y++):?>
					<li><a href="image.php?image=<?php echo $imagesPerPage[$page-1][$y]; ?>"><img src='adminuploads/<?php echo $imagesPerPage[$page-1][$y]?>'
					alt='<?php echo $imagesPerPage[$page-1][$y]?>'
                                        class='gallery img-thumbnail'></a></li>
					<?php endfor; ?>
					<?php endif;?>
                </ul>
                </div>
            <div id="listContainer">
                <ul class="pagination">
				<?php if($page==1):?>
				<li><a href="?page=<?php echo ($page+1)?>&perPage=<?php echo $perPage?>">Next &gt;&gt;</a></li>
				<?php elseif($page==$pages):?>
				<li><a href="?page=<?php echo ($page-1)?>&perPage=<?php echo $perPage?>">&lt;&lt; Previous</a></li>
				<?php else:?>
				<li><a href="?page=<?php echo ($page-1)?>&perPage=<?php echo $perPage?>">&lt;&lt; Previous</a></li>
				<li><a href="?page=<?php echo ($page+1)?>&perPage=<?php echo $perPage?>">Next &gt;&gt;</a></li>
				<?php endif; ?>
				<li><a href="?shuffle=yes">Shuffle</a></li>
                </ul>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
		<script type=text/javascript>
			$(document).ready(function(){
				var win = $(window);
				if(win.width()<=600){
					$('img').removeClass('gallery');
					$('img').removeClass('img-thumbnail');
				}
				if($(window).width()<=600){
					$("h3:first").text("The pumps:");
				}
			});
			$(window).on('resize',function(){
				var win = $(window);
				if(win.width()>600){
					$('li > a > img').addClass('gallery');
					$('li > a > img').addClass('img-thumbnail');
				}
			});
		</script>
    </body>
</html>
