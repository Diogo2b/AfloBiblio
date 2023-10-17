require("bootstrap");

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function () {
  $('[data-toggle="popover"]').popover();
});

import "./styles/app.scss";
