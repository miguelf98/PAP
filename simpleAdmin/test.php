<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<div class="sidebar-collapse">
    <div id="faturaContainer">
        <table class="table-fill">
            <thead>
            <tr>
                <th class="text-left">Nome</th>
                <th class="text-center">Qntd</th>
                <th class="text-center">Preço</th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <tr>
                <td class="text-left">namenamename</td>
                <td class="text-center">value</td>
                <td class="text-center">
                    <span style="position: absolute;">15</span>
                    <div onclick="removeProd(15)" class="deleteProd"><img src="images/delete.png" alt=""></div>
                </td>
                <td></td>
            </tr>
            <tr class="faturaFooter">
                <td colspan="2" >produtos</td>
                <td class="text-center">&euro;</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
