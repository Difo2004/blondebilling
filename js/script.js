document.addEventListener('DOMContentLoaded', () => {
    const matriculaInput = document.getElementById('matricula');
    const nombreCliente = document.getElementById('nombreCliente');

    matriculaInput.addEventListener('blur', async () => {
        const matricula = matriculaInput.value;
        if (matricula) {
            const response = await fetch(`/controllers/clienteController.php?matricula=${matricula}`);
            const cliente = await response.json();
            if (cliente) {
                nombreCliente.textContent = `Nombre: ${cliente.nombre}`;
            } else {
                nombreCliente.textContent = 'Cliente no registrado';
            }
        }
    });
});
