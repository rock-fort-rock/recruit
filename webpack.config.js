// output.pathに絶対パスを指定する必要があるため、pathモジュールを読み込んでおく
const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');//CSSを別ファイルに出力
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const Promise = require('es6-promise').polyfill();
const Path = '/htdocs/assets';

module.exports = [
  //css
  {
    // context: path.join(__dirname, '/htdocs/assets'),
   entry: {
      style: __dirname + Path + '/css/sass/style.scss',
      amp: __dirname + Path + '/css/sass/amp.scss',
      site: __dirname + Path + '/css/sass/site.scss',
    },
    output: {
        path: __dirname + Path + '/css/',
        filename: '[name].css'
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                  fallback: 'style-loader',
                  use: [
                    {
                      loader: 'css-loader',
                      options: { sourceMap: true, minimize: true }
                    },
                    {
                      loader: 'postcss-loader',
                      options: {
                        sourceMap: true,
                        plugins: [
                          // Autoprefixerを有効化
                          // ベンダープレフィックスを自動付与する
                          require('autoprefixer')({grid: true})
                        ]
                      }
                    },
                    {
                      loader: 'sass-loader',
                      options: { sourceMap: true }
                    }
                  ]
                })
            },
            { test: /\.svg(\?v=\d+\.\d+\.\d+)?$/, loader: 'url-loader?mimetype=image/svg+xml' },
            { test: /\.woff(\d+)?(\?v=\d+\.\d+\.\d+)?$/, loader: 'url-loader?mimetype=application/font-woff' },
            { test: /\.eot(\?v=\d+\.\d+\.\d+)?$/, loader: 'url-loader?mimetype=application/font-woff' },
            { test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/, loader: 'url-loader?mimetype=application/font-woff' }
        ],
    },
    devtool: 'source-map',
    plugins: [
        new ExtractTextPlugin({
          filename: "[name].css",
          allChunks: false
        })
    ]
  },

  //js
  {
    // モードの設定、v4系以降はmodeを指定しないと、webpack実行時に警告が出る
    // mode: 'production',
    // mode: 'development',

    // context: __dirname + '/htdocs',
    entry: __dirname + Path + '/js/babel/script.js',
    output: {
      path: __dirname + Path + '/js/',
      filename: 'bundle.js',
    },
    optimization: {
      minimizer: [
        new UglifyJSPlugin({
          uglifyOptions: {
            compress: {
              drop_console: true
            }
          }
        })
      ]
    },
    // plugins: [
    //   new webpack.ProvidePlugin({
    //     $: 'jquery',
    //     jQuery: 'jquery'
    //   })
    // ],

    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          loader: "babel-loader",
          //package.jsonに記載 watch中でも反映される
          // query:{
          //   presets: ['react', 'env']
          // }
          // query:{
          //   presets: ['react', 'es2015']
          // }
        }
      ]
    }
  },


]
