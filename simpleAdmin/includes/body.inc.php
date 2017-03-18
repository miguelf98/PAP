<?php
function drawTopBar(){?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <!-- PHP ICON <svg class="icon" id="logo">
                        <use xlink:href="#sandwich"/>
                    </svg> -->
                    <img src="images/store.png">
                </a>
            </div>
                <span class="logout-spn" >
                  <div id="accountInfoContainer">
                      <img id="accountImage" src="images/user.png">
                      <div id="accountNome">João Sousa</div>
                      <div id="accountGuita">Saldo: <b>10&euro;</b></div>
                  </div>

                </span>
        </div>
    </div>
<?php
}

function drawSideBar(){ ?>
    <nav class="navbar-side" role="navigation" style="background-color: #fff;" >
        <div class="sidebar-collapse" >
            <div id="faturaContainer">
                <table class="table-fill">
                    <thead>
                    <tr>
                        <th class="text-left">Nome</th>
                        <th class="text-center">Qntd</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                    <tr>
                        <td class="text-left">Croissant</td>
                        <td class="text-center">1</td>
                        <td class="text-center">0,50&euro;</td>
                    </tr>
                    <tr>
                        <td class="text-left">Ucal</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1&euro;</td>
                    </tr>
                    <tr>
                        <td class="text-left">Tosta Mista</td>
                        <td class="text-center">1</td>
                        <td class="text-center">0,35&euro;</td>
                    </tr>
                    <tr>
                        <td class="text-left">Água</td>
                        <td class="text-center">1</td>
                        <td class="text-center">50&euro;</td>
                    </tr>
                    <tr>
                        <td class="text-left">Leite Achocolatado</td>
                        <td class="text-center">1</td>
                        <td class="text-center">0,25&euro;</td>
                    </tr>
                    <tr class="faturaFooter">
                        <td colspan="2" >5 produtos</td>
                        <td>52,60&euro;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </nav>
<?php
}


function drawProducts(){?>
    <div id="categoryContainer">
        <!-- PRODUCT ROW 1  (3 produtos por ROW)-->
        <div class="productRow" >

            <!-- PRODUTO 1 -->
            <div class="div-square">
                <a href="index.php?id=1" >
                    <svg><use xlink:href="#sandwich"></use></svg>
                    <h4>Sandes</h4>
                </a>
            </div>

            <!-- PRODUTO 2 -->
            <div class="div-square">
                <a href="index.php?id=2" >
                    <svg><use xlink:href="#can"></use></svg>
                    <h4>Bebidas Enlatadas</h4>
                </a>
                <div class="categoryBadge">Novos Produtos</div>
            </div>

            <!-- PRODUTO 3 -->
            <div class="div-square">
                <a href="index.php?id=3" >
                    <svg><use xlink:href="#food"></use></svg>
                    <h4>Croissaints</h4>
                </a>
            </div>
        </div>
    </div>
    <?php
}
?>