function searchName() {
    document.getElementById('searchButton').addEventListener('click', function () {
        var input = document.getElementById('searchInput').value.toLowerCase();
        var rows = document.querySelectorAll('tbody tr');

        rows.forEach(function (row) {
            var cells = row.querySelectorAll('td');
            var found = false;

            cells.forEach(function (cell) {
                if (cell.textContent.toLowerCase().indexOf(input) > -1) {
                    found = true;
                }
            });

            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}

