function myFunction() {
    $(".result").addClass("invisible");
    $(".result").removeClass("mb-3 mt-3");
    var value = $("#cabType").val();
    //alert("Changed :"+value);
    if (value == "CedMicro") {
        $("#luggage").prop("disabled", true);
    }
    else {
        $("#luggage").prop("disabled", false);
    }
}
$(document).ready(function() 
{
    $(".nosamelocation").change(function() 
    {
        $("select option").prop("disabled", false);
        $(".nosamelocation").not($(this)).find("option[value='" + $(this).val() + "']").prop("disabled", true);
    });
});

function myFunction2() {
    var pickup = $("#pickup").val();
    var destination = $("#destination").val();
    var cabType = $("#cabType").val();
    var luggage = $("#luggage").val();

    if (!pickup) {
        alert("Please select current location");
        return false;
    }
    if (!destination) {
        alert("Please select destination");
        return false;
    }
    if (pickup == destination) {
        alert("Pickup and Destination can not be same");
        return false;
    }
    if (!cabType) {
        alert("Please select Type of Cab");
        return false;
    }
    if (cabType != "CedMicro") {
        if (!luggage) {
            alert("Please inputweight of luggage(if any)");
            return false;
        }
    }
    $.ajax({
        method: 'POST',
        url: 'calcfare.php',
        data: { pickup: pickup, destination: destination, cabtype: cabType, luggage: luggage },
        success: function(response) {
            // $(".result").removeClass("invisible");
            // $(".result").addClass("mb-3 mt-3");
            // $("#total").val("₹"+response);
            alert("TOTAL FARE (in ₹):"+response);
            var r = confirm("WANT TO CONFIRM BOOKING ??");
            if (r == true) {
                $.ajax({
                    method: 'POST',
                    url: 'insertRide.php',
                    data: { pickup: pickup, destination: destination, luggage: luggage, total_fare: response},
                    success: function(result) {
                        alert(result);
                    }
                });
              } else {
                alert("BOOKING CANCELLED...!!");
              }
        }
    });
}