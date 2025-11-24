document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-contato');
    if (!form) return;
    form.addEventListener('submit', function (e) {
        const nome = form.querySelector('[name="nome"]').value.trim();
        if (nome.length < 2) {
            e.preventDefault();
            alert('Informe um nome válido.');
        }
    });
});