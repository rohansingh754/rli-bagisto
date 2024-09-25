const mix = require("laravel-mix");
require("laravel-mix-merge-manifest");

if (mix.inProduction()) {
    var publicPath = "publishable/assets";
} else {
    var publicPath = "../../../public/themes/pwa/build/assets";
}

mix.setPublicPath(publicPath).mergeManifest();
mix.disableNotifications();

mix.js(path.resolve("src/Resources/assets/default/js/app.js"), "default/js/app.js")
    .webpackConfig({
        resolve: {
            alias: {
                "@": path.resolve("src/Resources/assets/default/sass"),
            },
        },
    })
    .copy(path.resolve("src/Resources/assets/default/images"), publicPath + "/default/images")
    .sass(path.resolve("src/Resources/assets/default/sass/app.scss"), "default/css/pwa.css")
    .js(path.resolve("src/Resources/assets/enclaves/js/app.js"), "enclaves/js/app.js")
    .webpackConfig({
        resolve: {
            alias: {
                "@": path.resolve("src/Resources/assets/enclaves/sass"),
            },
        },
    })
    .copy(path.resolve("src/Resources/assets/enclaves/images"), publicPath + "/enclaves/images")
    .sass(path.resolve("src/Resources/assets/enclaves/sass/app.scss"), "enclaves/css/pwa.css")
    .copy(path.resolve("src/Resources/assets/enclaves/fonts"), publicPath + "/enclaves/fonts")
    .copy(path.resolve("src/Resources/assets/firebase"), "../../../public/")
    .sass(
        __dirname + "/src/Resources/assets/default/sass/admin.scss",
        "css/pwa-admin.css",
    )
    .options({
        processCssUrls: false,
    });

if (mix.inProduction()) {
    mix.version();
}
