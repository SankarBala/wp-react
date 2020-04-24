const mix = require("laravel-mix");
const path = require("path");

mix.webpackConfig({
  output: {
    chunkFilename: "assets/js/chunk/[name].js",
    publicPath:
      "wp-content/themes/" + path.basename(path.dirname(__filename)) + "/"
  }
});

mix
  .react("resources/js/app.js", "assets/js")
  .sass("resources/sass/app.scss", "assets/css")
  .sourceMaps(false, "source-map")
  .options({
    processCssUrls: false
  });

mix.copyDirectory("resources/images", "assets/images");

// mix.disableNotifications();

mix.disableSuccessNotifications();

mix.browserSync({
  ui: {
    port: 3001
  },
  port: 3000,
  online: true,
  files: ["assets/"],
  watch: true,
  proxy: {
    target: "127.0.0.1/wordpress_multisite/"
  }
});
