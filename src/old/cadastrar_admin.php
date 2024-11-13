<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/estiloIndex/estilo.css" type="text/css">
    <title>Cadastrar Administrador</title>
</head>

<body>
    <header class="cabecalho">
        <div class="menu-topo d-flex justify-content-between p-2">
            <a href="index.php">
                <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM13.92 16.13H9C8.59 16.13 8.25 15.79 8.25 15.38C8.25 14.97 8.59 14.63 9 14.63H13.92C15.2 14.63 16.25 13.59 16.25 12.3C16.25 11.01 15.21 9.97 13.92 9.97H8.85L9.11 10.23C9.4 10.53 9.4 11 9.1 11.3C8.95 11.45 8.76 11.52 8.57 11.52C8.38 11.52 8.19 11.45 8.04 11.3L6.47 9.72C6.18 9.43 6.18 8.95 6.47 8.66L8.04 7.09C8.33 6.8 8.81 6.8 9.1 7.09C9.39 7.38 9.39 7.86 9.1 8.15L8.77 8.48H13.92C16.03 8.48 17.75 10.2 17.75 12.31C17.75 14.42 16.03 16.13 13.92 16.13Z" fill="#ffffff"></path>
                    </g>
                </svg>
            </a>
        </div>
    </header>
    <div class="form-admin">
        <form method="post" class="login-form" action="#">
            <div class="header-form">
                <h2 class="titulo-login">Cadastro de Administrador</h2>
            </div>
            <hr>
            <label for="nome">Primeiro nome:</label>
            <input type="text" name="nome">

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome">

            <label for="usuario">Usuário:</label>
            <div>
                <button class="button-admin">Gerar usuário</button>
                <input type="text" name="usuario" id="usuario">
            </div>
            
            
            <label for="cargo">Cargo:</label>
            <select name="cargo" id="cargo">
                <option value="proprietario">--Escolha um cargo--</option>
                <option value="proprietario">Proprietario</option>
                <option value="desenvolvedor">Desenvolvedor</option>
                <option value="tecnico">Técnico de Suporte</option>
            </select>
            <hr>
            <label for="senha">Senha do usuário</label>
            <input type="password" name="senha">

            <label for="cSenha">Confirme a senha:</label>
            <input type="password" name="cSenha">

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>

</html>