document.addEventListener('DOMContentLoaded', function() {
    const visitorsBtn = document.getElementById('visitors-btn');
    const keysBtn = document.getElementById('keys-btn');
    const visitorsTable = document.getElementById('visitors-table');
    const keysTable = document.getElementById('keys-table');

    visitorsBtn.addEventListener('click', function() {
        visitorsTable.style.display = 'block';
        keysTable.style.display = 'none';
        visitorsBtn.style.boxShadow = '0 1px 2px -1px rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06)';
        visitorsBtn.style.color = '#3b82f6';
        visitorsBtn.style.borderTop = 'none';
        keysBtn.style.boxShadow = 'none';
        keysBtn.style.color = 'black';
        keysBtn.style.borderTop = '';
    });

    keysBtn.addEventListener('click', function() {
        visitorsTable.style.display = 'none';
        keysTable.style.display = 'block';
        keysBtn.style.boxShadow = '0 1px 2px -1px rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06)';
        keysBtn.style.color = '#3b82f6';
        keysBtn.style.borderTop = 'none';
        visitorsBtn.style.boxShadow = 'none';
        visitorsBtn.style.color = 'black';
        visitorsBtn.style.borderTop = '';
    });

    // Initially display visitors table and hide keys table
    visitorsTable.style.display = 'block';
    keysTable.style.display = 'none';
    visitorsBtn.style.boxShadow = '0 1px 2px -1px rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06)';
    visitorsBtn.style.color = '#3b82f6';
    visitorsBtn.style.borderTop = 'none';
});


