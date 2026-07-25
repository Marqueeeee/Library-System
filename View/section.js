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

    // remove highlight from nav buttons
  document.querySelectorAll('.nav-item-lms').forEach(b => b.classList.remove('active'));
  
  // add active all matched data-section
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

const collapseElementList = document.querySelectorAll(".collapse");
const collapseList = [...collapseElementList].map(
  (collapseEl) => new bootstrap.Collapse(collapseEl),
);

const bsCollapse = new bootstrap.Collapse("#myCollapse", {
  toggle: false,
});

