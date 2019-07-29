const imagemin = require('imagemin-keep-folder');
const imageminJpegRecompress = require('imagemin-jpeg-recompress');
const imageminPngquant = require('imagemin-pngquant');
const imageminGifsicle = require('imagemin-gifsicle');
const imageminSvgo = require('imagemin-svgo');

imagemin(['src/img/**/*.{jpg,png,gif,svg}'], {
  plugins: [
    imageminJpegRecompress(),
    imageminPngquant({ quality: [0.65, 0.8] }),
    imageminGifsicle(),
    imageminSvgo()
  ],
  replaceOutputDir: output => {
    return output.replace(/src\/img\//, 'dist/img/')
  }
}).then(() => {
  console.log('Images optimized');
});
