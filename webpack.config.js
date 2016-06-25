'use strict';

var WebpackConfig = require('webpack-config');

// Please use `process.env.WEBPACK_ENV || process.env.NODE_ENV` to set `[env]` variable or override it via `WebpackConfig.environment.set({ env: 'dev' })`. 
module.exports = new WebpackConfig().extend('./webpack/webpack.base.config.js');