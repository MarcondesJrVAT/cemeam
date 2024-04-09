import axios from 'axios';

import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import select2 from 'select2';
select2();

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
