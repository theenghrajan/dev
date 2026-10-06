// Override Settings
var boostPFSInstantSearchConfig = {
    search: {
        suggestionMobileStyle: 'style1'
    }
};

// Override Settings
(function () {  // Add this
  BoostPFS.inject(this);  // Add this

  // Customize style of Suggestion box
  SearchInput.prototype.customizeInstantSearch = function(suggestionElement, searchElement, searchBoxId) {
  };
  InstantSearchMobile.prototype.afterBindEvents = function() {
    var self = this;

    jQ('.header__action-item-link[data-action="toggle-search"]').off('click').click(function(e) {
      e.preventDefault();
      //e.stopPropagation();
      jQ('.search-bar__input').focus();
      self.openSuggestionMobile();
    });

  }
  InstantSearchMobile.prototype.afterCloseInstantSearchMobile = function(isClose) {
    //Fix conflict with theme search
    jQ('.header__search-bar-wrapper').removeClass('is-visible');
    jQ('header.header.header--inline').removeClass('header--search-expanded');
  }


})();  // Add this at the end