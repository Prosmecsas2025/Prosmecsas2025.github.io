
// Simple client-side validation and fetch to PHP endpoint
document.addEventListener('DOMContentLoaded', function(){
  const form = document.getElementById('contactForm');
  if(!form) return;
  form.addEventListener('submit', async function(e){
    e.preventDefault();
    const formData = new FormData(form);
    // basic validation
    const required = ['nombre','email','mensaje'];
    for(const key of required){
      if(!formData.get(key) || formData.get(key).trim()===''){
        alert('Por favor completa el campo: '+key);
        return;
      }
    }
    // send to PHP endpoint
    try{
      const resp = await fetch('contact_send.php', {
        method: 'POST',
        body: formData
      });
      const json = await resp.json();
      if(json.success){
        document.getElementById('contactForm').reset();
        const s = document.querySelector('.success-msg');
        s.style.display = 'block';
        s.innerText = 'Mensaje enviado correctamente. Gracias por contactarnos.';
      } else {
        alert('Error al enviar: ' + (json.error || 'Error desconocido'));
      }
    } catch(err){
      alert('Error en el envío: ' + err.message);
    }
  });
});
