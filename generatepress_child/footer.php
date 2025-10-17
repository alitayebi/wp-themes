</main>
<footer class="pt-5 text-center bg-white small">
    <section>
        <div class="container">
            <div class="row  text-md-start" bis_skin_checked="1">
                <div class="col-md mb-3 order-3 order-md-1" bis_skin_checked="1">
                    <h6>تماس با ما</h6>
                    <p class="text-muted">
                        تهران، بلوار کریم‌خان، خیابان نجات‌الهی، خیابان اراک، کوچه مهر، بن‌بست خسروی، پلاک ۴، زنگ ۱<br>
                        ۰۲۱۸۸۹۳۷۱۶۸
                    </p>
                </div>
                <div class="col-md mb-3 order-1 order-md-2" bis_skin_checked="1">
                    <h6>سیمرغنامه</h6>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer-menu1',
                        'container' => false,
                        'items_wrap' => '<ul class="nav m-0 flex-column">%3$s</ul>',
                        'fallback_cb' => false,
                        // wrap <a> text in a span with the class you want
                        'link_before' => '<span class="nav-link p-0 text-muted">',
                        'link_after' => '</span>',
                    ]);
                    ?>                
                </div>
                <div class="col-md mb-3 order-2 order-md-3" bis_skin_checked="1">
                    <h6>سی‌مرغ شمایید</h6>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer-menu2',
                        'container' => false,
                        'items_wrap' => '<ul class="nav m-0 flex-column">%3$s</ul>',
                        'fallback_cb' => false,
                        // wrap <a> text in a span with the class you want
                        'link_before' => '<span class="nav-link text-muted p-0">',
                        'link_after' => '</span>',
                    ]);
                    ?>
                </div>
                <div class="col-md mb-3 order-5 order-md-4">-</div>
                <div class="col-md mb-3 order-4 order-md-5 text-center" dir="ltr" bis_skin_checked="1">
                    <p class="logo-wrapper">
                        <a href="/" class="logo"><img src="https://simurghnameh.com/assets/logo/logo-black.png"
                                alt="سیمرغنامه"></a>
                    </p>
                    <p class="socials text-muted text-md-end">
                        <a class="link-dark text-decoration-none text-reset"
                            href="mailto:info@simurghnameh.com">info@simurghnameh.com</a><br>
                        <a class="link-dark text-decoration-none ms-2 text-reset" href="https://x.com/simurghnameh"
                            target="_blank" class="social">twitter</a>
                        <a class="link-dark text-decoration-none ms-2 text-reset" href="https://instagram.com/simurgh.nameh"
                            target="_blank" class="social">instagram</a>
                        <a class="link-dark text-decoration-none ms-2 text-reset"
                            href="https://www.linkedin.com/company/simurghnameh/" target="_blank"
                            class="social">linkedin</a>
                        <a class="link-dark text-decoration-none ms-2 text-reset" href="https://www.youtube.com/@Simurghnameh"
                            target="_blank" class="social">youtube</a>
                    </p>
    
                </div>
            </div>
        </div>
    </section>
    <section class="border-top">
        <div class="container">
            <div class="copyright d-flex flex-column flex-sm-row justify-content-between px-0 pt-4 my-4 small text-muted">
                <p class="socials text-muted">
                    <a class="link-dark text-decoration-none text-reset" href="#">شرایط و ضوابط</a><br>
                </p>
                <p>All right reserved to SIMURGHNAMEH 2025</p>
            </div>
        </div>
    </section>
</footer>
<script>
    function copyToClipboard(text, el) {
        var copyTest = document.queryCommandSupported('copy');
        var elOriginalText = el.attr('data-bs-original-title');

        if (copyTest === true) {
            var copyTextArea = document.createElement("textarea");
            copyTextArea.value = text;
            document.body.appendChild(copyTextArea);
            copyTextArea.select();
            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'کپی شد.' : 'کپی نشد!';
                el.attr('data-bs-original-title', msg).tooltip('show');
            } catch (err) {
                console.log('Oops, unable to copy');
            }
            document.body.removeChild(copyTextArea);
            el.attr('data-bs-original-title', elOriginalText);
        } else {
            // Fallback if browser doesn't support .execCommand('copy')
            window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
        }
    }

    $(document).ready(function () {
        // Initialize
        // ---------------------------------------------------------------------

        // Tooltips
        // Requires Bootstrap 3 for functionality
        $('.js-tooltip').tooltip();

        // Copy to clipboard
        // Grab any text in the attribute 'data-copy' and pass it to the 
        // copy function
        $('.js-copy').click(function () {
            var text = $(this).attr('data-copy');
            var el = $(this);
            copyToClipboard(text, el);
        });
    });


</script>