// Import SDK dari Firebase CDN
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getMessaging, getToken, onMessage } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-messaging.js";

// --- Firebase config kamu ---
const firebaseConfig = {
  apiKey: "AIzaSyCbfpJR3Pbe92LZ5Vif3c2Ry7ewtqY2kRA",
  authDomain: "school-reminder-e78d3.firebaseapp.com",
  projectId: "school-reminder-e78d3",
  storageBucket: "school-reminder-e78d3.firebasestorage.app",
  messagingSenderId: "141043403255",
  appId: "1:141043403255:web:0c022eb00241aaa5a306f2",
  measurementId: "G-D9BBG29SL1"
};

// --- Inisialisasi Firebase ---
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

// --- Tombol izin notifikasi ---
document.getElementById("btn-allow").addEventListener("click", () => {
  Notification.requestPermission().then(permission => {
    if (permission === "granted") {
      // Minta token FCM
      getToken(messaging, { vapidKey: "ISI_DENGAN_VAPID_KEY_KAMU" })
        .then(currentToken => {
          if (currentToken) {
            console.log("🎫 Token user:", currentToken);
            alert("Notifikasi diaktifkan!");
            // TODO: kirim token ini ke database untuk dikirim notifikasi nanti
          } else {
            console.log("Gagal ambil token.");
          }
        })
        .catch(err => console.error("Token error:", err));
    } else {
      alert("Kamu menolak izin notifikasi 😢");
    }
  });
});

// --- Saat pesan diterima di foreground ---
onMessage(messaging, payload => {
  console.log("📩 Pesan diterima:", payload);
  alert(`${payload.notification.title}\n${payload.notification.body}`);
});
