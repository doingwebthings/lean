'use strict';

/**
 * scriptfiles: these files are concatenated to scripts.min.js;
 * use only what you need to keep the filesize low
 **/
var scriptfiles = [
    'bower_components/jquery/dist/jquery.js', //jquery
    //'bower_components/underscore/underscore.js', //underscore
    'bower_components/bootstrap/js/transition.js',
//                        'bower_components/bootstrap/js/alert.js',
//                        'bower_components/bootstrap/js/button.js',
//                        'bower_components/bootstrap/js/carousel.js',
    'bower_components/bootstrap/js/collapse.js',
//                        'bower_components/bootstrap/js/dropdown.js',
    'bower_components/bootstrap/js/modal.js',
//                        'bower_components/bootstrap/js/tooltip.js',
//                        'bower_components/bootstrap/js/popover.js',
//                        'bower_components/bootstrap/js/scrollspy.js',
//                        'bower_components/bootstrap/js/tab.js',
//                        'bower_components/bootstrap/js/affix.js',
    'assets/js/scripts.js' //
];


//grunt
module.exports = function(grunt){

    //jit-grunt
    require('jit-grunt')(grunt, {
        sprite: 'grunt-spritesmith'
    });

    //time-grunt
    require('time-grunt')(grunt);

    //configure tasks
    grunt.initConfig({

        //LESS: assets/less/index.less -> assets/css/styles.css (+assets/css/styles.css.map)
        less: {
            dev: {
                files: {
                    'assets/css/styles.css': [
                        'assets/less/index.less'
                    ]
                },
                options: {
                    compress: false,
                    sourceMap: true,
                    cleancss: false,
                    sourceMapFilename: './assets/css/styles.css.map',
                    sourceMapBasepath: './assets/css'
                }
            },
            dist: {
                files: {
                    'assets/css/styles.css': [
                        'assets/less/index.less'
                    ]
                },
                options: {
                    compress: true,
                    cleancss: true
                }
            }
        },

        //autoprefix all css
        autoprefixer: {
            options: {
                browsers: ['last 3 versions', 'ie 8', 'ie 9']
            },
            dist: {
                files: {
                    'assets/css/styles.css': 'assets/css/styles.css'
                }
            }
        },

        //concat files
        concat: {
            js: {
                options: {
                    separator: ';'
                },
                src: scriptfiles,
                dest: 'assets/js/scripts.min.js'
            }
        },

        //minify css
        cssmin: {
            build: {
                files: {
                    'assets/css/styles.css': ['assets/css/styles.css']
                }
            }
        },

        //uglify and concat js files
        uglify: {
            dev: {
                files: {
                    'assets/js/scripts.min.js': ['assets/js/scripts.min.js']
                },
                options: {
                    compress: false
                }
            },
            dist: {
                files: {
                    'assets/js/scripts.min.js': ['assets/js/scripts.min.js']
                },
                options: {
                    compress: true
                }
            }
        },


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

        //spritesmith: create spritemap from png-files and also sprites.less
        sprite: {
            default: {
                src: 'assets/img/sprites/*.png',
                destImg: 'assets/img/spritesheet.png',
                destCSS: 'assets/less/sprites.less'
            },
            retina: {
                src: 'assets/img/sprites-2x/*.png',
                destImg: 'assets/img/spritesheet-2x.png',
                destCSS: 'assets/less/sprites-2x.less'
            }
        },

        //show window when done
        notify: {
            default: {
                options: {
                    title: 'Task "default" done',
                    message: 'The project has been built and all tasks have run successfully.'
                }
            },
            less: {
                options: {
                    title: 'Task "less" is done',
                    message: 'All files have been processed'
                }
            },
            js: {
                options: {
                    title: 'Task "javascript" is done',
                    message: 'All files have been processed'
                }
            },
            sprites: {
                options: {
                    title: 'Task "sprites" is done',
                    message: 'All files have been processed'
                }
            }
        },

        //watch job: watch for changes in sprites, less and js
        watch: {
            sprite: {
                files: ['assets/img/sprites/*.png'],
                tasks: ['sprite', 'notify:sprites']
            },
            less: {
                files: ['assets/less/*.less'],
                tasks: ['less:dev', 'notify:less']
            },
            js: {
                files: ['assets/js/scripts.js'],
                tasks: ['concat', 'uglify:dev', 'notify:js']
            },
            php: {
                files: ['**/*.php']
            },
            options: {
                livereload: true,
                //spawn: false,
                port: 80
            }
        }
    });


    //default for production: files are concatenated and uglified
    grunt.registerTask('default', [
        'sprite',
        'less:dist',
        'autoprefixer',
        'cssmin',
        'uglify:dist',
        'imagemin',
        'notify:default'
    ]);




};