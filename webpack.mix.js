const { browserSync } = require("laravel-mix");
const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .vue()
    .sass("resources/scss/app.scss", "public/css")
    .webpackConfig(require("./webpack.config"));

// browserSync({
//     proxi: "http://127.0.0.1:8000",
// });
if (mix.inProduction()) {
    mix.version();
}
