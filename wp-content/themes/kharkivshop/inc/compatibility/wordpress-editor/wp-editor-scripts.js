/* global tinymce */
/* global siEditor */
(function ( $ ) {
	$.wpEditor = {

		init: function(){
			this.metaBoxFix();
			this.setTemplateClass();
			this.manipulateDom();
		},

		/**
		 * Function to fix meta box in Gutenberg editor.
		 */
		metaBoxFix: function (  ) {
			// Gutenberg is used && window.tinymce is set
			if (wp.data && window.tinymce) {
				wp.data.subscribe(function () {
					// the post is currently being saved && we have tinymce editors
					if (wp.data.select( 'core/editor' ).isSavingPost() && window.tinymce.editors) {
						for (var i = 0; i < tinymce.editors.length; i++) {
							tinymce.editors[i].save();
						}
					}
				});
			}
		},

		/**
		 * Manipulate DOM to make the header look like on front page and to display the sidebar.
		 */
		manipulateDom: function (){
			var editor_class = $('#editor').attr('class').match(/page[\w-]*\b/);
			var template_name = editor_class.toString().replace('page-template-','');

			this.addClassOnHeader( template_name );
			this.getFeaturedImage();
			this.addSidebarOnPage(template_name);
			this.addSidebarOnPost();
		},

		/**
		 * Add class for header based on the page template
		 * @param template
		 */
		addClassOnHeader: function( template ){
			if( ! jQuery('body').hasClass('post-type-page') ) {
				$('body').removeClass('KharkivShop-header-template');
				return;
			}

			var acceptedTemplates = ['default', 'template-about', 'template-blog', 'template-contact'];
			if( ! acceptedTemplates.includes( template ) ){
				$('body').removeClass('KharkivShop-header-template');
				return;
			}
			$('body').addClass('KharkivShop-header-template');
		},

		/**
		 * Add sidebar on page based on page template.
		 * @param template
		 */
		addSidebarOnPage: function(template){
			var acceptedTemplates = ['default','template-blog'];
			var th = this;
			if( ! jQuery('body').hasClass('post-type-page') ) {
				th.removeSidebarOnPage();
				return;
			}
			if( ! acceptedTemplates.includes( template ) ){
				th.removeSidebarOnPage();
				return;
			}
			if( siEditor.has_sidebar === false ){
				th.removeSidebarOnPage();
				return;
			}
			if( $('.editor-block-list__layout').parent().hasClass('KharkivShop-editor-wrapper')){
				return;
			}
			$('.editor-block-list__layout').wrap( '<div class="KharkivShop-editor-wrapper"></div>');
			$('.editor-block-list__layout').after( this.getSidebarMarkup() );
		},

		/**
		 * Remove sidebar on page.
		 */
		removeSidebarOnPage:function(){
			$('.si-wp-editor-sidebar').remove();
			if( $('.editor-block-list__layout').parent().hasClass('KharkivShop-editor-wrapper')){
				$('.editor-block-list__layout').unwrap();
			}
		},

		/**
		 * Add sidebar on post.
		 */
		addSidebarOnPost: function(){
			if( ! jQuery('body').hasClass('post-type-post') ) {
				return;
			}
			if( siEditor.has_sidebar === false ){
				return;
			}
			$('.editor-post-title').parent().parent().wrap('<div class="KharkivShop-editor-wrapper"></div>');
			$('.KharkivShop-editor-wrapper').append( this.getSidebarMarkup() );
		},

		/**
		 * Get sidebar markup.
		 * @returns {string}
		 */
		getSidebarMarkup: function(){
			return '<div class="si-wp-editor-sidebar"><p>' + siEditor.strings.sidebar + '</p></div>';
		},

		/**
		 *  A function that triggers when featured image is changed.
		 */
		getFeaturedImage: function () {

			if( ! jQuery('body').hasClass('post-type-page') ) {
				return;
			}
			var editor_class = $('#editor').attr('class').match(/page[\w-]*\b/);
			var template_name = editor_class.toString().replace('page-template-','');

			var acceptedTemplates = ['default','template-about', 'template-blog', 'template-contact'];
			if( ! acceptedTemplates.includes( template_name ) ){
				return;
			}

			var th = this;
			var mutationObserver = new MutationObserver(function(mutations) {
				var url;
				mutations.forEach( function ( mutation ) {
					if( mutation.target.className === 'components-responsive-wrapper__content'){
						url = mutation.target.currentSrc;
						if( typeof url !== 'undefined' ){
							th.setFeaturedImage( url );
							return false;
						}
					}
					if ( mutation.target.className === 'editor-post-featured-image') {
						url = $( mutation.target ).find( 'img' ).attr( 'src' );
						if( $( mutation.target ).find( 'img' ).length > 0 ) {
							if ( typeof url !== 'undefined' ) {
								th.setFeaturedImage( url );
								return false;
							}
						} else{
							th.setFeaturedImage( siEditor.header_image );
						}
					}
				});
			});

			// Starts listening for changes in the root HTML element of the page.
			mutationObserver.observe($( '.edit-post-layout' )[ 0 ],
				{
					attributes: true,
					childList: true,
					subtree: true,
				}
			);

			if( siEditor.post_thumbnail !== '' ){
				th.setFeaturedImage(siEditor.post_thumbnail);
				return false;
			}

			th.setFeaturedImage(siEditor.header_image);
			return false;
		},

		/**
		 * Set the featured image on editor's header.
		 */
		setFeaturedImage: function (url){
			$( '.editor-post-title').parent().css('background-image',  'url(' + url + ')');
		},

		/**
		 * Set template class on editor.
		 */
		setTemplateClass: function(){
			var editorContainer     = $( '#editor' );
			var pageTemplate = this.getTemplateClass();
			editorContainer.addClass( 'page-template-' + pageTemplate );
			this.updatePageTemplate( pageTemplate );
			this.handleTemplateChange();
		},

		/**
		 * Update class on editor.
		 */
		handleTemplateChange: function(){
			var editorContainer     = $( '#editor' ),
				templateSelectClass = '.editor-page-attributes__template select';
			var th = this;
			editorContainer
				.on( 'change.set-editor-class', templateSelectClass, function() {
					var pageTemplate = th.getTemplateClass();

					editorContainer
						.removeClass( function( index, className ) {
							return ( className.match( /\bpage-template-[^ ]+/ ) || [] ).join( ' ' );
						} )
						.addClass( 'page-template-' + pageTemplate );
					th.updatePageTemplate( pageTemplate );
					$( document ).trigger( 'editor-classchange' );
				} )
				.find( templateSelectClass ).trigger( 'change.set-editor-class' );
		},

		/**
		 * Get page template class.
		 * @returns {string}
		 */
		getTemplateClass:function(){
			var templateSelectClass = '.editor-page-attributes__template select';
			var pageTemplate = $( templateSelectClass ).val() || 'default';
			pageTemplate = pageTemplate
				.substr( pageTemplate.lastIndexOf( '/' ) + 1, pageTemplate.length )
				.replace( /\.php$/, '' )
				.replace( /\./g, '-' );
			return pageTemplate;
		},










		/**
		 * Detect when the page template is changing and update the header and the sidebar.
		 */
		updatePageTemplate: function( pageTemplate ) {
			if( ! jQuery('body').hasClass('post-type-page') ) {
				return;
			}

			this.addClassOnHeader( pageTemplate );
			this.addSidebarOnPage( pageTemplate );
		},


	};
})(jQuery);

wp.domReady( function() {
	jQuery.wpEditor.init();
});


jQuery(window).load( function (  ) {
	// jQuery.wpEditor.manipulateDom();
	// jQuery.wpEditor.getFeaturedImage();
	// jQuery.wpEditor.updatePageTemplate();
});

