// Smooth scroll for internal anchors
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',e=>{
    const id=a.getAttribute('href'); if(id.length>1){ e.preventDefault(); document.querySelector(id)?.scrollIntoView({behavior:'smooth'}); }
  });
});


// === UX: Menú hamburguesa, skip link y back-to-top ===
(function(){
  document.addEventListener('DOMContentLoaded', function(){
    var header = document.querySelector('header');
    var nav = document.querySelector('nav');
    if(header && nav){
      // Insert toggle button if not exists
      if(!document.getElementById('menu-toggle')){
        var btn = document.createElement('button');
        btn.id = 'menu-toggle';
        btn.setAttribute('aria-label','Abrir menú');
        btn.setAttribute('aria-expanded','false');
        btn.innerHTML = '☰';
        header.insertBefore(btn, nav);
        btn.addEventListener('click', function(){
          var open = document.body.classList.toggle('nav-open');
          btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
      }
    }
    // Skip link focus to main
    var skip = document.getElementById('skip-to-content');
    var main = document.getElementById('main');
    if(skip && main){
      skip.addEventListener('click', function(e){
        setTimeout(function(){ main.setAttribute('tabindex','-1'); main.focus(); }, 50);
      });
    }
    // Back to top visibility
    var back = document.getElementById('back-to-top');
    if(back){
      window.addEventListener('scroll', function(){
        back.style.display = window.scrollY>300 ? 'block' : 'none';
      });
      back.addEventListener('click', function(){ window.scrollTo({top:0,behavior:'smooth'}); });
    }
  });
})();

// === Back-to-top: toggle class with fade-in ===
(function(){
  var back = document.getElementById('back-to-top');
  if(!back){ return; }
  var update = function(){
    if(window.scrollY > 300){ back.classList.add('show'); }
    else{ back.classList.remove('show'); }
  };
  window.addEventListener('scroll', update, {passive:true});
  update();
  back.addEventListener('click', function(){
    window.scrollTo({top:0, behavior:'smooth'});
  });
})();