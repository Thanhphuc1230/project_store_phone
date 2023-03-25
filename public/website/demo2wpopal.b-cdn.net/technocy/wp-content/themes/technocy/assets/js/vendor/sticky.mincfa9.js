(function ($, elementorFrontend, elementorModules) {
    'use strict';
    var _sticky = elementorModules.frontend.handlers.Base.extend({
        bindEvents            : function bindEvents() {
            elementorFrontend.addListenerOnce(this.getUniqueHandlerID() + 'sticky', 'resize', this.run);
        },
        unbindEvents          : function unbindEvents() {
            elementorFrontend.removeListeners(this.getUniqueHandlerID() + 'sticky', 'resize', this.run);
        },
        isStickyInstanceActive: function isStickyInstanceActive() {
            return undefined !== this.$element.data('sticky');
        },
        activate              : function activate() {
            var elementSettings = this.getElementSettings(),
                stickyOptions   = {
                    to           : elementSettings.sticky,
                    offset       : elementSettings.sticky_offset,
                    effectsOffset: elementSettings.sticky_effects_offset,
                    classes      : {
                        sticky       : 'elementor-sticky',
                        stickyActive : 'elementor-sticky--active elementor-section--handles-inside',
                        stickyEffects: 'elementor-sticky--effects',
                        spacer       : 'elementor-sticky__spacer'
                    }
                },
                $wpAdminBar     = elementorFrontend.elements.$wpAdminBar;
            if (elementSettings.sticky_parent) {
                stickyOptions.parent = '.elementor-widget-wrap';
            }
            if ($wpAdminBar.length && 'top' === elementSettings.sticky && 'fixed' === $wpAdminBar.css('position')) {
                stickyOptions.offset += $wpAdminBar.height();
            }
            this.$element.sticky(stickyOptions);
        },
        deactivate            : function deactivate() {
            if (!this.isStickyInstanceActive()) {
                return;
            }
            this.$element.sticky('destroy');
        },
        run                   : function run(refresh) {
            if (!this.getElementSettings('sticky')) {
                this.deactivate();
                return;
            }
            var currentDeviceMode = elementorFrontend.getCurrentDeviceMode(),
                activeDevices     = this.getElementSettings('sticky_on');
            if (-1 !== activeDevices.indexOf(currentDeviceMode)) {
                if (true === refresh) {
                    this.reactivate();
                } else if (!this.isStickyInstanceActive()) {
                    this.activate();
                }
            } else {
                this.deactivate();
            }
        },
        reactivate            : function reactivate() {
            this.deactivate();
            this.activate();
        },
        onElementChange       : function onElementChange(settingKey) {
            if (-1 !== ['sticky', 'sticky_on'].indexOf(settingKey)) {
                this.run(true);
            }
            if (-1 !== ['sticky_offset', 'sticky_effects_offset', 'sticky_parent'].indexOf(settingKey)) {
                this.reactivate();
            }
        },
        onInit                : function onInit() {
            elementorModules.frontend.handlers.Base.prototype.onInit.apply(this, arguments);
            this.run();
        },
        onDestroy             : function onDestroy() {
            elementorModules.frontend.handlers.Base.prototype.onDestroy.apply(this, arguments);
            this.deactivate();
        }
    });

    $( window ).on( 'elementor/frontend/init', () => {
        const addHandler = ( $element ) => {
            elementorFrontend.elementsHandler.addHandler( _sticky, {
                $element,
            } );
        };

        elementorFrontend.hooks.addAction( 'frontend/element_ready/section', addHandler );
    } );

}(jQuery, window.elementorFrontend, window.elementorModules));
