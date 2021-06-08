( function( api ) {

	// Extends our custom "petlove" section.
	api.sectionConstructor['petlove'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );