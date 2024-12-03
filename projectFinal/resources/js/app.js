import './bootstrap';

import Alpine from 'alpinejs';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Alpine = Alpine;

Alpine.start();

// Mengonfigurasi Pusher dan Laravel Echo
window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-pusher-app-key', // Ganti dengan key Pusher Anda
    cluster: 'your-pusher-app-cluster', // Ganti dengan cluster Pusher Anda
    forceTLS: true, // Gunakan TLS untuk koneksi yang aman
});

// Menangani event broadcast 'CourseUpdated' yang disiarkan di channel 'course-updates'
echo.channel('course-updates')
    .listen('CourseUpdated', (event) => {
        console.log('Course Updated:', event.course); // Menampilkan data kursus yang diperbarui di console
        alert('Course Updated: ' + event.course.name); // Menampilkan notifikasi berupa alert
    });
