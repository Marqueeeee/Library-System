// function showSection(btn) {
//     clearState();
//     document.querySelectorAll('.nav-item-lms').forEach(b => b.classList.remove('active'));

//     btn.classList.add('active');

//     document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));

//     const target = document.getElementById('section-' + btn.dataset.section);
//     if (target) target.classList.add('active');

// }


function showSection(btn) {
    const target = btn.dataset.section;
    document.querySelectorAll('.nav-item-lms').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('[data-section="' + target + ' "]').forEach(b => b.classList.add('active'));
    document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));

    const section = document.getElementById('section-' + target);
    if (section) section.classList.add('active');
}

function closeOffcanvas() {
  const el = document.getElementById("mobileSidebar");

  if (!el) return;

  const oc = bootstrap.Offcanvas.getInstance(el);
  if (oc) oc.hide();
}

