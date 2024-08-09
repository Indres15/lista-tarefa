document.addEventListener('DOMContentLoaded', () => {
    let input = document.getElementById('prazo');
    let dataError = document.getElementById('dataError');

    input.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, '');
        let day, month, year;

        if (value.length > 2 && value.length <= 4) {
            value = value.slice(0, 2) + '/' + value.slice(2);
        } else if (value.length > 4) {
            value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4, 8);
        }

        if (value.length === 10) {
            const parts = value.split('/');
            day = parseInt(parts[0], 10);
            month = parseInt(parts[1], 10);
            year = parseInt(parts[2], 10);

            if (!isValidDate(day, month, year)) {
                dataError.style.display = 'inline';
            } else {
                dataError.style.display = 'none';
            }
        } else {
            dataError.style.display = 'none';
        }

        e.target.value = value;
    });

    function isValidDate(day, month, year) {
        if (day < 1 || day > 31) {
            return false;
        }

        if (month < 1 || month > 12) {
            return false;
        }

        const daysInMonth = new Date(year, month, 0).getDate();
        return day <= daysInMonth;
    }
});