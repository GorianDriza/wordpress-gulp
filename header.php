<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <?php global $global_theme_options; ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="row">
      <div class="small-12 medium-4 columns header_logo">
          <h1><a href="<?php bloginfo('url')?>"> <img src="<?php echo $global_theme_options['opt-logo']['url']; ?>" alt="logo"/> </a></h1>
      </div>
  </div> <!-- header-wrapper -->
</header>