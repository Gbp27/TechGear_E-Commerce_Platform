//Name: Geetha Punukollu
//Date: April 19 2024
//Course/Section: IT-202-004
//Assignment Name: Phase 5
//Email: gbp@njit.edu

$(document).ready( () => {
    // Clicking on the reset button
    $("#reset_button").click( () => {
      // clears text boxes
      $("#code").val("");
      $("#name").val("");
      $("#description").val("");
      $("#color").val("");
      $("#price").val("");
      //makes the cursor move to the first input box
      $("#code").focus();
    });
  });