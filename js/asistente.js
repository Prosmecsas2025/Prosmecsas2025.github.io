// --- Mostrar/Ocultar Chat ---
const bubble = document.getElementById("bot-bubble");
const chat = document.getElementById("chat-box");

bubble.addEventListener("click", () => {
  chat.classList.toggle("open");
});

// --- Respuestas del asistente ---
function sendOption(option) {
  const chatBody = document.getElementById("chat-body");

  // mensaje del usuario
  chatBody.innerHTML += `<div class="user-msg">${option}</div>`;

  let respuesta = "";

  if (option === "Servicios") {
    respuesta = "Ofrecemos mecanizado, soldadura, estructuras, mantenimiento y más. Puedes ver todo en la sección de Servicios.";
  }

  if (option === "Contacto") {
    respuesta = "Puedes contactarnos al WhatsApp: 314 569 3906 o en la sección de Contacto.";
  }

  if (option === "Ubicación") {
    respuesta = "Estamos en: Cra 48 # 44-48. Te abro el mapa.";
    window.open("https://maps.app.goo.gl/7BHLjqsLpVyaN5gru", "_blank");
  }

  if (option === "Cotización") {
    respuesta = "Perfecto, cuéntame qué pieza o servicio necesitas y te ayudo a cotizar.";
  }

  // mensaje del bot
  chatBody.innerHTML += `<div class="bot-msg">${respuesta}</div>`;

  chatBody.scrollTop = chatBody.scrollHeight;
}
