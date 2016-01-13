var fs          = require ( 'fs' ),
    manifestXML = fs.readFileSync ( './mod_social_share_buttons/mod_social_share_buttons.xml', 'utf8' ),
    xml2json    = require ( 'xml2json' ),
    manifest    = (JSON.parse ( xml2json.toJson ( manifestXML ) )).extension,
    gulp        = require ( 'gulp' ),
    rename      = require ( 'gulp-rename' ),
    zip         = require ( 'gulp-zip' ),
    less        = require ( 'gulp-less' ),
    cssnano     = require ( 'gulp-cssnano' ),
    seq         = require ( 'run-sequence' );

gulp.task ( 'create.installer', function () {
    return gulp
        .src ( [
            './mod_social_share_buttons/**',
            '!./mod_social_share_buttons/{less,less/**}'
        ] )
        .pipe ( zip ( 'mod_social_share_buttons__' + manifest.version[1] + '__installer.zip' ) )
        .pipe ( gulp.dest ( './.installers' ) );
} );

gulp.task ( 'less2css', function () {
    return gulp
        .src ( './mod_social_share_buttons/less/style.less' )
        .pipe ( less () )
        .pipe ( gulp.dest ( './mod_social_share_buttons/css' ) )
} );

gulp.task ( 'css.min', function () {
    return gulp
        .src ( './mod_social_share_buttons/css/style.css' )
        .pipe ( cssnano () )
        .pipe ( rename ( 'style.min.css' ) )
        .pipe ( gulp.dest ( './mod_social_share_buttons/css' ) )
} );

gulp.task ( 'style', function ( cb ) {
    seq ( 'less2css', 'css.min', cb );
} );

gulp.task ( 'start', function () {
    gulp.watch ( './mod_social_share_buttons/less/style.less', ['style'] );
} );