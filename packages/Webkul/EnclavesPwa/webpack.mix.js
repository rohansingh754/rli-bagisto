const mix = require("laravel-mix");
require("laravel-mix-merge-manifest");

if (mix.inProduction()) {
    var publicPath = "publishable/assets";
} else {
    var publicPath = "../../../public/themes/enclave-pwa/build/assets";
}

mix.setPublicPath(publicPath).mergeManifest();
mix.disableNotifications();

mix.js(path.resolve("src/Resources/assets/enclaves/js/app.js"), "enclaves/js/app.js")
    .webpackConfig({
        resolve: {
            alias: {
                "@": path.resolve("src/Resources/assets/enclaves/sass"),
            },
        },
    })
    .copy(path.resolve("src/Resources/assets/enclaves/images"), publicPath + "/enclaves/images")
    .sass(path.resolve("src/Resources/assets/enclaves/sass/app.scss"), "enclaves/css/pwa.css")
    .sass(path.resolve("src/Resources/assets/enclaves/sass/enclave.scss"), "enclaves/css/enclave.css")
    .copy(path.resolve("src/Resources/assets/enclaves/fonts"), publicPath + "/enclaves/fonts")
    .options({
        processCssUrls: false,
    });

if (mix.inProduction()) {
    mix.version();
}
