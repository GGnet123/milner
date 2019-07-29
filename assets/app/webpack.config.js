const path = require('path');

var APP_DIR = path.resolve(__dirname, 'src')
var BUILD_DIR = path.resolve(__dirname, 'dist')

module.exports = {
    entry: APP_DIR + '/scripts/app.js',

    mode: 'production',

    output: {
        path: BUILD_DIR + '/scripts/',
        filename: 'bundle.js'
    },

    module: {
        rules: [
            {
                test: /\.(js)$/,
                include: APP_DIR,
                exclude: /(node_modules)/,
                loader: 'babel-loader',
                query: {
                    presets: ['env']
                }
            }
        ]
    }
};
