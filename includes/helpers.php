<?php
/**
 * helpers.php
 * Small reusable PHP functions used across the site.
 */

// Folder that holds the whole website (one level above /includes).
const SITE_ROOT = __DIR__ . '/..';

/**
 * Checks if an asset file exists on disk.
 * $relativePath example: "assets/images/homepage/Home_section2.png"
 */
function assetExists(string $relativePath): bool
{
    return is_file(SITE_ROOT . '/' . $relativePath);
}

/**
 * Prints an <img> if the file exists.
 * If it is missing, prints a visible placeholder that shows the expected filename,
 * so you always know which file to add and where.
 */
function renderImage(string $relativePath, string $altText, string $basePath = '', string $extraClass = ''): void
{
    $fileName = basename($relativePath);

    if (assetExists($relativePath)) {
        echo '<img class="' . $extraClass . '" src="' . $basePath . $relativePath . '" alt="' . htmlspecialchars($altText) . '" loading="lazy">';
    } else {
        echo '<div class="asset-placeholder ' . $extraClass . '" role="img" aria-label="Missing image: ' . htmlspecialchars($fileName) . '">';
        echo 'Missing asset:<br><strong>' . htmlspecialchars($fileName) . '</strong><br><small>' . htmlspecialchars(dirname($relativePath)) . '/</small>';
        echo '</div>';
    }
}
/**
 * Finds all numbered artworks of a category, in number order.
 * Example: prefix "CharacterDesign" -> CharacterDesign_1.png, CharacterDesign_2.png, ...
 * To add more artworks, just add the next number (CharacterDesign_4.png). No code change needed.
 * $folder example: "assets/images/illustrations/"
 */
/**
 * Finds all numbered artworks of a category, in number order.
 * Example: prefix "CharacterDesign" -> CharacterDesign_1.png, CharacterDesign_2.png, ...
 * To add more artworks, just add the next number (CharacterDesign_4.png). No code change needed.
 * $folder example: "assets/images/illustrations/"
 */
function getGalleryImages(string $folder, string $prefix): array
{
    // Matches files that start with the prefix and end with a number: Branding_1.png, WebDesign3.png, ...
    // (so Branding_bg.png and Branding_title.png are not included)
    $pattern = SITE_ROOT . '/' . $folder . $prefix . '*[0-9].{png,jpg,jpeg,webp}';
    $files   = glob($pattern, GLOB_BRACE) ?: [];

    // Sort by the number in the filename (so 10 comes after 9, not after 1)
    $getNumber = fn($file) => preg_match('/(\d+)\.[^.]+$/', basename($file), $match) ? (int) $match[1] : 0;
    usort($files, fn($a, $b) => $getNumber($a) <=> $getNumber($b));

    return array_map(fn($file) => $folder . basename($file), $files);
}