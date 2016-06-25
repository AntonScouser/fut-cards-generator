var path = require('path');
var webpack = require('webpack');
var WebpackConfig = require('webpack-config');
var ExtractTextPlugin = require('extract-text-webpack-plugin');

const PROJECT_PATH = path.resolve('./');
const SRC_DIR = path.resolve(PROJECT_PATH, 'src/FUTCardGeneratorBundle/Resources/public');
const APP_DIR = path.resolve(SRC_DIR, 'app');
const DIST_PATH = path.resolve(PROJECT_PATH, 'web/compiled/prod');

var masks = require('./file-masks.js');
var packageJson = require(PROJECT_PATH + '/package.json');
var dependencies = Object.keys(packageJson.dependencies);

///

module.exports = new WebpackConfig().merge({
    context: PROJECT_PATH,
    output: {
        path: DIST_PATH,
        filename: '[name].bundle.js'
    },
    entry: {
        app: APP_DIR + '/app.js',
        vendor: dependencies
    },
    module: {
        loaders: [
            {
                test: masks.js,
                exclude: masks.vendor,
                loader: 'ng-annotate?add=true!babel-loader'
            },
            {
                test: masks.yaml,
                exclude: masks.vendor,
                loader: 'json-loader!yaml-loader'
            },
            {
                test: masks.json,
                exclude: masks.vendor,
                loader: 'json-loader'
            },
            {
                test: masks.html,
                loader: 'html-loader'
            },
            {
                test: masks.css,
                loader: ExtractTextPlugin.extract('style-loader!', 'css-loader!postcss-loader')
            },
            {
                test: masks.stylus,
                loader: ExtractTextPlugin.extract('style-loader','css-loader!postcss-loader!stylus-loader')
            },
            { 
                test: masks.fonts,
                loader: 'file-loader?name=fonts/[name].[ext]' 
            },
            {
                test: masks.images,
                loader: 'file-loader?name=images/[name].[ext]?[hash]' 
            }
        ]
    },
    resolve: {
        extensions: [
            '', '.js', ".yml", '.styl', '.html'
        ],
        alias: {
            // Libs Styles
            'bootstrap.css$': 'bootstrap/dist/css/bootstrap.min.css',
            'font-awesome.css$': 'font-awesome/css/font-awesome.css',
            'datepicker.css$': 'jquery-datetimepicker/jquery.datetimepicker.css',
            'ngDialog-styles': 'ng-dialog/css',
            'router-extras': 'ui-router-extras/release/modular',
            'mask$': 'mask/dist/ngMask.js',

            // Fix libs paths
            'spin$': 'spin.js'
        },
        modulesDirectories: [
            SRC_DIR,
            'web',
            'node_modules',
            'bower_components'
        ]
    },
    plugins: [

        // Auto-injected Dependencies
        new webpack.ProvidePlugin({
            'window.jQuery': 'jquery',
            jQuery: 'jquery',
            $: 'jquery',
            _: 'lodash',
            Selectize: 'selectize'
        }),

        new ExtractTextPlugin('[name].bundle.css'),
        new webpack.optimize.CommonsChunkPlugin('vendor', 'vendor.bundle.js')
    ]
});

