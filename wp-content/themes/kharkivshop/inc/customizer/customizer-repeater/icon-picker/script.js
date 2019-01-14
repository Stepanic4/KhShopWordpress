/**
 * Fontawesome iconpicker control in the repeater
 *
 * @package Hestia
 */
(function ($) {
    'use strict';
    wp.customizerRepeater = {

        init: function () {
            this.iconPickerToggle();
            this.handleElementClick();
            this.handleSearch();
        },
        search: function ($searchField) {
            var itemsList  = $searchField.parent().next().find( '.iconpicker-items' );
            var searchTerm = $searchField.val().toLowerCase();
            if (searchTerm.length > 0) {
                itemsList.children().each(
                    function () {
                        if ($( this ).filter( '[title*='.concat( searchTerm ).concat( ']' ) ).length > 0 || searchTerm.length < 1) {
                            $( this ).show();
                        } else {
                            $( this ).hide();
                        }
                    }
                );
            } else {
                itemsList.children().show();
            }
        },
        iconPickerToggle: function () {
            $( '.icp-auto' ).on(
                'click', function () {
                    var iconPicker = $( this ).parent().next();
                    iconPicker.addClass('iconpicker-visible');
                }
            );
        },
        handleElementClick: function () {
            $( '.iconpicker-items>i' ).on(
                'click', function () {
                    var iconClass  = $( this ).attr( 'class' );
                    var classInput = $( this ).parents( '.iconpicker-popover' ).prev().find( '.icp' );
                    classInput.val( iconClass );
                    classInput.attr( 'value', iconClass );

                    var iconPreview = classInput.next( '.input-group-addon' );
                    var iconElement = '<i class="'.concat( iconClass, '"><\/i>' );
                    iconPreview.empty();
                    iconPreview.append( iconElement );
                    classInput.trigger( 'change' );
                    return false;
                }
            );
        },
        handleSearch: function () {
            $( '.iconpicker-search' ).on(
                'keyup', function () {
                    wp.customizerRepeater.search( $( this ) );
                }
            );
        }
    };

    $( document ).ready(
        function () {
            wp.customizerRepeater.init();

            $( document ).mouseup(
                function (e) {
                    var container = $( '.iconpicker-popover' );

                    if ( ! container.is( e.target )	&& container.has( e.target ).length === 0) {
                        container.removeClass( 'iconpicker-visible' );
                    }
                }
            );

        }
    );

})( jQuery );