document.addEventListener('DOMContentLoaded', function() {
    const visitorsBtn = document.getElementById('visitors-btn');
    const keysBtn = document.getElementById('keys-btn');
    const visitorsTable = document.getElementById('visitors-table');
    const keysTable = document.getElementById('keys-table');

    visitorsBtn.addEventListener('click', function() {
        visitorsTable.style.display = 'block';
        keysTable.style.display = 'none';
        visitorsBtn.style.backgroundColor   = '#60a5fa';
        keysBtn.style.backgroundColor = '#9ca3af';
    });

    keysBtn.addEventListener('click', function() {
        visitorsTable.style.display = 'none';
        keysTable.style.display = 'block';
        visitorsBtn.style.backgroundColor   = '#9ca3af';
        keysBtn.style.backgroundColor = '#60a5fa';
    });

    // Initially display visitors table and hide keys table
    visitorsTable.style.display = 'block';
    keysTable.style.display = 'none';
    // visitorsBtn.style.backgroundColor   = '#60a5fa';
    // keysBtn.style.backgroundColor = '#9ca3af';
});