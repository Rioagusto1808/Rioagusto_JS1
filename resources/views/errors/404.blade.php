<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>404 - Not Found</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>
    <body
        class="d-flex justify-content-center align-items-center"
        style="height: 100vh; background-color: #f8f9fa"
    >
        <div class="text-center">
            <h1 class="display-1 text-danger">404</h1>
            <h2>Page Not Found</h2>
            <p class="lead">
                Sorry, the page you are looking for could not be found.
            </p>
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
        </div>
    </body>
</html>
