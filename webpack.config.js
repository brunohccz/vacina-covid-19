const webpack = require("webpack");
const path = require("path");

module.exports = {
    plugins: [new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)],
    output: {
        publicPath: "/"
    },
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js/")
        }
    }
};
