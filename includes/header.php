<?php
/**
 * header.php
 * Opens the page: <html>, <head>, <body>, and adds the navigation.
 * Before including it, each page sets:
 *   $pageTitle - text for the browser tab
 *   $basePath  - "" for index.php, "../" for files inside /pages
 */
require_once __DIR__ . '/helpers.php';

$pageTitle = $pageTitle ?? 'Portfolio';
$basePath  = $basePath ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Font: Bowlby One SC -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">

    <!-- Tells the CSS that JavaScript works (used for the reveal animations) -->
        <script>
        document.documentElement.classList.add('js');
        // Safety: if script.js fails to load or has an error, show everything after 3 seconds
        setTimeout(function () {
            if (!document.documentElement.classList.contains('script-ready')) {
                document.documentElement.classList.remove('js');
            }
        }, 3000);
    </script>

    <link rel="stylesheet" href="<?= $basePath ?>assets/css/style.css">
    <?php if (!empty($extraCss)): ?><link rel="stylesheet" href="<?= $basePath . $extraCss ?>"><?php endif; ?>
    <script src="<?= $basePath ?>assets/js/script.js" defer></script>
</head>
<body>
<?php include __DIR__ . '/navigation.php'; ?>
