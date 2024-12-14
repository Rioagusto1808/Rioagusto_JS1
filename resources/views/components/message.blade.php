<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
/>

@if (Session::has('success'))
    <div
        class="alert alert-success alert-dismissible fade show custom-alert-success"
        role="alert"
        id="successAlert"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="green"
            class="bi bi-check-circle-fill mx-1"
            viewBox="0 0 16 16"
        >
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
            />
        </svg>
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('warning'))
    <div
        class="alert alert-warning alert-dismissible fade show custom-alert-warning"
        role="alert"
        id="warningAlert"
    >
        {{ Session::get('warning') }}
    </div>
@endif

@if (Session::has('error'))
    <div
        class="alert alert-danger alert-dismissible fade show custom-alert-error"
        role="alert"
        id="errorAlert"
    >
        {{ Session::get('error') }}
    </div>
@endif

<style>
    .custom-alert-success,
    .custom-alert-warning,
    .custom-alert-error {
        position: fixed;
        top: 80px;
        left: 140px;
        z-index: 1050;
        width: 250px;
        max-width: 500px;
        height: 45px;
        padding: 10px;
        line-height: 1.5;
        display: flex;
        align-items: center;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        color: black;
        font-size: 14px;
        opacity: 0;
        animation: slideIn 0.5s forwards;
    }

    .custom-alert-success {
        background: linear-gradient(to right, #d4edda, #aee3ae);
        border-left: 5px solid #03d803;
    }

    .custom-alert-warning {
        background: linear-gradient(to right, #fff3cd, #f9e6b4);
        border-left: 5px solid #ffc107;
    }

    .custom-alert-error {
        background: linear-gradient(to right, #f8d7da, #f3a9b3);
        border-left: 5px solid #dc3545;
    }

    .btn-close:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    @keyframes slideIn {
        0% {
            opacity: 0;
            transform: translateX(-100%);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Animasi untuk keluar alert */
    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            transform: translateX(-100%);
        }
    }

    /* Menambahkan kelas untuk animasi keluar */
    .fade-out {
        animation: fadeOut 0.5s forwards;
    }
</style>

<script>
    // Menunda animasi keluar setelah 5 detik
    setTimeout(function () {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach((alert) => {
            alert.classList.add('fade-out');
        });
    }, 5000); // 5000 ms = 5 detik
</script>
