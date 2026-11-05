# Portfolio Website

PHP + HTML + CSS + JavaScript portfolio. No frameworks.

## Run it locally
From the `portfolio/` folder:

    php -S localhost:8000

Then open http://localhost:8000

## What each file does
- `index.php` – homepage (Teaser, About Me, Contacts)
- `includes/header.php` – top of every page (head + navigation)
- `includes/navigation.php` – hamburger button and menu
- `includes/footer.php` – footer, current year (PHP), back-to-top
- `includes/helpers.php` – shows a placeholder with the expected filename when an asset is missing
- `pages/` – My Works, Illustrations, Graphic Design, Web Design
- `assets/css/style.css` – colors (CSS variables at the top), fonts, layout
- `assets/js/script.js` – menu and back-to-top

## Where to put your files
| Folder | Files |
| ------ | ----- |
| `assets/images/homepage/` | Home_section1.gif, Home_section2.png, Home_section3.png |
| `assets/images/my-works/` | MyWorks_background.png, MyWorks_illustrations.png, MyWorks_graphicdesign.png, MyWorks_webdesign.png |
| `assets/images/shared/` | back_button.png |
| `assets/images/illustrations/` | CharacterDesign_*, ConceptArts_*, FanArts_* |
| `assets/images/graphic-design/` | Branding_*, SocialMedia_*, Merchandise_* |
| `assets/images/web-design/` | WebDesign_title.png, WebDesign_homepage.png, WebDesign_details1.png |
| `assets/fonts/` | CaveAgeRough.woff2 (or .ttf), SpecialElite.woff2 (or .ttf) |

Missing files show a dashed pink box with the filename it expects.
