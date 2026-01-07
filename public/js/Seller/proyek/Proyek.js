document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const tableRows = document.querySelectorAll('.project-row');
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            const filterValue = this.getAttribute('data-filter');
            tableRows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                let shouldShow = false;
                if (filterValue === 'all') {
                    shouldShow = true;
                } else if (filterValue === 'active' && rowStatus === '2') {
                    shouldShow = true;
                } else if (filterValue === 'pending' && rowStatus === '1') {
                    shouldShow = true;
                } else if (filterValue === 'cancelled' && rowStatus === '0') {
                    shouldShow = true;
                }
                if (shouldShow) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});