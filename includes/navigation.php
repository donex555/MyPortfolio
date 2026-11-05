<?php
/**
 * navigation.php
 * Header bar. On desktop the links show in a row; on mobile they hide
 * behind the hamburger button. Same on every page.
 * Uses $basePath so links work from index.php and from /pages.
 */

// "MY WORKS" stays highlighted on My Works and on every gallery page.
$currentFile = basename($_SERVER['SCRIPT_NAME']);
$worksPages  = ['my-works.php', 'illustrations.php', 'graphic-design.php', 'web-design.php'];
$worksActive = in_array($currentFile, $worksPages, true);
?>
<header class="site-header">
    <button class="hamburger" id="menuToggle" type="button"
            aria-label="Open navigation menu" aria-expanded="false" aria-controls="siteMenu">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
    </button>

    <nav class="site-menu" id="siteMenu" aria-label="Main navigation">
        <ul>
            <li><a href="<?= $basePath ?>index.php#home">HOME</a></li>
            <li><a href="<?= $basePath ?>pages/my-works.php"<?= $worksActive ? ' class="is-active" aria-current="page"' : '' ?>>MY WORKS</a></li>
            <li><a href="<?= $basePath ?>index.php#about">ABOUT ME</a></li>
            <li><a href="<?= $basePath ?>index.php#contacts">CONTACTS</a></li>
        </ul>
    </nav>
</header>