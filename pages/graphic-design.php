<?php
/**
 * graphic-design.php - Graphic Design gallery.
 * Each category = a big title screen (background + title image) followed by its designs.
 * Designs are found automatically from the folder (see getGalleryImages in helpers.php).
 */
$pageTitle = 'Graphic Design';
$basePath  = '../';
$extraCss  = 'assets/css/gallery.css'; // styles for this page only
include '../includes/header.php';

$galleryFolder = 'assets/images/graphic-design/';

// To add a category, add one more line here and put its files in the folder.
$categories = [
    ['id' => 'branding',     'name' => 'Branding',              'prefix' => 'Branding'],
    ['id' => 'social-media', 'name' => 'Social Media Graphics', 'prefix' => 'SocialMedia'],
    ['id' => 'merchandise',  'name' => 'Merchandise',           'prefix' => 'Merchandise'],
];
?>

<!-- Category links: sticky bar, one row (these scroll down the page, they do not filter) -->
<nav class="gallery-nav" aria-label="Graphic design categories">
    <ul>
        <?php foreach ($categories as $category): ?>
            <li><a href="#<?= $category['id'] ?>"><?= strtoupper($category['name']) ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>

<!-- Back button: floats on screen while scrolling -->
<a class="floating-back" href="my-works.php" aria-label="Back to My Works">
    <?php renderImage('assets/images/shared/back_button.png', 'Back to My Works', $basePath); ?>
</a>

<main class="gallery-main">
<?php foreach ($categories as $category): ?>
    <?php $artworks = getGalleryImages($galleryFolder, $category['prefix']); ?>
    <section class="gallery-category" id="<?= $category['id'] ?>" aria-label="<?= $category['name'] ?>">

        <!-- Title screen: background + animated title -->
        <div class="gallery-hero">
            <?php renderImage($galleryFolder . $category['prefix'] . '_bg.png', '', $basePath, 'gallery-bg'); ?>
            <?php renderImage($galleryFolder . $category['prefix'] . '_title.png', $category['name'], $basePath, 'gallery-title'); ?>
        </div>

        <!-- Designs: full width, one under the other, click to enlarge -->
        <?php if (empty($artworks)): ?>
            <p class="asset-note">Missing asset: <strong><?= $category['prefix'] ?>_1.png</strong> (<?= $galleryFolder ?>)</p>
        <?php endif; ?>

        <?php foreach ($artworks as $number => $artworkPath): ?>
            <button class="art-item" type="button" data-full="<?= $basePath . $artworkPath ?>"
                    aria-label="View larger: <?= $category['name'] ?> <?= $number + 1 ?>">
                <img src="<?= $basePath . $artworkPath ?>" alt="<?= $category['name'] ?> design <?= $number + 1 ?>" loading="lazy">
            </button>
        <?php endforeach; ?>

    </section>
<?php endforeach; ?>
</main>

<?php include '../includes/lightbox.php'; ?>
<?php include '../includes/footer.php'; ?>