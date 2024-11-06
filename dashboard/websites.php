<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Mes sites web</title>

    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>


    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body class="x404">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=277385395761685";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <header class="header contain-to-grid">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="/dashboard/index.html">Apache Friends</a></h1>
          </li>
          <li class="toggle-topbar menu-icon">
            <a href="#">
              <span>Menu</span>
            </a>
          </li>
        </ul>

        <section class="top-bar-section">
          <!-- Left Nav Section -->
          <ul class="left">
               <li class="item "><a href="/dashboard/websites.html">Mes sites web</a></li>
              <li class="item "><a href="/dashboard/howto.html">HOW-TO Guides</a></li>
              <li class="item "><a href="/dashboard/faq.html">FAQs</a></li>
              <li class="item "><a target="_blank" href="/phpmyadmin/">phpMyAdmin</a></li>
              <li class="item "><a target="_blank" href="/dashboard/phpinfo.php">PHPInfo</a></li>
          </ul>
        </section>
      </nav>
    </header>

    <div class="wrapper">
      <div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1>Sites web PHP<span>Erik-42</span></h1>
    </div>
  </div>
</div> 
<form action="/dashboard/search.html" method="get">
    <div class="row">
      <div class="large-8 small-9 columns">
        <input type="text" name="q" placeholder="Search..">
      </div>
      <div class="large-4 small-3 columns">
        <input type="submit" class="success button postfix expand" value="Search"/>
      </div>
    </div>
</form>
<div class="row">
  <div class="large-12 columns">
    <!-- Inclusion du fichier PHP pour lister les sites -->
    <?php include 'list_sites.php'; ?>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h2>Sites sous Wordpress</h2>
    <p><a target="_blank" href="../../leraidtolkien.wordpress/index.php">Le Raid Tolkien</a> ==> Site web de l'association "Le Raid Tolkien" sous Wordpress.</p>
<p><a target="_blank" href="../../cidreetdragon.wordpress/index.php">Cidre & Dragon</a> ==> Site web du festival "Cidre & Dragon" sous Wordpress.</p></p>
<br/>
 <h2>Sites sous Joomla</h2>
    <p><a target="_blank" href="../www-org/cidreetdragon.eu/public_html/index.html">Cidre & Dragon</a> ==> Site web du festival "Cidre & Dragon" sous Joomla.</p>
   
  </div>
</div>
    </div>

    <footer class="footer row">
      <div class="columns">
        <div class="footer_lists-container row collapse">
          <div class="footer_social columns large-2">
            <ul class="social">
  <li class="twitter"><a href="https://twitter.com/apachefriends">Follow us on Twitter</a></li>
  <li class="facebook"><a href="https://www.facebook.com/we.are.xampp">Like us on Facebook</a></li>
</ul>

            <p class="footer_copyright">Copyright (c) 2022, Apache Friends - Erik-42</p>
          </div>
          <ul class="footer_links columns large-9">
            <li><a href="https://www.apachefriends.org/blog.html">Blog</a></li>
            <li><a href="/privacy_policy.html">Privacy Policy</a></li>
            <li>
<a target="_blank" href="http://www.fastly.com/">                CDN provided by
                <img width="48" data-2x="/dashboard/images/fastly-logo@2x.png" src="/dashboard/images/fastly-logo.png" />
</a>            </li>
          </ul>
        </div>
      </div>
    </footer>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
  </body>
</html>
