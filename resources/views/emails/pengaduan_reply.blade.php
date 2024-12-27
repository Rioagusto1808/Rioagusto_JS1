<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Balasan Pengaduan</title>
        <style>
            /* Reset untuk email */
            body,
            html {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
            }

            .email-wrapper {
                background-color: #f5f5f5;
                padding: 20px 0;
            }

            .email-container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                overflow: hidden;
            }

            .email-header {
                background-color: #007bff;
                color: #ffffff;
                text-align: center;
                padding: 20px;
                font-size: 24px;
                font-weight: bold;
            }

            .email-body {
                padding: 20px;
                color: #333333;
                font-size: 14px;
                line-height: 1.6;
            }

            .email-body p {
                margin: 10px 0;
            }

            .email-body strong {
                color: #007bff;
            }

            .email-footer {
                text-align: center;
                font-size: 12px;
                color: #777777;
                padding: 20px;
                border-top: 1px solid #e0e0e0;
                margin-top: 20px;
            }

            .btn {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                font-size: 14px;
                color: #ffffff;
                background-color: #007bff;
                text-decoration: none;
                border-radius: 5px;
            }

            .btn:hover {
                background-color: #007bff;
            }

            /* Responsif */
            @media screen and (max-width: 600px) {
                .email-header {
                    font-size: 20px;
                    padding: 15px;
                }

                .email-body {
                    font-size: 12px;
                    padding: 15px;
                }

                .btn {
                    font-size: 12px;
                    padding: 8px 16px;
                }
            }
        </style>
    </head>
    <body>
        <div class="email-wrapper">
            <div class="email-container">
                <!-- Header -->
                <div class="email-header">Balasan Pengaduan Anda</div>

                <!-- Body -->
                <div class="email-body">
                    <p>Halo,</p>
                    <p><strong>Terima kasih atas pengaduan Anda.</strong></p>
                    <p>
                        <strong>Isi Pengaduan:</strong>
                        {{ $alasan }}
                    </p>
                    <p>
                        <strong>Balasan Admin:</strong>
                        {{ $balasan }}
                    </p>
                    <p>
                        Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu
                        untuk menghubungi kami kembali.
                    </p>
                    <p style="text-align: center">
                        <a
                            href="https://dapo.kemdikbud.go.id/sekolah/7C36E2662366C229BB9E"
                            class="btn"
                        >
                            Kunjungi Website Kami
                        </a>
                    </p>
                </div>

                <!-- Footer -->
                <div class="email-footer">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. All
                    rights reserved.
                </div>
            </div>
        </div>
    </body>
</html>
