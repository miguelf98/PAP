<?php include_once "../admin/includes/body.inc.php";?>

<style>
    button{
        height: 100px;
        width: 100px;
        margin: 50px;

    }
</style>

<body>
    <div style="border: 1px solid black; height: 100%; width: 50%;">
        <div style="margin-bottom: 10px; margin-left: 10px;"><span style="font-size: 28px;">Mock ticket</span></div><br>
        <span style="border:1px solid red; height: 50px;"><?php echo generateTicketNumber(); ?></span>
        <form action="formatTicket.php" method="post">
            <input name="tosta" value="1" type="checkbox">tosta<br>
            <input name="ucal" value="2" type="checkbox">ucal<br>
            <input name="lean" value="3" type="checkbox">lean<br>
            <input name="croissant" value="4" type="checkbox">croissant<br>
            <input type="submit" value="submeter ticket">
            <input type="hidden" value="">
        </form>


<div style="border: 5px solid orange"><pre>
<?php
echo getTicketNo();
?>
        </pre>
</div>



    </div>
</body>