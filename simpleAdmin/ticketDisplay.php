<html>
    <head>
        <link rel="stylesheet" href="assets/css/ticketStylesheet.css" type="text/css">
    </head>
    <style>
        #ticketContainer{
            width: 100%;
            min-height: 15%;
        }

        .ticketRow{
            position: relative;
            width: 99.3%;
            height: 250px;
            border: 5px solid black;
            margin-bottom: 10px;
        }

        /* TICKET NUMBER CONTAINER **********************/

        .ticketNumberContainer{
            width: 22%;
            height: 93.5%;
            position: relative;
            margin: 5px;
            text-align: center;
            vertical-align: middle;
            float: left;
            border-right: 3px solid black;

        }

        .ticketNumberContainer p{
            font-size: 150px;
            position: relative;
            bottom: 150px;
            color: #64dd17;
        }

        .ticketNumberContainer span{
            font-size: 50px;

        }


        /* TICKET INFO CONTAINER *****************/

        .ticketInfoContainer{
            display: inline-flex;
            position: relative;
            height: 93.5%;
            width: 75.3%;
            margin: 5px;
            border: 1px solid black;
        }

        .ticketInfoContainer .produtoNome{
            font-size: 100px;
            float: right;
        }


    </style>

<body>
    <div id="ticketContainer">
        <div class="ticketRow">

            <!-- TODO: DB TABLE SAVE TICKET INFO (userId,ticket#,order info) -->
            <!-- TODO: ASSIGN TICKET ORDER IN PILE AND DISPLAY IT WHEN BEING PREPARED -->

            <div class="ticketNumberContainer">
                <span># TICKET</span>
                <p>A10</p>
            </div>

            <div class="ticketInfoContainer">
                <span class="produtoNome">Tosta MISTAAAAAAAAAAAAAa</span>
            </div>
        </div>
        <div class="ticketRow"></div>
        <div class="ticketRow"></div>
        <div class="ticketRow"></div>
    </div>
</body>
</html>