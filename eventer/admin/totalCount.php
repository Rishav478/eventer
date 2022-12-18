<?php

//-----------Count Live Events---------------//

$cDate = date('Y-m-d');
$countLiveEventsValue = 0;
$countLiveEvents = "SELECT * from event where event_regEndDate >= '$cDate'";
$resLiveEvents = mysqli_query($con,$countLiveEvents);
$countLiveEventsValue = mysqli_num_rows($resLiveEvents);

?>