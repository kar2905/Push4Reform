<?php
 
    // make an associative array of callers we know, indexed by phone number

    // if the caller is known, then greet them by name
    // otherwise, consider them just another monkey
         
    // now greet the caller
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Gather numDigits="5" action="congress.php" method="POST">
        <Say>To speak to your congessman about immigration reform, please enter your zip code.</Say>
    </Gather>
</Response>