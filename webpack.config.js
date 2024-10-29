const path = require('path');
// const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: ['./src/assets/js/main.js', './src/assets/scss/style.scss'],
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'src/public'),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [],
      },
      {
        test: /\.scss$/,
        exclude: /node_modules/,
        type: "asset/resource",
        generator: {
          filename: "main.css",
        },
        use: ["sass-loader"],
      },
      // {
      //   test: /\.s[ac]ss$/i,
      //   use: [
      //     MiniCssExtractPlugin.loader,
      //     "css-loader",
      //     "sass-loader",
      //   ],
      // },
    ],
  },
  // plugins: [
  //   new MiniCssExtractPlugin({
  //     // Options similar to the same options in webpackOptions.output
  //     // both options are optional
  //     filename: "[name].css",
  //     chunkFilename: "[id].css",
  //   }),
  // ],
};
