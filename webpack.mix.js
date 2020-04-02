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
  .sourceMaps(false, 'source-map')
  .options({
    processCssUrls: false
  });

mix.copyDirectory("resources/images", "assets/images");
