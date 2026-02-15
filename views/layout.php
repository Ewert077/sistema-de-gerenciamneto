<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gerenciamento</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/trabalhos/sistema-de-gerenciamento/public/assets/style.css">
</head>
<body>

<header class="topbar">

    <div class="topbar-left">
        <h2>Sistema de Gerenciamento</h2>
    </div>

    <div class="topbar-right">
        <button id="toggle-theme" class="theme-toggle" aria-label="Alternar tema">

            <!-- LUA -->
            <svg id="icon-moon" width="18" height="18" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 12.79A9 9 0 0111.21 3
                         7 7 0 1019 21
                         9 9 0 0021 12.79z"/>
            </svg>

            <!-- SOL -->
            <svg id="icon-sun" width="18" height="18" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 style="display:none;">
                <circle cx="12" cy="12" r="5"/>
                <line x1="12" y1="1" x2="12" y2="3"/>
                <line x1="12" y1="21" x2="12" y2="23"/>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                <line x1="1" y1="12" x2="3" y2="12"/>
                <line x1="21" y1="12" x2="23" y2="12"/>
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
            </svg>

        </button>
    </div>

</header>

<div class="app">

    <aside class="sidebar">
        <h2 class="logo">SG</h2>

        <nav>
            <a href="?rota=produtos">Produtos</a>
            <a href="?rota=fornecedores">Fornecedores</a>
        </nav>
    </aside>

    <main class="content">
        <?= $conteudo ?>
    </main>

</div>


</body>
</html>
<script>
const toggleBtn = document.getElementById("toggle-theme");
const iconMoon = document.getElementById("icon-moon");
const iconSun = document.getElementById("icon-sun");

toggleBtn.addEventListener("click", function() {

    document.body.classList.toggle("dark");

    if (document.body.classList.contains("dark")) {
        iconMoon.style.display = "none";
        iconSun.style.display = "block";
    } else {
        iconMoon.style.display = "block";
        iconSun.style.display = "none";
    }

});
</script>
