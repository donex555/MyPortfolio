<?php
/**
 * index.php - Homepage with 3 sections: Portfolio Teaser, About Me, Contacts.
 * Each section = one background image + smaller images layered on top.
 */
$pageTitle = 'Portfolio';
$basePath  = '';
include 'includes/header.php';

$homeFolder = 'assets/images/homepage/';

// Social buttons (PNG images that already contain their text).
// Leave a url as '' to show the button without a link.
$socialLinks = [
    'email' => [
        'url'   => 'mailto:donexrver@gmail.com',
        'file'  => 'Gmail_icon.png',
        'label' => 'Email Donex at donexrver@gmail.com',
    ],
    'linkedin' => [
        'url'   => 'https://www.linkedin.com/in/donex-raver-carillo-a75371350',
        'file'  => 'Linkedin_icon.png',
        'label' => 'Donex on LinkedIn',
    ],
    'facebook' => [
        'url'   => 'https://www.facebook.com/share/1Lcm4jwRg7/',
        'file'  => 'Facebook_icon.png',
        'label' => 'Donex on Facebook',
    ],
    'instagram' => [
        'url'   => 'https://www.instagram.com/bunnuita?dlrf=cTZpaTh2cTJzdDBy',
        'file'  => 'Instagram_icon.png',
        'label' => 'Donex on Instagram',
    ],
];
?>
<main>

    <!-- SECTION 1: Portfolio teaser (background + animated logo) -->
    <section class="home-section" id="home">
        <div class="media-stack">
            <?php renderImage($homeFolder . 'Home_section1.gif', '', $basePath, 'media-image'); ?>
            <?php renderImage($homeFolder . 'logo.png', 'Portfolio DRC logo', $basePath, 'layer logo-layer reveal'); ?>
        </div>
    </section>

    <!-- SECTION 2: About me (background + details + photo) -->
    <section class="home-section" id="about">
        <div class="media-stack rattle-stack">
            <?php renderImage($homeFolder . 'Home_section2.png', '', $basePath, 'media-image'); ?>
            <?php renderImage($homeFolder . 'details.png', 'About Donex: introduction, education, skills, software and languages', $basePath, 'layer details-layer reveal'); ?>
            <?php renderImage($homeFolder . 'donex1.png', 'Donex Raver, Digital Artist', $basePath, 'layer portrait-layer reveal delay-1'); ?>
        </div>
    </section>

    <!-- SECTION 3: Contacts (background + donex2 under the quotes + social buttons) -->
    <section class="home-section" id="contacts">
        <div class="media-stack">
            <?php renderImage($homeFolder . 'Home_section3.png', '', $basePath, 'media-image'); ?>
            <?php renderImage($homeFolder . 'donex2.png', 'Donex Raver', $basePath, 'layer donex2-layer reveal'); ?>
            <?php renderImage($homeFolder . 'quote1.png', "Let's create something together", $basePath, 'layer quote-top reveal delay-1'); ?>
            <?php renderImage($homeFolder . 'quote2.png', 'Every great idea starts with a conversation', $basePath, 'layer quote-bottom reveal delay-2'); ?>

            <?php foreach ($socialLinks as $name => $social): ?>
                <?php $itemClass = 'social-item social-' . $name . ' reveal delay-3'; ?>
                <?php if ($social['url'] !== ''): ?>
                    <a class="<?= $itemClass ?>" href="<?= $social['url'] ?>"
                       <?= strpos($social['url'], 'http') === 0 ? 'target="_blank" rel="noopener noreferrer"' : '' ?>
                       aria-label="<?= $social['label'] ?>">
                        <?php renderImage($homeFolder . $social['file'], $social['label'], $basePath); ?>
                    </a>
                <?php else: ?>
                    <span class="<?= $itemClass ?> is-empty" role="img" aria-label="<?= $social['label'] ?>">
                        <?php renderImage($homeFolder . $social['file'], $social['label'], $basePath); ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

</main>
<?php include 'includes/footer.php'; ?>