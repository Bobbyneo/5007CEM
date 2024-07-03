document.addEventListener('DOMContentLoaded', function() {
    const timeSelect = document.getElementById('appointmentTime');
    const startTime = 9; // Start time in hours (9 AM)
    const endTime = 17; // End time in hours (5 PM)
    const interval = 30; // Time interval in minutes

    for (let hour = startTime; hour < endTime; hour++) {
        for (let minute = 0; minute < 60; minute += interval) {
            const timeOption = document.createElement('option');
            const formattedHour = hour.toString().padStart(2, '0');
            const formattedMinute = minute.toString().padStart(2, '0');
            const ampm = hour < 12 ? 'AM' : 'PM';
            const displayHour = hour % 12 || 12;
            timeOption.value = `${formattedHour}:${formattedMinute}`;
            timeOption.textContent = `${displayHour}:${formattedMinute} ${ampm}`;
            timeSelect.appendChild(timeOption);
        }
    }
});
