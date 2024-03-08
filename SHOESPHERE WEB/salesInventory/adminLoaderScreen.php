<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page</title>

    <style>
        /**
  * Building blocks
  *
  * @author jh3y - jheytompkins.com
*/
        @-webkit-keyframes building-blocks {

            0%,
            20% {
                opacity: 0;
                -webkit-transform: translateY(-300%);
                transform: translateY(-300%);
            }

            30%,
            70% {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            90%,
            100% {
                opacity: 0;
                -webkit-transform: translateY(300%);
                transform: translateY(300%);
            }
        }

        @keyframes building-blocks {

            0%,
            20% {
                opacity: 0;
                -webkit-transform: translateY(-300%);
                transform: translateY(-300%);
            }

            30%,
            70% {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            90%,
            100% {
                opacity: 0;
                -webkit-transform: translateY(300%);
                transform: translateY(300%);
            }
        }

        .building-blocks {
            position: relative;
            transition: opacity 1s ease-in-out;
            /* Add transition property for smooth effect */
        }

        .building-blocks div {
            height: 40px;
            position: absolute;
            width: 40px;
        }

        .building-blocks div:after {
            -webkit-animation: building-blocks 2.1s ease infinite backwards;
            animation: building-blocks 2.1s ease infinite backwards;
            background: var(--primary);
            content: '';
            display: block;
            height: 40px;
            width: 40px;
        }

        .building-blocks div:nth-child(1) {
            -webkit-transform: translate(-50%, -50%) translate(60%, 120%);
            transform: translate(-50%, -50%) translate(60%, 120%);
        }

        .building-blocks div:nth-child(2) {
            -webkit-transform: translate(-50%, -50%) translate(-60%, 120%);
            transform: translate(-50%, -50%) translate(-60%, 120%);
        }

        .building-blocks div:nth-child(3) {
            -webkit-transform: translate(-50%, -50%) translate(120%, 0);
            transform: translate(-50%, -50%) translate(120%, 0);
        }

        .building-blocks div:nth-child(4) {
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .building-blocks div:nth-child(5) {
            -webkit-transform: translate(-50%, -50%) translate(-120%, 0);
            transform: translate(-50%, -50%) translate(-120%, 0);
        }

        .building-blocks div:nth-child(6) {
            -webkit-transform: translate(-50%, -50%) translate(60%, -120%);
            transform: translate(-50%, -50%) translate(60%, -120%);
        }

        .building-blocks div:nth-child(7) {
            -webkit-transform: translate(-50%, -50%) translate(-60%, -120%);
            transform: translate(-50%, -50%) translate(-60%, -120%);
        }

        .building-blocks div:nth-child(1):after {
            -webkit-animation-delay: 0.15s;
            animation-delay: 0.15s;
        }

        .building-blocks div:nth-child(2):after {
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
        }

        .building-blocks div:nth-child(3):after {
            -webkit-animation-delay: 0.45s;
            animation-delay: 0.45s;
        }

        .building-blocks div:nth-child(4):after {
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        .building-blocks div:nth-child(5):after {
            -webkit-animation-delay: 0.75s;
            animation-delay: 0.75s;
        }

        .building-blocks div:nth-child(6):after {
            -webkit-animation-delay: 0.9s;
            animation-delay: 0.9s;
        }

        .building-blocks div:nth-child(7):after {
            -webkit-animation-delay: 1.05s;
            animation-delay: 1.05s;
        }

        :root {
            --primary: #535C91;
            /* Define your primary color */
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #070F2B;
        }
    </style>
</head>

<body>
    <div class="building-blocks">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <script>
        // Set a timer for 5 seconds (5000 milliseconds)
        setTimeout(function() {
            // Redirect to the next PHP file
            window.location.href = 'sales.php';
        }, 7000);
    </script>
</body>

</html>