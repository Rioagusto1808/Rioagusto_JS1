<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
/>
@if (Session::has('success'))
    <div
        class="alert alert-success alert-dismissible fade show custom-alert"
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
        <button
            style="padding: 10px"
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
    </div>
@endif

@if (Session::has('warning'))
    <div
        class="alert alert-warning alert-dismissible fade show custom-alert"
        role="alert"
        id="warningAlert"
    >
        {{ Session::get('warning') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
    </div>
@endif

@if (Session::has('error'))
    <div
        class="alert alert-danger alert-dismissible fade show custom-alert"
        role="alert"
    >
        {{ Session::get('error') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
    </div>
@endif

<style>
    .custom-alert {
        position: fixed;
        top: 80px;
        right: 20px;
        z-index: 1050;
        width: 250px;
        max-width: 500px;
        height: 29px;
        overflow: hidden;
        padding: 10px;
        line-height: 1.5;
        display: flex;
        align-items: center;
        border-radius: 0;
        background: linear-gradient(to right, #aee3ae, #e6e6e6);
        border-left: 5px solid #03d803;
        font-family: 'Poppins', sans-serif;
        color: black;
        font-size: 8px;
    }

    .btn-close:focus {
        outline: none !important;
        box-shadow: none !important;
    }
</style>
