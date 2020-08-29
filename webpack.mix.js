const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.ProvidePlugin({
                $: "jquery",
                jQuery: "jquery",
                "window.jQuery": "jquery",
                Popper: ["popper.js", "default"]
            })
        ]
    };
});

mix.js("resources/js/app.js", "public/js")
    .version()
    .sass("resources/sass/app.scss", "public/css")
    .version();
module.exports = {
    rules: [{
        test: /\.s(c|a)ss$/,
        use: [
            "vue-style-loader",
            "css-loader",
            {
                loader: "sass-loader",

                // Requires sass-loader@^8.0.0
                options: {
                    implementation: require("sass"),
                    sassOptions: {
                        // fiber: require("fibers"),
                        indentedSyntax: true // optional
                    }
                }
            }
        ]
    }]
};
