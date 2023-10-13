module.exports = function(grunt) {

grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            main: {
                options: {
                  style: 'compressed',
                  sourcemap: 'none'
                },
                files: {
                  'style.css': 'dev/scss/main.scss'
                }
            },
            override: {
                options: {
                  style: 'compressed',
                  sourcemap: 'none'
                },
                files: {
                  'css/lib/bootstrap.min.css': 'dev/scss/override.scss'
                }
            }
        },
        uglify: {
            basic: {
                files: {
                    'js/theme.js': 'dev/js/main.js',
                },
            }
        },
        watch: {
            main: {
                files: ['dev/scss/main.scss'],
                tasks: ['sass:main']
            },
            override: {
                files: ['dev/scss/override.scss', 'dev/scss/custom-variables.scss'],
                tasks: ['sass:override']
            },
            js: {
            	files: ['dev/js/main.js'],
                tasks: ['uglify'],
            }
        },

});

grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-uglify-es');
grunt.loadNpmTasks('grunt-contrib-watch');

grunt.registerTask('default', ['sass', 'uglify', 'watch']);
}; 