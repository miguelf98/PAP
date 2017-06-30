<html>
    <head>
        <link rel="stylesheet" href="assets/css/ticketStylesheet.css" type="text/css">
        <script src="../admin/assets/js/jquery-3.2.0.min.js"></script>
    </head>
    <style>
        body{
            font-family: "Roboto", helvetica, arial, sans-serif;
        }

        #ticketContainer{
            width: 100%;
            height: 100%;
            min-height: 15%;
        }


        /* TICKET NUMBER CONTAINER **********************/

        .ticketNumberContainer{
            position: relative;
            text-align: center;
            vertical-align: middle;
            height: 180px;
            font-size: 150px;
            display: flex;
        }

        .floatLeft{
            float: left;
        }

        .floatRight{
            float: right;
        }

        #titleContainer{
            font-size: 50px;
            margin-left: 25px;
            height:100px;

        }

        #title1{
            float: left;
            margin-left: 15px;

        }

        #title2{
            float: right;
            margin-right: 275px;
        }



        #prepararTicketContainer{
            width: 300px;
            margin-left: 15px;
            float: left;
            color: #dd3d50;

        }

        #entregarTicketContainer{
            float: right;
            margin-right: 250px;
            color: #64dd17;

        }

        .divider{
            position:absolute;
            left:50%;
            top:10%;
            bottom:10%;
            border-left:3px
        }

    </style>
    <script>
        function actualizaMonitor() {
            $.ajax({url: "AJAXorders.php", success: function(result){
                $("#ticketContainer").html(result);
            }});

        }


        $('document').ready(function () {
            actualizaMonitor();
            intervalo=setInterval('actualizaMonitor()',1000);

        })
        
        
    </script>
    
    

<body>
    <div id="titleContainer">
        <div id="title1">A preparar</div>
        <div id="title2">A entregar</div>
    </div>
    <div id="ticketContainer" >


    </div>
</body>
</html>