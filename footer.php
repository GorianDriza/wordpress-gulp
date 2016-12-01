<?php global $global_theme_options; ?>
<footer class="footer">
  <div class="footer-wrapper">
    <div class="footer-content">
      <div class="row">
        <div class="small-12 medium-12 columns">
          <aside class="footer-sidebar">
            <?php if ( dynamic_sidebar('footer_contact') ) : else : endif; ?>
          </aside>
        </div>
      </div>
    </div>
  </div> <!-- footer-wrapper -->
</footer>
<?php wp_footer(); ?>

</body>
</html>