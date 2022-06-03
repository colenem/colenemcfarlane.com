import $ from 'jquery';

const menuActions = {
  cacheElements: function() {
    console.log( 'elements cached' );
    this.navigationMenu = $('.banner__menu');
    this.mobileMenuButton = $('.menu-button');
  },

  toggleMobileMenu: function( event ) {
    event.preventDefault();

    console.log( this.navigationMenu );
    this.navigationMenu.toggleClass('hidden');
  },

  init: function() {
    console.log( 'i\'m here!' );
    this.cacheElements();

    this.mobileMenuButton.on( 'click', this.toggleMobileMenu.bind( this ) );
  },
}

export default menuActions;
