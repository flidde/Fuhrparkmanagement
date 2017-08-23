$(function() {

  // Initialize nativeDroid2

  $.nd2({
    stats : {
      analyticsUA: 'UA-99308588-1' // Your UA-Code for Example: 'UA-123456-78'
    },
    advertising : {
      active : false, // true | false
      path : null, // Define where the Ad-Templates are: For example: "/examples/fragments/adsense/"
      extension : null // Define the Ad-Template content Extension (Most case: ".html" or ".php")
    }
  });


});
