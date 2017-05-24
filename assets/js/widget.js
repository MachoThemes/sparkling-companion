jQuery(document).ready(function ($) {
	/* Clonning of Logo Client Widgets */
	jQuery(document).on('widget-added', function (e, widget) {
		sparklingSort();
	});
	jQuery(document).on('widget-updated', function (e, widget) {
		sparklingSort();
	});


	sparklingSort();
	/* Client widget sorting and cloning*/

	/* Font awsome selector */
	jQuery('select.sparkling-icon').change(function () {
		jQuery(this).siblings('span').removeClass().addClass('fa ' + jQuery(this).val());
	});

	/*
	 * Function for sorting
	 */
	function sparklingSort() {
		jQuery('.client-sortable').sortable({
			handle: '.logo_heading'
		})
				.bind('sortupdate', function (event, ui) {
					var index = 0;
					var attrname = jQuery(this).find('input:first').attr('name');
					var attrbase = attrname.substring(0, attrname.indexOf('][') + 1);
					var attrid = jQuery(this).find('input:first').attr('id');
					var attrbaseid = attrid.substring(0, attrid.indexOf('-client_logo') + 13);

					jQuery(this).find('li').each(function () {
						jQuery(this).find('.count').html(index + 1);
						jQuery(this).find('.image-id').attr('id', attrbaseid + index).attr('name', attrbase + '[client_logo][img]' + '[' + index + ']');
						jQuery(this).find('.sparkling-media-control').attr('data-delegate-container', attrbaseid + index);
						jQuery(this).find('.client-link').attr('id', 'link-' + index).attr('name', attrbase + '[client_logo][link]' + '[' + index + ']').trigger('change');
						index++;
					});
				});

		/* Cloning */
		jQuery('.client-sortable').cloneya().on('after_append.cloneya after_delete.cloneya', function (toClone, newClone) {
			jQuery('.client-sortable').trigger('sortupdate');
			jQuery(newClone).next('li').find('img').attr('src', '');
		});

		// Testimonial widget

		jQuery('.testimonial-sortable').sortable({
			handle: '.logo_heading'
		}).bind('sortupdate', function (event, ui) {
			var index = 0;
			var attrname = jQuery(this).find('input:first').attr('name');
			var attrbase = attrname.substring(0, attrname.indexOf('][') + 1);
			var attrid = jQuery(this).find('input:first').attr('id');
			var attrbaseid = attrid.substring(0, attrid.indexOf('-testimonials') + 13);

			jQuery(this).find('li').each(function () {
				jQuery(this).find('.count').html(index + 1);
				jQuery(this).find('.testimonial-img').attr('id', attrbaseid + index).attr('name', attrbase + '[testimonials][img]' + '[' + index + ']');
				jQuery(this).find('.sparkling-media-control').attr('data-delegate-container', attrbaseid + index);
				jQuery(this).find('.testimonial-name').attr('id', 'author-name-' + index).attr('name', attrbase + '[testimonials][name]' + '[' + index + ']').trigger('change');
				jQuery(this).find('.testimonial-content').attr('id', 'testimonial-content-' + index).attr('name', attrbase + '[testimonials][testimonial]' + '[' + index + ']').trigger('change');
				index++;
			});
		});

		jQuery('.testimonial-sortable').cloneya().on('after_append.cloneya after_delete.cloneya', function (toClone, newClone) {
			jQuery('.testimonial-sortable').trigger('sortupdate');
			jQuery(newClone).next('li').find('img').attr('src', '');
		});
	}
});


