<?php
/**
 * footer.php
 * Brand name, copyright with the current year (made by PHP),
 * and the floating back-to-top button (controlled by script.js).
 */
const BRAND_NAME = 'Donex Raver Carillo';
?>
<footer class="site-footer">
    <p>&copy; <?= date('Y') ?> <?= BRAND_NAME ?>. All rights reserved.</p>
</footer>

<a class="back-to-top" id="backToTop" href="#" aria-label="Back to top">
    <?php renderImage('assets/images/shared/topbutton.png', 'Back to top', $basePath); ?>
</a>
</body>
</html>