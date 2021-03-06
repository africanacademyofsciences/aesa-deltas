  <?php
  /**
   * @file
   * Default theme implementation to display a single Drupal page.
   *
   * The doctype, html, head and body tags are not in this template. Instead they
   * can be found in the html.tpl.php template in this directory.
   *
   * Available variables:
   *
   * General utility variables:
   * - $base_path: The base URL path of the Drupal installation. At the very
   *   least, this will always default to /.
   * - $directory: The directory the template is located in, e.g. modules/system
   *   or themes/bartik.
   * - $is_front: TRUE if the current page is the front page.
   * - $logged_in: TRUE if the user is registered and signed in.
   * - $is_admin: TRUE if the user has permission to access administration pages.
   *
   * Site identity:
   * - $front_page: The URL of the front page. Use this instead of $base_path,
   *   when linking to the front page. This includes the language domain or
   *   prefix.
   * - $logo: The path to the logo image, as defined in theme configuration.
   * - $site_name: The name of the site, empty when display has been disabled
   *   in theme settings.
   * - $site_slogan: The slogan of the site, empty when display has been disabled
   *   in theme settings.
   *
   * Navigation:
   * - $main_menu (array): An array containing the Main menu links for the
   *   site, if they have been configured.
   * - $secondary_menu (array): An array containing the Secondary menu links for
   *   the site, if they have been configured.
   * - $breadcrumb: The breadcrumb trail for the current page.
   *
   * Page content (in order of occurrence in the default page.tpl.php):
   * - $title_prefix (array): An array containing additional output populated by
   *   modules, intended to be displayed in front of the main title tag that
   *   appears in the template.
   * - $title: The page title, for use in the actual HTML content.
   * - $title_suffix (array): An array containing additional output populated by
   *   modules, intended to be displayed after the main title tag that appears in
   *   the template.
   * - $messages: HTML for status and error messages. Should be displayed
   *   prominently.
   * - $tabs (array): Tabs linking to any sub-pages beneath the current page
   *   (e.g., the view and edit tabs when displaying a node).
   * - $action_links (array): Actions local to the page, such as 'Add menu' on the
   *   menu administration interface.
   * - $feed_icons: A string of all feed icons for the current page.
   * - $node: The node object, if there is an automatically-loaded node
   *   associated with the page, and the node ID is the second argument
   *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
   *   comment/reply/12345).
   *
   * Regions:
   * - $page['help']: Dynamic help text, mostly for admin pages.
   * - $page['highlighted']: Items for the highlighted content region.
   * - $page['content']: The main content of the current page.
   * - $page['sidebar_first']: Items for the first sidebar.
   * - $page['sidebar_second']: Items for the second sidebar.
   * - $page['header']: Items for the header region.
   * - $page['footer']: Items for the footer region.
   *
   * @see bootstrap_preprocess_page()
   * @see template_preprocess()
   * @see template_preprocess_page()
   * @see bootstrap_process_page()
   * @see template_process()
   * @see html.tpl.php
   *
   * @ingroup templates
   */
  ?>
  <header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
    <div class="<?php print $container_class; ?>">
      <div class="navbar-header">
        <?php if ($logo): ?>
          <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" style="background-color: #FFFFFF; border-radius: 10px;">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" height="50">
          </a>
        <?php endif; ?>

        <?php if (!empty($site_name)): ?>
          <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        <?php endif; ?>

        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <?php endif; ?>
      </div>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="navbar-collapse collapse" id="navbar-collapse">
          <nav role="navigation">
            <?php if (!empty($primary_nav)): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($page['navigation'])): ?>
              <?php print render($page['navigation']); ?>
            <?php endif; ?>
          </nav>
        </div>
      <?php endif; ?>
    </div>
  </header>

  <div class="main-container" style="padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
    <header role="banner" id="page-header">
      <?php if (!empty($site_slogan)): ?>
        <p class="lead" style="font-style: italic; font-weight: 650;"><?php print $site_slogan; ?></p>
      <?php endif; ?>

      <?php print render($page['header']); ?>
    </header> <!-- /#page-header -->

    <div class="row">

      <?php if (!empty($page['sidebar_first'])): ?>
        <aside class="col-sm-3" role="complementary">
          <?php print render($page['sidebar_first']); ?>
        </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>

      <section<?php print $content_column_class; ?>>
        <?php if (!empty($page['highlighted'])): ?>
          <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
        <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
          <h1 class="page-header"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
        <?php endif; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
      </section>

      <?php if (!empty($page['sidebar_second'])): ?>
        <aside class="col-sm-3" role="complementary">
          <?php print render($page['sidebar_second']); ?>
        </aside>  <!-- /#sidebar-second -->
      <?php endif; ?>

    </div>
  </div>

  <?php if (!empty($page['footer'])): ?>
                    <footer class="animated fadeIn" style="background: #003A70;">
                      <div class="container">
                          <p style="text-align: center;"><span class="si">For more information on the<em> AESA Community of Practice</em> or for general inquiries, </span><a href="mailto:communication@aasciences.ac.ke" style="font-size: 17px; color: #FFFFFF;"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Contact now</a></p>
                          <div class="clearfix"></div>
                          <div class="footer-menu">
                              <div class="col-lg-12">
                                  <ul>
                                      <li><a href="https://elearning.aesacop.ac.ke/" target="_blank"><i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i> ELEARNING</a></li>
                                      <li><a href="aesa.ac.ke" target="_blank" target="_blank"><i class="fa fa-globe fa-lg" aria-hidden="true"></i> AESA</a></li>
                                      <li><a href="https://www.aasciences.ac.ke" target="_blank"><i class="fa fa-flask fa-lg" aria-hidden="true"></i> AAS</a></li>
                                      <li><a href="https://deltas.aesacop.ac.ke/" target="_blank"><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i> SIGN-UP</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="social-footer">
                              <p>FOLLOW US</p>
                              <ul>
                                  <li><a href="https://www.facebook.com/aesaafrica/" target="_blank"><i class="fa fa-facebook fa-lg" style="font-size: 20px; color: #FFFFFF;"></i></a></li>
                                  <li><a href="https://twitter.com/AAS_AESA" target="_blank"><i class="fa fa-twitter fa-lg" style="font-size: 20px; color: #FFFFFF;"></i></a></li>
                                  <li><a href="https://www.youtube.com/channel/UCtdLgoNICbdUFqkw-ph508g" target="_blank"><i class="fa fa-youtube-play fa-lg" style="font-size: 20px; color: #FFFFFF;"></i></a></li>
                              </ul>
                          </div>

                          <div class="clearfix"></div>

                          <div class="disclaimer-footer">
                              <div class="col-lg-12">
                                  <p class="p1" style="text-align: center;"><span class="s1">&copy;<script type="text/javascript">document.write(new Date().getFullYear());</script><em> AESA Community of Practice</em>. All Rights Reserved. <a href="https://www.aasciences.ac.ke/aesa/privacy-policy/" style="color: #FFFFFF;">Disclaimer</a></span></p>
                              </div>
                          </div>
                      </div>
                  </footer>
  <?php endif; ?>
