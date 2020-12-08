

<?php 
session_start();
require 'header.php'; 
require 'config.php';
require 'classes/location.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$location = new location();
$loc = $location->showLocation($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="taxi.js"></script>
    <script>
        function myFunction() {
            $(".result").addClass("invisible");
            $(".result").removeClass("mb-3 mt-3");
            var value = $("#cabType").val();

            
            if (value == "CedMicro") {
                $("#luggage").attr("disabled", true);
                $("#luggage").val("Luggage facility is not available for CedMicro");
            }
            else {
                $("#luggage").attr("disabled", false);
                $("#luggage").val("");
            }
        }
    </script>
    <link rel="stylesheet" href="css/styleCab.css">
</head>
<body>
    <div class="container-fluid">
        <div class="text-center pt-5 pb-2 top">
            <h1>Book a City Taxi to your destination in town</h1>
            <p class="para">Choose from a range of categories and prices</p>
        </div>
        <div class="ml-5 mr-5 pb-3 pt-3">
            <div class="col-12 col-xs-12 col-sm-4 col-md-5 col-lg-4 bg-white text-center pt-2 pb-2">
                <div>
                    <div class="font-weight-bold text-center">
                        <span class="p-1">CITY TAXI</span>
                    </div>
                    <h6 class="font-weight-bold border-top pt-1 mt-2">Your everyday travel partner</h6>
                    <p style="color: rgb(86, 88, 86);">AC Cabs for point to point travel</p>
                </div>
                    <div class="form-group">
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><small>PICK UP</small></span>
                            </div>
                            <select id="pickup" class="form-control bg-grey nosamelocation">
                                <option selected disabled>Select Pickup</option>
                                <?php foreach($loc as $key): ?>
                                <option value="<?php echo $key['name']; ?>"><?php echo $key['name']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><small>DROP</small></span>
                            </div>
                            <select id="destination" class="form-control bg-grey nosamelocation">
                                <option selected disabled>Select Drop point</option>
                                <?php foreach($loc as $key): ?>
                                <option value="<?php echo $key['name']; ?>"><?php echo $key['name']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><small>CAB TYPE</small></span>
                            </div>
                            <select id="cabType" class="form-control bg-grey" onchange="myFunction()">
                                <option selected disabled>Select CAB Type</option>
                                <option value="CedMicro">CedMicro</option>
                                <option value="CedMini">CedMini</option>
                                <option value="CedRoyal">CedRoyal</option>
                                <option value="CedSUV">CedSUV</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><small>Luggage</small></span>
                        </div>
                        <input type="number" id="luggage" class="form-control bg-grey" placeholder="Enter Weight in KG">
                    </div>
                    <div class="input-group input-group-sm result invisible">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><small>Total Fare</small></span>
                        </div>
                        <input type="input" id="total" class="form-control bg-grey" placeholder="(In Rs.)" disabled>
                    </div>
                    <button id="submit" style="background-color: rgb(220, 236, 80); width: 100%;" class="btn" onclick="myFunction2()"><b>Calculate Fare</b></button>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>
</html>