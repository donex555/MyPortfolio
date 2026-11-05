<?php
/** my-works.php - Overview: background, Donex, seal, and 3 image buttons. */
$pageTitle = 'My Works';
$basePath  = '../';
include '../includes/header.php';

$worksFolder = 'assets/images/my-works/';

$categoryButtons = [
    ['file' => 'MyWorks_illustrations.png', 'link' => 'illustrations.php',  'alt' => 'Illustrations'],
    ['file' => 'MyWorks_graphicdesign.png', 'link' => 'graphic-design.php', 'alt' => 'Graphic Design'],
    ['file' => 'MyWorks_webdesign.png',     'link' => 'web-design.php',     'alt' => 'Web Design'],
];
?>
<main class="my-works">
    <?php if (!assetExists($worksFolder . 'MyWorks_background.png')): ?>
        <p class="asset-note works-note">Missing asset: <strong>MyWorks_background.png</strong> (assets/images/my-works/)</p>
    <?php endif; ?>

    <!-- Everything inside the stage is positioned with % so it scales together -->
    <div class="works-stage">
        <?php renderImage($worksFolder . 'donex3.png', 'Illustration of Donex posing', $basePath, 'works-donex'); ?>
        <?php renderImage($worksFolder . 'seal.png', '', $basePath, 'works-seal'); ?>

        <?php foreach ($categoryButtons as $index => $button): ?>
            <a class="category-button works-button-<?= $index + 1 ?>" href="<?= $button['link'] ?>" aria-label="<?= $button['alt'] ?>">
                <?php renderImage($worksFolder . $button['file'], $button['alt'], $basePath); ?>
            </a>
        <?php endforeach; ?>
    </div>
</main>
<?php include '../includes/footer.php'; ?>