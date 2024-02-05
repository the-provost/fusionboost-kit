// Import lodash and attach it to the window object
import _ from 'lodash';
window._ = _;

// Import axios and attach it to the window object
import axios from 'axios';
window.axios = axios;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Import Popper.js for Bootstrap
import Popper from 'popper.js';
window.Popper = Popper;

// Import Bootstrap styles
import 'bootstrap/dist/css/bootstrap.css';

// Import Bootstrap JS components
import "bootstrap/dist/js/bootstrap.js";

// Import AdminLTE styles and scripts
import 'admin-lte';

// Import jQuery and attach it to the window object
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

// Environment variables for Pusher (if needed)
const pusherKey = import.meta.env.VITE_PUSHER_APP_KEY;
const pusherCluster = import.meta.env.VITE_PUSHER_APP_CLUSTER;

// If you need to use Echo for real-time events
/*
import Echo from 'laravel-echo';
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: pusherKey,
    cluster: pusherCluster,
    forceTLS: false,
    wsHost: window.location.hostname,
    wsPort: 6001,
    wssPort: 6001,
    disableStats: true,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
*/

