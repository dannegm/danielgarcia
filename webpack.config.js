const path = require('path')
const HtmlWebPackPlugin = require('html-webpack-plugin')

require('dotenv').config()

module.exports = {
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                },
            },
            {
                test: /\.html$/,
                use: [
                    {
                        loader: 'html-loader',
                    }
                ]
            },
            {
                test: /\.s[ac]ss$/i,
                use: [
                    'style-loader',
                    'css-loader',
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true,
                            sassOptions: {
                                outputStyle: 'compressed',
                            },
                        },
                    },
                ],
            },
        ],
    },
    resolve: {
        extensions: ['.js', '.jsx', '.css', '.scss'],
        alias: {
            '@': path.resolve(__dirname, 'src/'),
        },
        modules: [
          'node_modules',
        ],
    },
    plugins: [
        new HtmlWebPackPlugin ({
            template: './public/index.html',
            filename: './index.html',
        }),
    ],
    devServer: {
        historyApiFallback: true,
    },
}
