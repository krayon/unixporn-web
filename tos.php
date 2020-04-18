<?php include_once('inc/common.php'); ?>
<?php include_once('inc/header.php'); ?>

        <div class="page-header">
        <h1>Terms of Service</h1>
      </div>

      <div class="row">
        <div class="col-md-6">
          <h4 class="tos4">§1. Use of Service</h4>
          <p>By using this service, you accept our terms of use.</p>
          <p><?php echo $site_name; ?> allows users to upload images and associate them with a unique URL to create online access to the images for themselves and others.</p>
          <p>If an image has been falsely uploaded or you want to report abuse of our serivce, please e-mail to <a href="mailto:<?php echo $site_email; ?>"><?php echo $site_email; ?></a></p>

          <h4 class="tos4">§2. Privacy</h4>
          <p><?php echo $site_name; ?> does no longer collect your IP and browser type. This data was supposed to be used to manage and improve the <?php echo $site_name; ?> services and for geographical statistics. But no such thing is no longer relevant nor neccessary. No information from the visitor is stored anywhere in our database.</p>
          <p>However, we do keep server logs. But if you are so concerned about your integrity and privacy, this webservice is the least of your problems. We highly suggest you use a VPN while browsing the internet.</p>

          <h4 class="tos4">§3. Cookies</h4>
          <p><?php echo $site_name; ?> uses cookies. A cookie is a small piece of data sent from a website and stored in the user's web browser while the user is browsing.</p>
          <p>At the moment we only use session cookies for our captcha during image uploading.</p>

          <h4 class="tos4">§4. Marketing</h4>
          <p><?php echo $site_name; ?> is a non-profit website and online service.</p>
          <p><?php echo $site_name; ?> won't allow any ads on our website or service. </p>
          <h4 class="tos4">§5. Security </h4>
          <p><?php echo $site_name; ?> constantly tries to keep up with security on our service.</p>
        </div>

        <div class="col-md-6">
          <h4 class="tos4">§6. Web scraping </h4>
          <p>Web scraping has stopped and all crawled images has been removed.</p>

          <h4 class="tos4">§7. Copyright</h4>
          <p>All rights belong to their respective owners.</p>
          <p>Lightbox v2.8.1<br />
          * by Lokesh Dhakar<br />
          * Copyright 2007, 2015, MIT license.
          </p><p>
          Bootstrap v3.3.5<br />
          * Copyright 2011-2015 Twitter, Inc. MIT license.
          </p>
          <p>Linux&reg; is a registered trademark of Linus Torvalds.</p>
          <p>UNIX&reg; is a registered trademark of The Open Group.</p>
          <p>FreeBSD&reg; is a registered trademark of The FreeBSD Foundation.</p>

          <h4 class="tos4">§8. License (MIT)</h4>
          <p>This website is available at <a href="<?php echo $src_url; ?>" target="_BLANK">GitHub</a> under the MIT License.</p>

          <h4 class="tos4">§9. Disclaimer</h4>
          <p><?php echo $site_name; ?> is not to be held responsible for the images uploaded thru our service.</p>
          <p><?php echo $site_name; ?> have routines to check uploaded material, and will without notice remove copyrighted content and illegal uploads. </p>
        </div>
      </div>

<?php include_once('inc/footer.php'); ?>
