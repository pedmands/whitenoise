module.exports = function(grunt){

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		/* Sass Task 
		*/
		sass: {
			dev: {
				options: {
					style: 'expanded',
					sourcemap: 'none',
				}, // options
				files : {
					'style-human.css': 'sass/style.scss'
				} // files
			}, // dev
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'none',
				}, // options
				files : {
					'style.css': 'sass/style.scss'
				} // files
			}// dist
		}, // Sass

		/* Autoprefixer Task
		*/
		autoprefixer: {
			options: {
				browsers: ['last 2 versions']
			}, // options
			multiple_files: {
				expand: true,
				flatten: true,
				src: 'compiled/*.css',
				dest: ''
			} // prefix all files
		}, // Autoprefixer

		/* Watch Task
		*/
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass', 'autoprefixer']
			} // css:
		}// Watch

	});

	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default',['watch']);

}