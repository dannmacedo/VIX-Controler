document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('#login_control').addEventListener('submit', function (e) {
        e.preventDefault();

        const user = document.getElementById('user').value;
        const senha = document.getElementById('senha').value;

        // Faz a requisição AJAX para o backend (login.php)
        fetch('php/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `user=${user}&senha=${senha}`,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redireciona o usuário para a página de controle
                    window.location.href = 'control_panel.html';
                } else {
                    // Exibe mensagem de erro no login
                    alert(data.message);
                }
            })
            .catch(error => console.error('Erro:', error));
    });
});
