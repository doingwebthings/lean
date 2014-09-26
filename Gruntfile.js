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
//                        'bower_components/bootstrap/js/modal.js',
//                        'bower_components/bootstrap/js/tooltip.js',
//                        'bower_components/bootstrap/js/popover.js',
//                        'bower_components/bootstrap/js/scrollspy.js',
//                        'bower_components/bootstrap/js/tab.js',
//                        'bower_components/bootstrap/js/affix.js',
    'assets/js/scripts.js' //
];




//grunt
'use strict';
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
            dist: {
                files: {
                    'assets/css/styles.css': [
                        'assets/less/index.less'
                    ]
                },
                options: {
                    compress: false,
                    sourceMap: true,
                    cleancss: true,
                    sourceMapFilename: 'styles.css.map'
                }
            }
        },
        //autoprefix all css
        autoprefixer: {
            options: {
                browsers: ['last 2 version', 'ie 8', 'ie 9']
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
        //uglify and concat js files
        uglify: {
            dist: {
                files: {
                    'assets/js/scripts.min.js': ['assets/js/scripts.min.js']
                },
                options: {
                    sourceMap: './scripts.min.js.map',
                    compress: {
                        drop_console: true
                    }
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
        //spritesmith
        sprite: {
            all: {
                src: 'assets/img/sprites/*.png',
                destImg: 'assets/img/spritesheet.png',
                destCSS: 'assets/less/sprites.less'
            }
        },
        //show window when done
        notify: {
            less: {
                options: {
                    title: 'Task less is done',
                    message: 'Now keep on coding'
                }
            },
            js: {
                options: {
                    title: 'Task Javascript is done',
                    message: 'Now keep on coding'
                }
            }
        },
        //watch job
        watch: {
            sprite: {
                files: ['assets/img/sprites/*.png'],
                tasks: ['sprite']
            },
            less: {
                files: [
                    'assets/less/*.less'
                ],
                tasks: ['less']
            },
            js: {
                files: [
                    'assets/js/scripts.js'
                ],
                tasks: ['concat']
            }
        }
    });





    //default for production: files are concatenated and uglified
    grunt.registerTask('default', [
        'sprite',
        'less',
        'autoprefixer',
        'uglify',
        'imagemin'
    ]);




};