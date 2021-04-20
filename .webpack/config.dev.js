require('dotenv');

const path = require('path');
const webpack = require('webpack');
const HtmlWebPackPlugin = require('html-webpack-plugin');

module.exports = {
    mode: 'development',

    entry: path.join(__dirname, './../src/index.js'),

    output: {
        path: path.join(__dirname, './../build'),
        filename: `[name].min.js?${new Date().getTime()}`,
        publicPath: '/',
    },

    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            plugins: ['styled-components'],
                        },
                    },
                    'stylelint-custom-processor-loader',
                ],
            },
            {
                test: /\.css$/i,
                use: ['style-loader', 'css-loader', 'resolve-url-loader'],
            },
            {
                test: /\.(jpe?g|gif|png|svg)$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'images/',
                        },
                    },
                ],
            },
            {
                test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'fonts/',
                        },
                    },
                ],
            },
        ],
    },

    plugins: [
        new HtmlWebPackPlugin({
            template: path.join(__dirname, './../public/index.html'),
        }),

        new webpack.EnvironmentPlugin({
            NODE_ENV: 'development',
        }),

        new webpack.DefinePlugin({ config: JSON.stringify(require('config')) }),
    ],

    resolve: {
        extensions: ['.js', '.css'],
        alias: {
            '@': path.join(__dirname, './../src/'),
        },
        modules: ['node_modules'],
    },

    devServer: {
        port: 3000,
        historyApiFallback: true,
    },

    devtool: 'inline-source-map',
};
