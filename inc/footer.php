<?php include_once('inc/common.php'); ?>
</div>

<footer class="footer">
<div class="container">
<p class="footerish">&copy; 2014-<?php echo date("Y") ?> <?php echo $site_url; ?> | <a title="GitHub" href="<?php echo $src_url; ?>" target="_BLANK"><img alt="github" src="img/github.png"></a> | <a title="Terms of Service" href="tos.php">ToS</a> | <a title="Contact" href="mailto:<?php echo $site_email; ?>">Contact</a> | <a title="RSS" href="rss.php"><img alt="rss" src="img/rss.png"></a></p>
</div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/lightbox.js"></script>
<script>
  // Override default LightBox options
  lightbox.option({
    // Image title should NOT be output as HTML
    'sanitizeTitle': true
  })
</script>
</body>
</html>
