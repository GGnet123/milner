var paths = {
	src: {
		dir: 'src',
		files: 'src/**/*.*'
	},

	dist: {
		dir: 'dist',
		files: 'dist/**/*'
	},

	views: {
		src: 'src/views/**/*.njk',
		dist: 'dist'
	},

	styles: {
		src: 'src/styles/*.scss',
		dist: 'dist/styles'
	},

	scripts: {
		entry: 'src/scripts/app.js',
		src: [
			'src/scripts/**/*.js'
		],
		dist: 'dist/scripts'
	},

	images: {
		src: 'src/images/**/*.*',
		dist: 'dist/images'
	},

	favicons: {
		src: 'src/favicons/*.*',
		dist: 'dist'
	},

	fonts: {
		src: 'src/fonts/**/*.+(eot|otf|svg|ttf|woff|woff2)',
		dist: 'dist/fonts/'
	}
};

module.exports = {
	paths: paths,
	plugins: {
			browserSync: {
	    proxy: "localhost:3000",
	    port: 5000,
	    files: [
	      paths.src.files
	    ],
	    notify: false
    },
    nodemon: {
      script: 'app.js',
      ignore: [
        'gulpfile.js',
        'gulp.config.js',
        'node_modules/'
      ]
    }
	}
};
