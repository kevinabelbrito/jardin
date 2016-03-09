<?php
require '../templates/dominio.php';
require '../templates/admin/meta.php';
?>
<title>Sistema de Inscripción Jardin de Infancia "Felix Antonio Calderon"</title>
<?php require '../templates/plugins.php'; ?>
</head>
<body>
    <img src="../img/header.jpg" class="header">
    <header>
        <img src="../img/logo.jpg" width="120" height="120">
    </header>
    <nav class="menu">
        <ul>
            <?php if ($tipo_admin == "Administrador"): ?>
            <li><a class="administrar" href="usuarios/"><span>Usuarios</span></a></li>
            <?php endif; ?>
            <li><a class="identificarse" href="docentes/"><span>Docentes</span></a></li>
            <li><a class="aulas" href="aulas/"><span>Aulas</span></a></li>
            <li><a class="inscripcion" href="alumnos/"><span>Inscripción</span></a></li>
            <?php if ($tipo_admin == "Administrador"): ?>
            <li><a class="busqueda" href="auditoria/"><span>Auditoria del Sistema</span></a></li>
            <?php endif; ?>
            <li><a class="salir" href="../sql/usuarios/Logout.php"><span>Salir</span></a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Jardin de Infancia "Felix Antonio Calderon"</h1>
        <br><br>
        <h2>Sistema de Inscripción</h2>
        <br>
        <div class="options">
            <a href="usuarios/modificar.php?id=<?php echo $id_admin; ?>" class="write"><span>Editar mis datos</span></a>
            <a href="usuarios/cambio.php?id=<?php echo $id_admin; ?>" class="key"><span>Cambio de Contraseña</span></a>
        </div>
    </div>
    <img src="../img/footer.jpg" class="footer">
</body>
</html>