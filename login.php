<!DOCTYPE html>
<html lang="en">

<!-- ... (bagian HTML lainnya) -->

<body id="login">
    <div class="flex-center position-ref full-height">
        <?php
        // Ambil informasi pengguna dari session
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
        ?>

        <!-- Pengguna belum login, tampilkan formulir login -->
        <h1 class="title m-b-md">Welcome!
            <?php echo $username; ?>
        </h1>

        <ul class="links">
            <li><a href="/">Home</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>

        <!-- Formulir Login Keycloak -->
        <form id="keycloakLoginForm" action="/login" method="post">
            <button type="submit">Login with Keycloak</button>
        </form>
        <!-- Formulir Logout Keycloak -->
        <form id="keycloakLogoutForm" action="/logout" method="post">
            <button type="submit">Logout</button>
        </form>
    </div>

    <script>
        // Fungsi untuk mengarahkan ke halaman login Keycloak
        function redirectToKeycloakLogin() {
            window.location.href = 'http://localhost:8080/auth/realms/testingphp/protocol/openid-connect/auth?client_id=sphp&redirect_uri=http://localhost:8090/login&response_type=code&scope=openid';
        }

        // Menambahkan event listener ke form
        document.getElementById('keycloakLoginForm').addEventListener('submit', function (event) {
            event.preventDefault();
            redirectToKeycloakLogin();
        });

        // Fungsi untuk mengarahkan ke halaman logout Keycloak
        function redirectToLogoutKeycloak() {
            window.location.href = 'http://localhost:8080/auth/realms/testingphp/protocol/openid-connect/logout?';
        }

        // Menambahkan event listener ke form
        document.getElementById('keycloakLogoutForm').addEventListener('submit', function (event) {
            event.preventDefault();
            redirectToLogoutKeycloak();
        });
    </script>
</body>

</html>