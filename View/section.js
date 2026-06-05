function showSection(btn) {
    clearState();
    document.querySelectorAll('.nav-item-lms').forEach(b => b.classList.remove('active'));

    btn.classList.add('active');

    document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));

    const target = document.getElementById('section-' + btn.dataset.section);
    if (target) target.classList.add('active');

}

