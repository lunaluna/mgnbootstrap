var browserSync = require("browser-sync");
browserSync({
  proxy: '127.0.0.1:8080',
  files: [
    "./dist/css/*.css",
    "./dist/js/*.js",
    "./dist/img/**/*.+(jpg|svg|png|gif)",
    "./**/*.php",
  ]
});
