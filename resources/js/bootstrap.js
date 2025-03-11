// Import lodash
import _ from 'lodash';
window._ = _;

// Import axios and configure defaults
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Import jQuery
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

// Import Popper and Bootstrap
import * as Popper from '@popperjs/core';
window.Popper = Popper;

// Import Bootstrap with its bundle
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Import AdminLTE
import 'admin-lte';

// Import styles via your app.scss instead of here
// DO NOT import CSS/SCSS files here

// Initialize Bootstrap tooltips globally
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Initialize AdminLTE components after DOM is ready
$(document).ready(function() {
    // Only initialize if the sidebar exists
    if ($('.main-sidebar').length > 0) {
        // Initialize PushMenu
        if ($('[data-widget="pushmenu"]').length > 0) {
            $('[data-widget="pushmenu"]').on('click', function(e) {
                e.preventDefault();
                if ($('body').hasClass('sidebar-collapse')) {
                    $('body').removeClass('sidebar-collapse');
                } else {
                    $('body').addClass('sidebar-collapse');
                }
            });
        }

        // Initialize TreeView
        if ($('[data-widget="treeview"]').length > 0) {
            $('[data-widget="treeview"]').each(function() {
                $(this).find('.nav-link').on('click', function(e) {
                    let $parentLi = $(this).parent('li');
                    if ($parentLi.hasClass('menu-open')) {
                        $parentLi.removeClass('menu-open');
                        $parentLi.find('.nav-treeview').slideUp();
                    } else {
                        $parentLi.addClass('menu-open');
                        $parentLi.find('.nav-treeview').slideDown();
                    }
                });
            });
        }
    }
});

// Pusher Configuration
const pusherKey = import.meta.env.VITE_PUSHER_APP_KEY || null;
const pusherCluster = import.meta.env.VITE_PUSHER_APP_CLUSTER || null;

// Error handling for missing environment variables
if (process.env.NODE_ENV === 'development') {
    if (!pusherKey) console.warn('VITE_PUSHER_APP_KEY is not defined');
    if (!pusherCluster) console.warn('VITE_PUSHER_APP_CLUSTER is not defined');
}

// Echo Configuration (commented out until needed)
/*
import Echo from 'laravel-echo';

if (pusherKey && pusherCluster) {
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: pusherKey,
        cluster: pusherCluster,
        forceTLS: false,
        wsHost: window.location.hostname,
        wsPort: 6001,
        wssPort: 6001,
        disableStats: true,
        enabledTransports: ['ws', 'wss'],
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
        }
    });
}
*/

export {
    axios,
    _,
    jQuery,
    bootstrap,
    Popper
};
