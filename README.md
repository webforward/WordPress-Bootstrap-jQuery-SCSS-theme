#WordPress Starter Bootstrap jQuery LESS Theme
This is an extremely lightweight starter theme with bootstrap, jquery, less and loads of functions ready to go.

Some features may not be laid out the way you would like it but I have developed this to work the best for how I like to start my WordPress projects.

**Technologies**

- Bootstrap 3.3.5 (Ready to use)
- jQuery 1.11.3 (Ready to use)
- WordPress Core Styles (Ready to use)
- Less (Ready to use)
- Bootstrap Nav Walker (Ready to use) - https://github.com/twittem/wp-bootstrap-navwalker

**Functions / Features**

- Theme Settings (Ready to use) - Very basic, see below.
- To Navigation (Ready to use)
- Post Thumbnails (Ready to use)
- Set Post Thumbnail Size
- Custom Image Sizes
- Right Sidebar (Ready to use)
- Add img-responsive to images (Ready to use)
- Custom Post Type
- WYSIWYG Editor Styles
- Custom Excerpt Length
- Custom Read More Link
- Disable Comments (Ready to use)
- Custom Login Logo Url (Ready to use)
- Custom Login Logo
- Custom Login Styles
- Custom Login Powered By Text (Ready to use)
- WordPress Headers Cleanup (Ready to use)


**Theme Settings**

Very basic theme settings, I built this as most of our client kept coming back to us to change the telephone number, social media links within the header and footer which can not be changed within posts or pages.

Each field and overall settings are configured in functions.php but this script only supports text fields at the moment.

Information is stored in wp_options and there are two simple php functions for retrieving data:

the_tploption('textfield') - This echos the field data.
get_tploption('textfield') - This returns the field data.

I made my own functions to elimindate conflicts between themes and plugins, dont use get_option() etc.