<?php


// Demand a GET parameter
if ( ! isset($_GET['user']) || strlen($_GET['user']) < 1  ) {
    die('Name parameter missing');
} else {


    // Update Here //
    $mertgursoyPass = "mert.gursoy1234";
    $testuserPass = "test.user1234";


    $checkUser = (string)$_GET['user'];



    // Update Here //
    // User = Reporter //
    if ( $checkUser == $mertgursoyPass ) {
        echo "<script>console.log('User: Mert');</script>";
        $reporter = "ThisWillBeJira(jql)UserId";
    } else if ( $checkUser == $testuserPass ) {
      echo "<script>console.log('User: testUser');</script>";
        $reporter = "ThisWillBeJira(jql)UserId";
    } else {
      die('Name parameter missing');
    }




    if ( isset($_POST["submitValue"]) ) {

      // refresher //
      header("Refresh: 500");


      // Update Here //
      // Jira Token Creator Account Creds //
      $JRAPass = "YourJiraApiToken";

      // Update Here //
      // curl Cookie (You can get it from postman easily if you need - curl Php) //
      $curlCookie = "(You can get it from postman > code easily if you need - curl Php)";

      // Update Here //
      // Your Jira Domain Name (.....atlassian.net) //
      $YourJiraDomain = "YourJiraDomaninName"

      // Update Here //
      // Your Jira Project Key //
      $projectKey = "TEST";

      // Update Here //
      // Default Assignee (The Task will be assigned to this user. It should be jira user id. You can get it from advanced search) //
      $defaultAssignee = "1234567890";






      // Summary //
      $summary = $_POST["summary"];

      // Description //
      $description = $_POST["description"];

      // Label & Provider //
      if(isset($_POST['providers'])) {
          $providers = $_POST['providers'];

      } else {
          $providers = "";
      }
      // Label & Country //
      if(isset($_POST['country'])) {
          $country = $_POST['country'];
          echo "<script> console.log('country Label: $country ')</script>";


      } else {
          $country = "";
          echo "<script> console.log('country Label Boş: $country ')</script>";

      }
      // Label & Currency //
      if(isset($_POST['currency'])) {
          $currency = $_POST['currency'];

          echo "<script> console.log('Currency Label: $currency ')</script>";

      } else {
          $currency = "";
          echo "<script> console.log('Currency Label Boş: $currency ')</script>";
      }
      // Label & Language //
      if(isset($_POST['language'])) {
          $language = $_POST['language'];

          echo "<script> console.log('Language Label: $language ')</script>";

      } else {
          $language = "";
          echo "<script> console.log('Language Label Boş: $language ')</script>";
      }
      // Label & Salesperson //
      if(isset($_POST['salesperson'])) {
          $salesperson = $_POST['salesperson'];

      } else {
          $salesperson = "";
      }

      // SLA Obligations //
      $slaObligations = $_POST['slaObligations'];
      // URLs & Site Credentials //
      $urlCreds = $_POST['urlCreds'];
      // SLA Obligations //
      $ipAddress = $_POST['ipAddress'];

      // Due Date // // "2021-05-22"; //
      $dueDate = $_POST["dueDate"];


      // Update Here //
      // Priority //
      $priority = (string) $_POST["priority"];

      // Integration Type //
      $integrationType = (string) $_POST["integrationType"];
      $integrationTypeQuoted = '"' . $integrationType . '"'  ;

      // Client Type //
      if(isset($_POST['clientType'])) {
          $clientType = $_POST['clientType'];
          $quotedClientType = ' "' . implode('","', $clientType) . '" ';
          $quotedClientTypeString = (string) $quotedClientType;
          echo "<script> console.log('clientType1234asdas: $quotedClientTypeString ')</script>";
      } else {
          $quotedClientTypeString = "";
          echo "<script> console.log('client Type Yok.')</script>";
      }

      // Issue Type //
      $issueType = $_POST["issueType"];

      if ($issueType === "Task" || $issueType === "Bug" )   {


      // Update Here with your credentials //
          // CURL POST //

          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://$YourJiraDomain.atlassian.net/rest/api/3/issue/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\n
              \"fields\": {\n
                \"project\": {\n
                  \"key\": \"$projectKey\"\n
                  },\n
                \"summary\": \"$summary\",\n
                \"description\": {\n
                  \"type\": \"doc\",\n
                  \"version\": 1,\n
                  \"content\": [\n
                  {\n
                    \"type\": \"paragraph\",\n
                    \"content\": [\n                        {\n
                      \"type\": \"text\",\n
                      \"text\": \"$description\"\n
                      }\n                    ]\n
                    }\n            ]\n
                  },\n
                  \"customfield_YourFieldId\": {\n
                    \"type\": \"doc\",\n
                    \"version\": 1,\n
                    \"content\": [\n                {\n
                      \"type\": \"paragraph\",\n
                      \"content\": [\n
                      {\n
                        \"type\": \"text\",\n
                        \"text\": \"$slaObligations\"\n
                      }\n                    ]\n
                    }\n            ]\n
                  },\n
                  \"customfield_YourFieldId\": {\n
                    \"type\": \"doc\",\n
                    \"version\": 1,\n
                    \"content\": [\n                {\n
                      \"type\": \"paragraph\",\n
                      \"content\": [\n
                      {\n
                        \"type\": \"text\",\n
                        \"text\": \"$urlCreds\"\n
                      }\n                    ]\n
                    }\n            ]\n
                  },\n
                  \"customfield_YourFieldId\": {\n
                    \"type\": \"doc\",\n
                    \"version\": 1,\n
                    \"content\": [\n                {\n
                      \"type\": \"paragraph\",\n
                      \"content\": [\n
                      {\n
                        \"type\": \"text\",\n
                        \"text\": \"$ipAddress\"\n
                      }\n                    ]\n
                    }\n            ]\n
                  },\n
                  \"issuetype\": {\n
                    \"name\": \"$issueType\"\n
                  },\n
                  \"labels\"  : [$providers],\n
                  \"customfield_YourFieldId\"  : [$providers],\n\n
                  \"customfield_YourFieldId\"  : [$country],\n\n
                  \"customfield_YourFieldId\"  : [$currency],\n\n
                  \"customfield_YourFieldId\"  : [$language],\n\n
                  \"customfield_YourFieldId\"  : [$salesperson],\n\n

                  \"customfield_YourFieldId\"  : [$integrationTypeQuoted],\n\n

                  \"customfield_YourFieldId\" : [$quotedClientTypeString],\n




                \t\"reporter\":{ \"accountId\":\"$reporter\"},\n



                \t\"duedate\" : \"$dueDate\",\n
                \t\"assignee\":{ \"accountId\": \"$defaultAssignee\"},\n
                \t\"priority\": { \"name\": \"$priority\" }\n\n        \n    }\n

                }",
          CURLOPT_HTTPHEADER => array(
              "Authorization: Basic $JRAPass",
              "Content-Type: application/json",
              "Cookie: atlassian.xsrf.token=$curlCookie"
            ),
          )); // Update //


          $response = curl_exec($curl);

          curl_close($curl);




          if ($response) {

            $json = json_decode($response, true);

            // echo "Response exists. Key:" . $json['key'];
            $jsonKey = $json['key'];

                // If a task has just been created //
                if ($jsonKey) {


// Update //
                  echo "<div style='min-height: auto;' class='container-contact100'><p style='font-size: 20px;'>Created Issue:</p><br><p style='margin-left: 2px; font-size: 20px;' ><a style='font-size: 20px;' target='_blank' rel='noopener noreferrer' href='https://$YourJiraDomain.atlassian.net/browse/$jsonKey'>https://$YourJiraDomain.atlassian.net/browse/$jsonKey</a><p></div>";



                // If a task does not exist //
                } else {

                  $strResponse = (string) $response;
                  echo "<script> alert  ('Issue Key Does Not Exist Error. Please inform tech team. $strResponse ')</script>";

                }


          } else {
            echo "<script> console.log  ('Response Does Not Exist Error. Please inform tech team.  ')</script>";

          }


} else if ($issueType === "Sub-task" )   {

  // Parent Issue (YourParentTaskKey) //
  $parentTaskId =   $_POST["parentTaskId"];
  $parentTaskIdStr = (string) $parentTaskId;



  // Update Here Below Especially The Creds and customField Ids wiht yours //
  // Curl Post //

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://$YourJiraDomain.atlassian.net/rest/api/3/issue/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\n
      \"fields\": {\n
        \"project\": {\n
          \"key\": \"$projectKey\"\n
          },\n
        \"summary\": \"$summary\",\n
        \"description\": {\n
          \"type\": \"doc\",\n
          \"version\": 1,\n
          \"content\": [\n
          {\n
            \"type\": \"paragraph\",\n
            \"content\": [\n                        {\n
              \"type\": \"text\",\n
              \"text\": \"$description\"\n
              }\n                    ]\n
            }\n            ]\n
          },\n
          \"customfield_YourFieldId\": {\n
            \"type\": \"doc\",\n
            \"version\": 1,\n
            \"content\": [\n                {\n
              \"type\": \"paragraph\",\n
              \"content\": [\n
              {\n
                \"type\": \"text\",\n
                \"text\": \"$slaObligations\"\n
              }\n                    ]\n
            }\n            ]\n
          },\n
          \"customfield_YourFieldId\": {\n
            \"type\": \"doc\",\n
            \"version\": 1,\n
            \"content\": [\n                {\n
              \"type\": \"paragraph\",\n
              \"content\": [\n
              {\n
                \"type\": \"text\",\n
                \"text\": \"$urlCreds\"\n
              }\n                    ]\n
            }\n            ]\n
          },\n
          \"customfield_YourFieldId\": {\n
            \"type\": \"doc\",\n
            \"version\": 1,\n
            \"content\": [\n                {\n
              \"type\": \"paragraph\",\n
              \"content\": [\n
              {\n
                \"type\": \"text\",\n
                \"text\": \"$ipAddress\"\n
              }\n                    ]\n
            }\n            ]\n
          },\n

          \"parent\": {\n
            \"key\": \"$projectKey-$parentTaskIdStr\"\n
          },\n
          \"issuetype\": {\n
            \"id\": \"Your_Jira Sub Task Issue Id (You can get it from Postman Jira Task Get Request Response)\"\n
          },\n
          \"labels\"  : [$providers],\n
          \"customfield_YourFieldId\"  : [$providers],\n\n
          \"customfield_YourFieldId\"  : [$country],\n\n
          \"customfield_YourFieldId\"  : [$currency],\n\n
          \"customfield_YourFieldId\"  : [$language],\n\n
          \"customfield_YourFieldId\"  : [$salesperson],\n\n


          \"customfield_YourFieldId\"  : [$integrationTypeQuoted],\n\n
          \"customfield_YourFieldId\" : [$quotedClientTypeString],\n



        \t\"reporter\":{ \"accountId\":\"$reporter\"},\n


        \t\"duedate\" : \"$dueDate\",\n
        \t\"assignee\":{ \"accountId\":\"$defaultAssignee\"},\n
        \t\"priority\": { \"name\": \"$priority\" }\n\n        \n    }\n

        }",
  CURLOPT_HTTPHEADER => array(
      "Authorization: Basic $JRAPass",
      "Content-Type: application/json",
      "Cookie: atlassian.xsrf.token=$curlCookie"
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);



          if ($response) {

            $json = json_decode($response, true);
            // echo "Response exists. Key:" . $json['key'];
            $jsonKey = $json['key'];

                // Task exists //
                if ($jsonKey) {


                  // Update Here //
                  echo "<div style='min-height: auto;' class='container-contact100'><p style='font-size: 20px;'>Created Issue:</p><br><p style='margin-left: 2px; font-size: 20px;' ><a style='font-size: 20px;' target='_blank' rel='noopener noreferrer' href='https://$YourJiraDomain.atlassian.net/browse/$jsonKey'>https://$YourJiraDomain.atlassian.net/browse/$jsonKey</a><p></div>";

                // Task does not exists //
                } else {

                  $strResponse = (string) $response;
                  echo "<script> alert  ('Issue Key Does Not Exist Error. Please inform tech team. $strResponse ')</script>";

                }

          } else {
            echo "<script> console.log  ('Response Does Not Exist Error. Please inform tech team.  ')</script>";

          }


        } else {
          echo "<script> console.log ('Issue Type Error. Please inform tech team.  ')</script>";
        }


    } else {
      echo "<script> console.log ('Form Does Not Exist Error. Please inform tech team.  ')</script>";
    }

}

// If the user requested logout go back to login.php
if ( isset($_POST['logout']) ) {
  header("Location: login.php");
  return;
}

?>





<!DOCTYPE html>
<html>
<head>

  <!-- // Update // -->
  <title> Form NGB </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<author>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
    if ((evt.keyCode == 13) && (node.type=="number"))  {return false;}
      if ((evt.keyCode == 13) && (node.type=="password"))  {return false;}
        if ((evt.keyCode == 13) && (node.type=="date"))  {return false;}
          if ((evt.keyCode == 13) && (node.type=="radio"))  {return false;}
}

document.onkeypress = stopRKey;

</script>

<!--Date Picker-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>


// Date Picker Function
$( function() {
    $( "#theDueDateIdee" ).datepicker( {  dateFormat: "yy-mm-dd"  });
} );
</script>
</head>


<body>

<form method="post" enctype="multipart/form-data">

  <div class="container-contact100">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form">

          <!-- // Update // -->
				<span class="contact100-form-title">
				CREATE ISSUE
				</span>

        <!--IssueTyoe-->
				<div class="wrap-input100 validate-input" style="font-family: Ubuntu-Bold; text-align: center;height: 82px;background: none;display: inline-table;" data-validate="Please enter a priority">

          <div  class="wrap-input100 validate-input" data-validate="Please select an issue type" style="text-align: center;padding-top: 15px;margin-left: 0px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="theTaskId" style="color: #bdbdd3;">Task</label>
            <input style="height: 25px;top: 6px;" id="theTaskId" class="input100" type="radio" name="issueType" value="Task" checked>
  					<span class="focus-input100"></span>
			    </div>

          <div class="wrap-input100 validate-input" data-validate="Please select an issue type" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="theSubTaskId" style="color: #bdbdd3;">Sub Task</label>
            <input style="height: 25px;top: 6px;" id="theSubTaskId" class="input100" type="radio" name="issueType" value="Sub-task">
  					<span class="focus-input100"></span>
			    </div>
			</div>

        <!--Summary-->
				<div class="wrap-input100 validate-input" data-validate="Please enter a Summary">
					<input id="theSummaryIdee" class="input100" type="text" name="summary" placeholder="Summary">
					<span class="focus-input100"></span>
				</div>


        <!--Parent Task-->
				<div id="theParentTaskIdContainer" style="display:none;"class="wrap-input100 validate-input" data-validate = "Please enter a Parent Task">
          <input  id="theParentTaskIdee" class="input100"  type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" name="parentTaskId" placeholder="Parent Issue Task ID (number only)">
					<span class="focus-input100"></span>
				</div>

        <!--Description-->
				<div class="wrap-input100 validate-input" data-validate = "Please enter a description">
					<textarea  id="theDescriptionIdee" class="input100" name="description" placeholder="Description"></textarea>
					<span class="focus-input100"></span>
				</div>

        <!-- Client Type-->
        <div class="wrap-input100 validate-input" style="font-family: Ubuntu-Bold; text-align: center;height: 82px;background: none;display: inline-table;" data-validate="Please enter a clientType">

          <div class="wrap-input100 validate-input" data-validate="Please enter a clientType" style="text-align: center;padding-top: 15px;margin-left: 0px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="clientType" style="color: #bdbdd3;"> Default </label>
            <input style="height: 18px;top: 0px;"  id="clientType" class="client-type input100" type="checkbox" name="clientType[]" placeholder="clientType" value="default">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a clientType" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="clientType" style="color: #bdbdd3;"> Private </label>
            <input style="height: 18px;top: 0px;" id="clientType" class="client-type input100" type="checkbox" name="clientType[]" placeholder="clientType" value="private">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a clientType" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="clientType" style="color: #bdbdd3;"> Outsource </label>
            <input style="height: 18px;top: 0px;" id="clientType" class="client-type input100" type="checkbox" name="clientType[]" placeholder="clientType" value="outsource">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a clientType" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="clientType" style="color: #bdbdd3;"> Affiliate </label>
            <input style="height: 18px;top: 0px;" id="clientType" class="client-type input100" type="checkbox" name="clientType[]" placeholder="clientType" value="affiliate">
            <span class="focus-input100"></span>
          </div>

      </div>



        <!--S.L.A / Obligations-->
				<div class="wrap-input100 validate-input" data-validate="Please enter a S.L.A / Obligations  ">
					<input   id="theSlaObligationsIdee"   class="input100" type="text" name="slaObligations" placeholder="Client Name">
					<span class="focus-input100"></span>
				</div>

        <!--URL Creds-->
				<div class="wrap-input100 validate-input" data-validate="Please enter URLs & Site Credentails  ">
					<input   id="theUrlCredsIdee"   class="input100" type="text" name="urlCreds" placeholder="Dealer Name">
					<span class="focus-input100"></span>
				</div>



      <!--Integration Type-->
      <div class="wrap-input100 validate-input" style="font-family: Ubuntu-Bold; text-align: center;height: 82px;background: none;display: inline-table;" data-validate="Please select an integration type">

        <div class="wrap-input100 validate-input" data-validate="Please enter an integration type" style="text-align: center;padding-top: 15px;margin-left: 0px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
          <label for="integrationType" style="color: #bdbdd3;">Standard</label>
          <input style="height: 25px;top: 6px;" id="integrationType" class="input100" type="radio" name="integrationType" placeholder="integration type" value="default-integration" checked>
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Please enter an integration type" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
          <label for="integrationType" style="color: #bdbdd3;"> Special </label>
          <input style="height: 25px;top: 6px;" id="integrationType" class="input100" type="radio" name="integrationType" placeholder="integration type" value="custom-integration">
          <span class="focus-input100"></span>
        </div>

    </div>


        <!--IP Address-->
				<div class="wrap-input100 validate-input" data-validate="Please enter an IP Address  ">
					<input   id="theIpAddressIdee"   class="input100" type="text" name="ipAddress" placeholder="Quantity">
					<span class="focus-input100"></span>
				</div>

        <!--Date Picker-->
				<div class="wrap-input100 validate-input" data-validate="Please enter a due date">
					<input   id="theDueDateIdee"   class="input100" type="text" name="dueDate" size="30" placeholder="Completion Date" readonly>
					<span class="focus-input100"></span>
				</div>





        <!--Priority-->
				<div class="wrap-input100 validate-input" style="font-family: Ubuntu-Bold; text-align: center;height: 82px;background: none;display: inline-table;" data-validate="Please enter a priority">

          <div class="wrap-input100 validate-input" data-validate="Please enter a Prioirty" style="text-align: center;padding-top: 15px;margin-left: 0px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Low</label>
            <input style="height: 25px;top: 6px;" id="priority" class="input100" type="radio" name="priority" placeholder="priority" value="Low" checked>
  					<span class="focus-input100"></span>
			    </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a Priority" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Moderate</label>
            <input style="height: 25px;top: 6px;" id="moderate" class="input100" type="radio" name="priority" placeholder="priority" value="Moderate" checked>
  					<span class="focus-input100"></span>
			    </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a Priority" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Important</label>
            <input style="height: 25px;top: 6px;" id="moderate" class="input100" type="radio" name="priority" placeholder="priority" value="Important" checked>
  					<span class="focus-input100"></span>
			    </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a Priority" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Critical</label>
            <input style="height: 25px;top: 6px;" id="moderate" class="input100" type="radio" name="priority" placeholder="priority" value="Critical" checked>
  					<span class="focus-input100"></span>
			    </div>

			</div>







      <!--Provider-->
			<div class="wrap-input100 validate-input" data-validate="Please enter a Provider">

        <div  class="wrapper">
          <input class="input100"  type="text" id="hashtags" autocomplete="off" placeholder="Manufacturer">
          <div class="tag-container">
          </div>
          <input   id="theProvidersInputIdee"   style="display:none;" type="text" class="tag-input" value='' name="providers">
        </div>


        <div id="addTagButton" class="contact100-form-btn">
					<span>
						<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
						Add Manufacturer
					</span>
				</div>

    		<span class="focus-input100"></span>

			</div>




      <!--Country-->
			<div class="wrap-input100 validate-input" data-validate="Please enter a Country">

        <div  class="wrapper-country">
          <input class="input100"  type="text" id="hashtagsCountry" autocomplete="off" placeholder="State">
          <div class="tag-container-country">
          </div>
          <input   id="theCountryInputIdee"   style="display:none;" type="text" class="tag-input-country" value='' name="country">
        </div>


        <div id="addTagButtonCountry" class="contact100-form-btn">
					<span>
						<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
						Add State
					</span>
				</div>

    		<span class="focus-input100"></span>

			</div>


      <!--Currency-->
			<div class="wrap-input100 validate-input" data-validate="Please enter a Currency">

        <div  class="wrapper-currency">
          <input class="input100"  type="text" id="hashtagsCurrency" autocomplete="off" placeholder="Currency">
          <div class="tag-container-Currency">
          </div>
          <input   id="theCurrencyInputIdee"   style="display:none;" type="text" class="tag-input-Currency" value='' name="currency">
        </div>


        <div id="addTagButtonCurrency" class="contact100-form-btn">
					<span>
						<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
						Add Currency
					</span>
				</div>

    		<span class="focus-input100"></span>

			</div>


      <!--Language-->
			<div class="wrap-input100 validate-input" data-validate="Please enter a Language">

        <div  class="wrapper-language">
          <input class="input100"  type="text" id="hashtagsLanguage" autocomplete="off" placeholder="Language">
          <div class="tag-container-Language">
          </div>
          <input   id="theLanguageInputIdee"   style="display:none;" type="text" class="tag-input-Language" value='' name="language">
        </div>


        <div id="addTagButtonLanguage" class="contact100-form-btn">
					<span>
						<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
						Add Language
					</span>
				</div>

    		<span class="focus-input100"></span>

			</div>


      <!--Salesperson-->
			<div class="wrap-input100 validate-input" data-validate="Please enter a Salesperson">

        <div  class="wrapper-salesperson">
          <input class="input100"  type="text" id="hashtagsSalesperson" autocomplete="off" placeholder="Responsible">
          <div class="tag-container-Salesperson">
          </div>
          <input   id="theSalespersonInputIdee"   style="display:none;" type="text" class="tag-input-Salesperson" value='' name="salesperson">
        </div>


        <div id="addTagButtonSalesperson" class="contact100-form-btn">
					<span>
						<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
						Add Responsible
					</span>
				</div>

    		<span class="focus-input100"></span>

			</div>





				<div class="container-contact100-form-btn">
					<button type="submit" id="theCreateButton" name="submitValue" value="Submit" class="contact100-form-btn">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Create
						</span>
					</button>
          <button type="submit" id="thelogoutbuttonz" name="logout" value="Logout" class="contact100-form-btn">
            <span>
              <i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
              Log out
            </span>
          </button>
				</div>
			</form>
		</div>
	</div>
</form>



<br>

<!--
<pre>
  $_POST:
<?php
    print_r($_POST)


  ?>
</pre>
-->


<!--===============================================================================================-->
<!--===============================================================================================-->
<!--Label Provider Tag Input-->
<script src="js/tagInput.js"></script>
<!--Country Input-->
<script src="js/tagInputCountry.js"></script>
<!--Currency Input-->
<script src="js/tagInputCurrency.js"></script>-->
<!--Language Input-->
<script src="js/tagInputLanguage.js"></script>
<!--Salesperson Input-->
<script src="js/tagInputSalesperson.js"></script>

<link rel="stylesheet" type="text/css" href="css/tagInput.css">


<script>

// Validation MouseOver //
$("#theCreateButton").mouseover(function(){

  var theIssueTypeValeee = $('input[name=issueType]:checked').val();
  var theSummaryIdeeVall = $("#theSummaryIdee").val();
  var theParentTaskIdeeVall = $("#theParentTaskIdee").val();
  var theDescriptionIdeeVall = $("#theDescriptionIdee").val();
  var theClientTypeIdeeVall = $(".client-type").is(":checked")

  var theSlaObligationsIdeeVall = $("#theSlaObligationsIdee").val();
  var theUrlCredsIdeeIdeeVall = $("#theUrlCredsIdee").val();
  var theIpAddressIdeeIdeeVall = $("#theIpAddressIdee").val();


  var theDueDateIdeeVall = $("#theDueDateIdee").val();
  var theProvidersInputIdeeVall = $("#theProvidersInputIdee").val();
  var theCountryInputIdeeVall = $("#theCountryInputIdee").val();
  var theCurrencyInputIdeeVall = $("#theCurrencyInputIdee").val();
  var theLanguageInputIdeeVall = $("#theLanguageInputIdee").val();
  var theSalespersonInputIdeeVall = $("#theSalespersonInputIdee").val();

  if (theIssueTypeValeee == 'Task'  || theIssueTypeValeee == 'Bug') {

    if ( !theCountryInputIdeeVall ||  !theCurrencyInputIdeeVall || !theLanguageInputIdeeVall || !theSalespersonInputIdeeVall ||      !theSummaryIdeeVall  || !theDescriptionIdeeVall || !theClientTypeIdeeVall  || !theSlaObligationsIdeeVall || !theUrlCredsIdeeIdeeVall || !theIpAddressIdeeIdeeVall || !theDueDateIdeeVall || !theProvidersInputIdeeVall) {
       alert("Please fill all fields!");
     } else {
       console.log("Clickable");
     }

  } else if (theIssueTypeValeee == 'Sub-task') {

     if (  !theCountryInputIdeeVall ||  !theCurrencyInputIdeeVall || !theLanguageInputIdeeVall || !theSalespersonInputIdeeVall ||    !theSummaryIdeeVall  || !theDescriptionIdeeVall || !theClientTypeIdeeVall  || !theParentTaskIdeeVall  || !theSlaObligationsIdeeVall || !theUrlCredsIdeeIdeeVall || !theIpAddressIdeeIdeeVall || !theDueDateIdeeVall || !theProvidersInputIdeeVall) {
       alert("Please fill all fields!");
     } else {
       console.log("Clickable");
     }

  } else {

    alert("Issu");

  }


});


/* Issue Type Event Lİstener */
$('input[type=radio][name=issueType]').change(function() {
    if (this.value == 'Task') {
        console.log("Task");
        $("#theParentTaskIdContainer").css("display", "none");

    }
    else if (this.value == 'Bug') {
        console.log("Bug");
        $("#theParentTaskIdContainer").css("display", "none");

    } else if (this.value == 'Sub-task') {
        console.log("Sub-task");
        $("#theParentTaskIdContainer").css("display", "block");

    } else {
      alert("alert issue type error");
    }
});

 </script>



</body>
</html>
