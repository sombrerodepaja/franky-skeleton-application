module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: true,
          sourceMap: true,
          optimization: 2
        },
        files: { // destination file and source file
          "public/skin/default/css/style.css": "public/skin/default/less/style.less",
          "public/skin/default/css/grid.css": "public/skin/default/less/grid.less", 
          "public/skin/default/css/panel.css": "public/skin/default/less/panel.less", 
          "public/skin/ecommerce/css/cart.css": "public/skin/ecommerce/less/cart.less", 
          "public/skin/catalog/css/catalog.css": "public/skin/catalog/less/catalog.less", 
          "public/skin/blog/css/blog.css": "public/skin/blog/less/blog.less", 
          "public/skin/sliders/css/sliders.css": "public/skin/sliders/less/sliders.less",
        }
      }
    },
    watch: {
      less: {
            files: ['public/skin/default/less/*.less', 
            'public/skin/ecommerce/less/*.less', 
            'public/skin/catalog/less/*.less', 
            'public/skin/blog/less/*.less', 
            'public/skin/sliders/less/*.less'],
            tasks: ['less'],
            options: {
                livereload: true
            }
        }
    },
      browserSync: {
          dev: {
              bsFiles: {
                  src: [
                      'public/skin/default/css/*.css',
                      'public/skin/default/css/franky-font/*.css',
                      'public/skin/catalog/css/*.css',
                      'public/skin/ecommerce/css/*.css',
                      'public/skin/blog/css/*.css',
                      'public/skin/galeria/css/*.css',
                      'public/skin/slider/css/*.css',
                      'modulos/base/diseno/*.phtml'
                  ]
              },
              options: {
                  watchTask: true,
                  proxy: "local.franky"
              }
          }
      }
  });
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.registerTask('default', ['less', 'browserSync', 'watch']);
};
