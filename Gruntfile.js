'use strict';
module.exports = function(grunt){
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

            //image optimization
            imagemin: {
                options: {
                    cache: false
                },
                dist: {
                    options: {
                        optimizationLevel: 5,
                        progressive: true
                    },
                    files: [
                        {
                            expand: true,
                            cwd: 'assets/img/',
                            src: ['**/*.{PNG,JPG,JPEG,GIF,png,jpg,jpeg,gif}'],
                            dest: 'assets/img/'
                        }
                    ]
                }
            },

            notify: {
                default: {
                    options: {
                        title: 'Task done',
                        message: 'Now keep on coding'
                    }
                }
            },

            //LESS
            less: {
                dist: {
                    files: {
                        'assets/css/styles.css': [
                            'assets/less/styles.less'
                        ]
                    },
                    options: {
                        compress: false,
                        // LESS source map
                        // To enable, set sourceMap to true and update sourceMapRootpath based on your install
                        sourceMap: true,
                        sourceMapFilename: 'assets/css/main.min.css.map'
//                    sourceMapRootpath: '/app/themes/lean/'
                    }
                }
            },

            //uglify and concat js files
            uglify: {
                dist: {
                    files: {
                        'assets/js/scripts.min.js': [
//                        'assets/bower_components/bootstrap/js/transition.js',
//                        'assets/bower_components/bootstrap/js/alert.js',
//                        'assets/bower_components/bootstrap/js/button.js',
//                        'assets/bower_components/bootstrap/js/carousel.js',
//                        'assets/bower_components/bootstrap/js/collapse.js',
//                        'assets/bower_components/bootstrap/js/dropdown.js',
//                        'assets/bower_components/bootstrap/js/modal.js',
//                        'assets/bower_components/bootstrap/js/tooltip.js',
//                        'assets/bower_components/bootstrap/js/popover.js',
//                        'assets/bower_components/bootstrap/js/scrollspy.js',
//                        'assets/bower_components/bootstrap/js/tab.js',
//                        'assets/bower_components/bootstrap/js/affix.js',
                            'assets/js/scripts.js'
                        ]
                    },
                    options: {
                        sourceMap: 'assets/js/scripts.min.js.map',
                        compress: {
                            drop_console: true
                        }
                    }
                }
            },

            watch: {
                less: {
                    files: [
                        'assets/less/*.less'
                    ],
                    tasks: ['less', 'notify']
                },
                js: {
                    files: [
                        'assets/js/scripts.js'
                    ],
                    tasks: [ 'uglify', 'notify']
                },
                livereload: {
                    // Browser live reloading
                    // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
                    options: {
                        livereload: true
                    },
                    files: [
                        'assets/css/styles.css',
                        'assets/js/scripts.js'
                    ]
                }
            },
            clean: {
                dist: [
                    'assets/css/styles.css',
                    'assets/js/scripts.min.js'
                ]
            },
            autoprefixer: {
                options: {
                    browsers: ['last 2 version', 'ie 8', 'ie 9']
                }
            }
        }
    );



    //unused but installed: newer, spritesmith, svg-sprite

    // Register tasks
    grunt.registerTask('default', [
        'clean',
        'less',
        'autoprefixer',
        'uglify',
        'imagemin',
        'notify'
    ]);
    grunt.registerTask('dev', [
        'watch'
    ]);

}
;