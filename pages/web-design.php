<?php
/**
 * web-design.php - Web Design showcase.
 * Title screen (background + title), then the screenshots.
 * The "Visit website" button sits on top of the first screenshot.
 * Screenshots are found automatically from the folder (see getGalleryImages in helpers.php).
 */
$pageTitle = 'Web Design';
$basePath  = '../';
$extraCss  = 'assets/css/gallery.css'; // styles for this page only
include '../includes/header.php';

$galleryFolder = 'assets/images/web-design/';
$websiteUrl    = 'https://ak-motoparts.netlify.app/';
$screenshots   = getGalleryImages($galleryFolder, 'WebDesign');
?>

<!-- Back button: floats on screen while scrolling -->
<a class="floating-back floating-back--no-nav" href="my-works.php" aria-label="Back to My Works">
    <?php renderImage('assets/images/shared/back_button.png', 'Back to My Works', $basePath); ?>
</a>

<main class="gallery-main">
    <section class="gallery-category" id="web-design" aria-label="Web Design">

        <!-- Title screen: background + animated title -->
        <div class="gallery-hero">
            <?php renderImage($galleryFolder . 'WebDesign_bg.png', '', $basePath, 'gallery-bg'); ?>
            <?php renderImage($galleryFolder . 'WebDesign_title.png', 'Web Design', $basePath, 'gallery-title'); ?>
        </div>

        <!-- Screenshots: full width, one under the other, click to enlarge -->
        <?php if (empty($screenshots)): ?>
            <p class="asset-note">Missing asset: <strong>WebDesign_1.png</strong> (<?= $galleryFolder ?>)</p>
        <?php endif; ?>

        <?php foreach ($screenshots as $number => $screenshotPath): ?>
            <div class="art-wrap">
                <button class="art-item" type="button" data-full="<?= $basePath . $screenshotPath ?>"
                        aria-label="View larger: web design screenshot <?= $number + 1 ?>">
                    <img src="<?= $basePath . $screenshotPath ?>" alt="Web design screenshot <?= $number + 1 ?>" loading="lazy">
                </button>

                <?php if ($number === 0): ?>
                    <!-- Visit-website button on top of the first screenshot (under the QR code) -->
                    <a class="visit-link" href="<?= $websiteUrl ?>" target="_blank" rel="noopener noreferrer"
                       aria-label="Visit the website (opens in a new tab)">
                        <?php renderImage($galleryFolder . 'Visitlink1.png', 'Visit website', $basePath); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

    </section>
</main>

<?php include '../includes/lightbox.php'; ?>
<?php include '../includes/footer.php'; ?>