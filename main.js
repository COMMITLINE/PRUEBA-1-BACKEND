document.addEventListener("DOMContentLoaded", function () {
    const apiBaseUrl = "http://localhost/consultoria-backend/v1"; // Base URL del backend PHP

    // Cargar datos de servicios
    fetch(`${apiBaseUrl}/services`, {
        method: "GET",
        headers: {
            "Authorization": "Bearer ciisa",
        },
    })
    .then(response => response.json())
    .then(data => {
        const serviciosContainer = document.querySelector("#servicios .row");
        serviciosContainer.innerHTML = ""; // Limpiar contenido inicial
        
        data.forEach(service => {
            serviciosContainer.innerHTML += `
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="bi bi-laptop fs-1 text-primary mb-3"></i>
                            <h5 class="card-title">${service.name}</h5>
                            <p class="card-text">${service.description}</p>
                        </div>
                    </div>
                </div>
            `;
        });
    })
    .catch(error => console.error("Error al cargar los servicios:", error));

    // Cargar datos de nosotros
    fetch(`${apiBaseUrl}/about-us`, {
        method: "GET",
        headers: {
            "Authorization": "Bearer ciisa",
        },
    })
    .then(response => response.json())
    .then(data => {
        document.querySelector("#nosotros .row").innerHTML = `
            <div class="col-lg-6">
                <h3>Misión</h3>
                <p>${data.mission}</p>
            </div>
            <div class="col-lg-6">
                <h3>Visión</h3>
                <p>${data.vision}</p>
            </div>
        `;
    })
    .catch(error => console.error("Error al cargar nosotros:", error));

    // Manejar formulario de contacto
    const contactForm = document.getElementById("contactForm");
    contactForm.addEventListener("submit", function (e) {
        e.preventDefault();
        
        const formData = new FormData(contactForm);
        const contactData = {
            name: formData.get("nombre"),
            email: formData.get("email"),
            message: formData.get("mensaje")
        };

        fetch(`${apiBaseUrl}/contact`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer ciisa"
            },
            body: JSON.stringify(contactData)
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("mensajeRespuesta").innerText = data.message;
            contactForm.reset(); // Limpiar el formulario después del envío
        })
        .catch(error => console.error("Error al enviar el formulario:", error));
    });
});
