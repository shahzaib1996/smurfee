( function( api ) {

	// Extends our custom "ecommerce-hub" section.
	api.sectionConstructor['ecommerce-hub'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );