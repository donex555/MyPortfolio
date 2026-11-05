<?php
/**
 * lightbox.php
 * The big image preview that opens when a visitor clicks an artwork.
 * Used by the gallery pages. Controlled by script.js.
 */
?>
<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Image preview" hidden>
    <button class="lightbox-close" id="lightboxClose" type="button" aria-label="Close preview">&times;</button>
    <button class="lightbox-arrow lightbox-prev" id="lightboxPrev" type="button" aria-label="Previous image">&#8249;</button>
    <img class="lightbox-image" id="lightboxImage" src="" alt="">
    <button class="lightbox-arrow lightbox-next" id="lightboxNext" type="button" aria-label="Next image">&#8250;</button>
</div>