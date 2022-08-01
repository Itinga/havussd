<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to Bonga Nasi \n";
    $response .= "1. My Account \n";
    $response .= "2. Subscriptions \n";
    $response .= "3. Voice Option \n";
    $response .= "4. Opt out \n";
    $response .= "5. FAQs\n";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Choose account information you want to view \n";
    $response .= "1. My Phone Number \n";
    $response .= "2. View Alternative Numbers \n";
  	$response .= "# Back";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "CON Subscriptions \n ";
    $response .= "1. Register Alternative Numbers \n";
    $response .= "2. Unsubscribe Alternative Numbers \n";
    $response .= "3. View Alternative Numbers \n";
    $response .= "#. Back \n";

} else if($text == "3") { 
    // This is a second level response where the user selected 1 in the first instance
    $response ="CON Voice Options \n";
    $response .= "1. Enroll Voice option \n";
    $response .= "2. FAQS \n";
    $response .= "#. Back \n";

} else if($text == "4")
{
    $response = "CON Opt out \n";
    $response .= "1. Opt out \n";
    $response .= "2. Cancel \n";
} else if($text == "1*1") {
    $response = "END Your phone number is $phoneNumber";
} 

else if($text == "1*2") {
    $response = "END Your Alternative Numbers are \n 1.$phoneNumber\n";
} 
else if($text == "2*1") {
    $response = "CON Enter your Alternative Number \n";
} 
else if($text =="2*2"){
    $response = "CON Choose Numbers to Unsubscribe \n";
    $response .= "1. $phoneNumber \n";
}
else if($text =="2*3"){
    $response ="END Your Alternative Numbers are $phoneNumber \n";
}
else if($text == "3*1"){
    $response ="CON Kindly choose which voice Option to enroll with\n";
    $response .= "1. Professional Voice(Bonga Nasi Actors) \n";
    $response .= "2. Self Enrollment \n";
}
else if($text =="5"){
    $response =="END Our Faqs Can be found in our official website  \n";
}
else if($text =="2*1*1"){
    $response ="CON Add $phoneNumber as your alternative number \n";
    $response .= "1. Yes \n";
    $response .= "2. No \n";
}
else if($text =="2*1*1*1"){
    $response ="CON Successifully added Thank you \n";
    $response .= "#. Main Menu \n";
}
else if($text =="2*2*2"){
    $response ="END You have Successifully Unsubscribed $phoneNumber From Bonga nasi \n";
}
else if($text=="3*1*1"){
    $response ="END Thank you for choosing Professional Voice Over,\n an sms with step by step instructions has been sent to $phoneNumber \n";
}
else if($text=="3*1*2"){
    $response ="END Thank you for choosing Self Enrollment Voice Over,\n an sms with step by step instructions has been sent to $phoneNumber \n";
}
else if($text=="4*1"){
    $response ="CON Are you sure you want to Opt out of Bonga Nasi \n";
    $response .= "1. Yes \n";
    $response .= "2. No \n";
}
else if ($text =="4*1*1"){
    $response="CON You have Successifully Opted out of Bonga Nasi \n";
    $response .= "#. Main Menu \n";

}
else if($text =="4*1*2"){
    $response ="END You have Cancelled Opting out of Bonga Nasi \n";
}
else if($text == "#"){
    $response =menu();
    
}
else {
    $response = "END Invalid input \n";
}
function menu()

{
    $response ="CON Main Menu \n";
    $response .= "1. My Account \n";
    $response .= "2. Subscriptions \n";
    $response .= "3. Voice Option \n";
    $response .= "4. Opt out \n";
    return $response;
}
// Echo the response back to the API
header('Content-type: text/plain');
echo $response;

?>
