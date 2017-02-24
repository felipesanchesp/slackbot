$user_agent = "IsitupForSlack/1.0 (https://github.com/felipesanchesp/slackbot; live.sanches@gmail.com)";

$command = $_POST['isitup'];

$domain = $_POST['sanches-team.slack.com'];

$token = $_POST['65CJIZCDFfG5xraRNzI1Pit5'];

#
# replace this token with the token from your slash command configuration page
#

if($token != '65CJIZCDFfG5xraRNzI1Pit5'){ 
    $msg = "The token for the slash command doesn't match. Check your script.";
    die($msg);
    echo $msg;
}

$url_to_check = "https://isitup.org/".$domain.".json";

curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$ch_response = curl_exec($ch);

curl_close($ch);


$response_array = json_decode($ch_response, TRUE);

$response_array['domain']
$response_array['status_code']

if($ch_response === FALSE){

  # isitup.org could not be reached 
  $reply = "Ironically, isitup could not be reached.";

}else{

    if ($response_array['status_code'] == 1){

        $reply = ":thumbsup: I am happy to report that *<http://".$response_array["domain"]."|".$response_array["domain"].">* is *up*!";

    }else if ($response_array['status_code'] == 2){

        $reply = ":disappointed: I am sorry to report that *<http://".$response_array["domain"]."|".$response_array["domain"].">* is *down*!";

    }else if($response_array['status_code'] == 3){

        $reply  = ":interrobang: *".$domain."* does not appear to be a valid domain. ";
        $reply .= "Please enter both the domain name AND the suffix (ex: *amazon.com* or *whitehouse.gov*).";

    }

}

#
#Here's some text with *a bold statement*.
#
#One of the largest online retailers is <http://amazon.com>.
#
#<http://domain.com/to/http://google.com.br/|GOOGLE>
#
#<http://".$response_array["domain"]."|".$response_array["domain"].">
#

":thumbsup: I am happy to report that *<".$response_array["domain"].">* is *up*!"

":disappointed: I am sorry to report that *<".$response_array["domain"].">* is *down*!"

 ":interrobang: *".$domain."* does not appear to be a valid domain. Please enter both the domain name AND the suffix (example: *amazon.com* or *whitehouse.gov*)."


echo $reply;


