WordPress Starter Bootstrap jQuery SCSS Theme
---------------------------------------------

Clean and lightweight starter theme based on Bootstrap 5, jQuery 3, SCSS, Turbo and incorporates loads of functions 
ready to be turned on and off in the functions.php file.

This theme strips WordPress back, removes all the bloat and leaves you with a clean html response, a favicon, a single 
css resource in the head and a single js resource in the footer. Four requests in total.

Some features within this theme may not be laid out the way you like to work, but feel free to customise it. I developed 
this theme for ourselves and to streamline getting started on a new bespoke theme for a project.

The JS and SCSS within this theme are compiled using Vite from the /src folder to the /build folder. A good 
understanding of npm and composer is required to use this theme.

Feel free to submit pull requests of any improvements you can make; and if you find this theme useful, please 
[buy me a coffee](https://www.buymeacoffee.com/mrl22).

Installation & Run
------------------

### Development
```
$ npm install
$ npm run build
```
You can also run `npm run watch` this will create a temporary file at `build/vite-dev-server.json` which should be 
temporarily uploaded to the server. This will tell Vite-for-WP to load resources from http://localhost:5173/ for 
real-time changes. Note that only you will be able to see these updates.

### Useful Files

Files from `src` will be compiled in to `build` using Vite. If you wish to retain ownership of the source code, you 
should not upload or give your client access or access to the `src` folder. 

* `src/theme.js` - Theme JavaScript File.
* `src/scss/_variables.scss` - Bootstrap Customisation & Other Useful Variables.
* `src/scss/style.scss` - Theme Styles File.
* `src/assets/` - use this folder for any assets, these will be compiled in to `build/assets/`.

### Live Server
```
$ composer install
```
Make sure your compiled `build` folder is uploaded.

Packages
--------
- Vite for WP - https://github.com/kucrut/vite-for-wp
- Bootstrap ^5 (Loaded via NPM)
- jQuery ^3 (Loaded via NPM)
- Turbo (Loaded via NPM)
- WordPress Core SCSS Styles (Loaded via NPM)
- Bootstrap Nav Walker (Loaded via Composer) - https://github.com/wp-bootstrap/wp-bootstrap-navwalker
- Favicon - https://realfavicongenerator.net/

Theme Functions / Features
--------------------------

I recommend that you read the entire functions.php and uncomment / comment out features which you need in your theme.

- Disabled Automatic Core Updates (Enabled by default)
- Disabled Automatic twentytwenty* theme installs (Enabled by default)
- Output of template name in footer
- Output of Bootstrap responsive size in header (Enabled by default)
- ACF Theme Settings (Enabled by default if ACF plugin installed)
- Hide ACF Menu for non-developers (Enabled by default for username: webfwd)
- Close all ACF Sub Groups (Enabled by default)
- Vite Support (Enabled by default)
- Ability to load custom JS scripts
- Ability to load custom CSS scripts
- Top Navigation (Enabled by default)
- Post Thumbnails (Enabled by default)
- Set Post Thumbnail Size
- Custom Image Sizes
- Add SVG support in the WordPress media uploader (Enabled by default)
- Register Widget Areas (Enabled by default)
- Restore Classic Editor in the admin (Enabled by default)
- Restore Classic Widgets in the admin (Enabled by default)
- Add img-fluid to images (Enabled by default)
- Stop CF7 from adding <p> tags automatically
- Custom Post Type with Taxonomy
- Custom Post types in Appearance -> Menu's
- Custom Excerpt Length
- Custom Read More Link
- Disable Comments Globally (Enabled by default)
- Custom Login Logo Url (Enabled by default)
- Custom Login Logo
- Custom Login Styles (Enabled by default)
- Custom Login Powered By Text (Enabled by default)
- Rename 'Posts' post type
- Fix CSS Bug for Chrome v45 (Enabled by default)
- Remove unwanted widgets (Enabled by default)
- WordPress Headers Cleanup (Enabled by default)
- Security fixes (Enabled by default)
- Force admin bar to appear when logged in (Enabled by default)
- Remove Gutenberg block library from loading inline (Enabled by default)
- Disable Turbo on WordPress admin bar (Enabled by default)
- Example shortcode