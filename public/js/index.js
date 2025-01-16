document.addEventListener('DOMContentLoaded', function() {
    const visitorsBtn = document.getElementById('visitors-btn');
    const keysBtn = document.getElementById('keys-btn');
    const deviceBtn = document.getElementById('device-btn');
    const visitorsTable = document.getElementById('visitors-table');
    const deviceTable = document.getElementById('device-table');
    const keysTable = document.getElementById('keys-table');

    function resetButtonStyles() {
        [visitorsBtn, keysBtn, deviceBtn].forEach((btn) => {
            btn.style.boxShadow = 'none';
            btn.style.color = 'black';
            btn.style.borderTop = '';
        });
    }

    function showTable(targetTable) {
        [visitorsTable, keysTable, deviceTable].forEach((table) => {
            table.style.display = 'none';
        });
        targetTable.style.display = 'block';
    }

    visitorsBtn.addEventListener('click', function() {
        resetButtonStyles();
        showTable(visitorsTable);

        visitorsBtn.style.boxShadow = '0 1px 2px -1px rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06)';
        visitorsBtn.style.color = '#3b82f6';
        visitorsBtn.style.borderTop = 'none';
    });

    keysBtn.addEventListener('click', function() {
        resetButtonStyles();
        showTable(keysTable);

        keysBtn.style.boxShadow = '0 1px 2px -1px rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06)';
        keysBtn.style.color = '#3b82f6';
        keysBtn.style.borderTop = 'none';
    });

    deviceBtn.addEventListener('click', function() {
        resetButtonStyles();
        showTable(deviceTable);

        deviceBtn.style.boxShadow = '0 1px 2px -1px rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06)';
        deviceBtn.style.color = '#3b82f6';
        deviceBtn.style.borderTop = 'none';
    });

    // Initially display visitors table and hide others
    resetButtonStyles();
    showTable(visitorsTable);
    visitorsBtn.style.boxShadow = '0 1px 2px -1px rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.06)';
    visitorsBtn.style.color = '#3b82f6';
    visitorsBtn.style.borderTop = 'none';
});
