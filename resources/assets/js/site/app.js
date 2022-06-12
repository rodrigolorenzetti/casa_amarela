require('./bootstrap');

var pathArray = window.location.pathname.split('/');

var currentLocation = pathArray[1];

require('./contato');
require('./lazy-load');
require('./main');
require('./mascaras');
require('./site-validator');
