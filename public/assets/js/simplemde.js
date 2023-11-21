$(function() {
  'use strict';

  /*simplemde editor*/
  if ($("#section1").length) {
    var simplemde = new SimpleMDE({
      element: $("#section1")[0]
    });
  }

  if ($("#section2").length) {
    var simplemde = new SimpleMDE({
      element: $("#section2")[0]
    });
  }

  if ($("#section3").length) {
    var simplemde = new SimpleMDE({
      element: $("#section3")[0]
    });
  }

});