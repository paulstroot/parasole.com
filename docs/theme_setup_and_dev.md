[&larr; back to readme](../readme.md)
# Theme setup
This WordPress theme utilizes node and postcss to compile styles and scripts.


## Installation
1. Make sure you have started your project on a local server (i.e. MAMP) at https://www.???.localhost
  a. When you set up this domain, update the proxy in the script "watch:browser-sync" to include your new development URL.
2. Navigate your terminal to the theme folder `wp-content/themes/starter`
3. Run `yarn install && yarn dev` in this folder.
5. Run `yarn watch`.
4. You should now see your project at http://localhost:3000.
5. Add [Tailwind utility classes](https://tailwindcss.com/docs/utility-first) with abandon

> Note: Running Mamp server will open the project at [localhost:3000](https://wwww.???.localhost), but running yarn dev on the theme will open up the project at localhost:3000. You can still view the site at your localhost URL, but the localhost:3000 URL will live-reload when changes are made.


## Generating a Zip file of the theme
This will zip up the theme to be deployed to a new Wordpress site. This is generally not necessary if you have access to the web host's files. You would use this method if you need to use the "Add new theme" functionality in the WordPress admin.

1. Run `yarn bundle`
2. Upload the resulting zip file to your site using the "Add New Theme” button on the "Themes” administration page


# Tailwind and Styles
This site uses tailwind. Source files located in the "tailwind" directory are compiled and placed in the theme/library/css folder. CSS files in this folder should not be edited directly. Instead, edit the files in the "tailwind" directory, which will in turn compile into the theme/library/css folder.

# Custom Javascript
Javascript is compiled and minimized using postcss. Source files located in the "javascript" folder are compiled and placed in the "themem/library/js" folder. Do not edit files in the theme/library/js folders directly, instead edit the source files in the "javascript" directory, which will in turn compile into the theme/library/js folder.

Custom javascript is split into two files.

## Top Scripts
Update `javascript/inline-header-scripts.js` to include any scripts that should be loaded inline in the <head> of hte page.

## Bottom Scripts
Update `javascript/script.js` to include any scripts that should be loaded at the bottom of the page.

# WordPress Functions
All wordpress PHP functions are loaded in theme/functions.php, which in turn loads multiple other files in theme/library/functions/. Best efforts have been made to compartmentalize related functions into their own file for easier management.

