<footer class="text-center p-4" style="background-color: var(--light-gray);">
    <div class="container">
        <p class="mb-0">© <?php echo date('Y'); ?> Fluffy Charmies. All Rights Reserved.</p>
        <a href="login.php" class="text-muted small">Login Admin</a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Fade-in saat elemen masuk viewport
  (function(){
    const els = document.querySelectorAll('.reveal');
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('visible'); }});
    }, { threshold: .2 });
    els.forEach(el=>io.observe(el));
  })();

  // Tilt ringan pada foto saat mouse bergerak
  (function(){
    const wrap = document.querySelector('.owner-tilt-wrap');
    if (!wrap) return;
    const img = wrap.querySelector('.owner-photo');
    wrap.addEventListener('mousemove', (e)=>{
      const r = wrap.getBoundingClientRect();
      const x = (e.clientX - r.left) / r.width - 0.5;
      const y = (e.clientY - r.top) / r.height - 0.5;
      img.style.transform = `rotateY(${x*10}deg) rotateX(${ -y*10 }deg)`;
    });
    wrap.addEventListener('mouseleave', ()=>{ img.style.transform = ''; });
  })();
</script>

<script>
(function () {
  const rail = document.getElementById('produkRail');
  if (!rail) return;

  const btnL = document.querySelector('.produk-nav.left');
  const btnR = document.querySelector('.produk-nav.right');

  // Geser pakai panah
  function stepSize() {
    const card = rail.querySelector('.produk-card');
    const gap = parseFloat(getComputedStyle(rail).gap) || 16;
    return (card ? card.getBoundingClientRect().width : 300) + gap;
  }
  function scrollByStep(dir) {
    rail.scrollBy({ left: dir * stepSize(), behavior: 'smooth' });
  }
  btnL?.addEventListener('click', () => scrollByStep(-1));
  btnR?.addEventListener('click', () => scrollByStep(1));

  // Sembunyikan panah saat mentok
  function updateNav() {
    const max = rail.scrollWidth - rail.clientWidth - 1;
    const atStart = rail.scrollLeft <= 0;
    const atEnd = rail.scrollLeft >= max;
    btnL.style.visibility = atStart ? 'hidden' : 'visible';
    btnR.style.visibility = atEnd ? 'hidden' : 'visible';
  }
  updateNav();
  rail.addEventListener('scroll', updateNav);
  window.addEventListener('resize', updateNav);

  // ===== Drag scroll yang tidak ganggu klik =====
  let isDown = false, isDragging = false;
  let startX = 0, startLeft = 0;
  const threshold = 6; // minimal jarak dianggap drag

  const isInteractive = (el) => el.closest('a, button, input, textarea, select, label');

  rail.addEventListener('pointerdown', (e) => {
    if (isInteractive(e.target)) return; // jangan aktif kalau klik tombol/link
    isDown = true;
    isDragging = false;
    startX = e.clientX;
    startLeft = rail.scrollLeft;
    rail.setPointerCapture(e.pointerId);
  });

  rail.addEventListener('pointermove', (e) => {
    if (!isDown) return;
    const dx = e.clientX - startX;
    if (!isDragging && Math.abs(dx) > threshold) {
      isDragging = true;
      rail.classList.add('dragging');
      rail.style.scrollBehavior = 'auto';
    }
    if (isDragging) {
      rail.scrollLeft = startLeft - dx;
    }
  });

  function endDrag() {
    if (isDown) {
      isDown = false;
      rail.classList.remove('dragging');
      rail.style.scrollBehavior = '';
    }
  }
  ['pointerup', 'pointercancel', 'mouseleave'].forEach(ev =>
    rail.addEventListener(ev, endDrag)
  );

  // Scroll horizontal pakai roda mouse
  rail.addEventListener('wheel', (e) => {
    if (Math.abs(e.deltaX) < Math.abs(e.deltaY)) return;
    e.preventDefault();
    rail.scrollLeft += e.deltaX;
  }, { passive: false });
})();
</script>

<script>
const canvas = document.getElementById('sparkleCanvas');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let particles = [];
function createParticle() {
  particles.push({
    x: Math.random() * canvas.width,
    y: canvas.height + 10,
    size: Math.random() * 4 + 2,
    speed: Math.random() * 1 + 0.5,
    color: `rgba(255, 182, 193, ${Math.random()})` // warna pink muda
  });
}

function drawParticles() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  for (let p of particles) {
    ctx.beginPath();
    ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
    ctx.fillStyle = p.color;
    ctx.fill();
    p.y -= p.speed;
    if (p.y < -10) particles.splice(particles.indexOf(p), 1);
  }
}

function animate() {
  createParticle();
  drawParticles();
  requestAnimationFrame(animate);
}

animate();
window.addEventListener('resize', () => {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});
</script>

<script>
  // Tambahkan efek perubahan navbar saat scroll
  window.addEventListener('scroll', () => {
    const nav = document.querySelector('.fc-nav');
    if (!nav) return;
    if (window.scrollY > 5) nav.classList.add('scrolled');
    else nav.classList.remove('scrolled');
  });
</script>




</body>
</html>