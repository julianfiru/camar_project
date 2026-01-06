function showProjectDetail(projectId) {
    document.getElementById('projectModal').classList.add('active');
    document.body.style.overflow = 'hidden';
    switchTab('overview');
}

function closeProjectDetail() {
    document.getElementById('projectModal').classList.remove('active');
    document.body.style.overflow = 'auto';
}

document.getElementById('projectModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeProjectDetail();
    }
});