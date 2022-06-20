const path = require('path');
const TerserPlugin = require("terser-webpack-plugin");

module.exports = {
    entry: "./src/index.js",
    output: {
        path: path.resolve(__dirname, "admin/js"),
        filename: "scrapmanga_functions.js"
    },
    watch: true,
    resolve: {
        extensions: [".js"]
    },
    plugins: [
    ],
    /* optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin({
                terserOptions: {
                    compress: {
                        drop_console: true
                    }
                }
            })
        ],
    }, */
}