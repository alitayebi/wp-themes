<footer class="site-footer">
  <div class="container footer-grid">
    <div>
      <div class="footer-logo">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri().'/assets/logo.svg'); ?>" alt="<?php bloginfo('name'); ?>" height="32">
      </div>
      <p><a href="mailto:info@simurghnameh.com">info@simurghnameh.com</a></p>
      <p>twitter • facebook • instagram</p>
      <p style="opacity:.7;font-size:12px;">© <?php echo date('Y'); ?> All rights reserved.</p>
    </div>

    <div class="footer-col">
      <h4><?php _e('درباره ما','simurghname-child'); ?></h4>
      <ul>
        <li><a href="#"><?php _e('معرفی مجموعه','simurghname-child'); ?></a></li>
        <li><a href="#"><?php _e('تماس با ما','simurghname-child'); ?></a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4><?php _e('مجله','simurghname-child'); ?></h4>
      <ul>
        <li><a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>"><?php _e('همه پست‌ها','simurghname-child'); ?></a></li>
        <li><a href="#"><?php _e('دسته‌بندی‌ها','simurghname-child'); ?></a></li>
      </ul>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body></html>
