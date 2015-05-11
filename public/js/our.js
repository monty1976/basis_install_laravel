/**
 * Created by Rene on 27-04-2015.
 */

/*
$(document).ready(function(){
    //hides alert boxes
  //  $(".alert").fadeTo(2000, 2000).slideUp(500, function(){
  //      $(".alert").alert('close');
  //  });
});

*/

$(document).ready(function() {

              //parse the json to an array
    var evt = JSON.parse(boerneriget.content);

    console.log(evt);

    $('#calendar').fullCalendar({
        lang: 'da',
        defaultDate: Date.now(),
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: evt,
        eventClick: function(calEvent, jsEvent, view){

            $("#modalContent").html(calEvent.content);
            $("#myModal").modal('show');

            console.log(calEvent);
            console.log(jsEvent);
            console.log(view);
        }
    });

});