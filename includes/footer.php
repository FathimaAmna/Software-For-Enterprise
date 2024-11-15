<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php


// Check if the current URL matches the target page
if (strpos($current_url, '/tomato-API-game/mathsGame.php') !== false) {
    echo '<script src="./assets/js/maths.js"></script>
    ';
} elseif (strpos($current_url, '/tomato-API-game/game.php') !== false) {
    if ($heart > 0) {
?>
        <script type="module" src="./assets/js/script.js"></script>
    <?php
    }
    ?>
    <script>
        function fetchHeartValue() {
            fetch('http://localhost/tomato-API-game/functions/getHeartValue.php', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.heart !== undefined) {
                        // Generate heart icons based on the user's heart value
                        let heartIcons = '';
                        switch (data.heart) {
                            case 3:
                                heartIcons = '<i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i>';
                                break;
                            case 2:
                                heartIcons = '<i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart-crack"></i>';
                                break;
                            case 1:
                                heartIcons = '<i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart-crack"></i><i class="fa-solid fa-heart-crack"></i>';
                                break;
                            default:
                                heartIcons = '<i class="fa-solid fa-heart-crack"></i><i class="fa-solid fa-heart-crack"></i><i class="fa-solid fa-heart-crack"></i>';
                                break;
                        }

                        // Update the heart icons in the HTML
                        document.querySelector('.icon').innerHTML = heartIcons;

                    } else {
                        console.error('Error: Heart value not found in response');
                    }
                })
                .catch(error => console.error('Error fetching heart value:', error));
        }

        // Call the fetchHeartValue function every 5 seconds
        setInterval(fetchHeartValue, 1000); // Adjust the interval as needed
    </script>

    <script>
        // Get the target time from the PHP variable
        const targetTimeString = "<?php echo $heart_refill_timer; ?>";
        const targetTime = new Date(targetTimeString);

        // Calculate the target time by adding 1 hour to the heart refill time
        targetTime.setHours(targetTime.getHours() + 1);

        // Update the countdown every second
        const countdownElement = document.getElementById('countdown');
        const timerInterval = setInterval(updateCountdown, 1000);

        function updateCountdown() {
            const now = new Date();
            const difference = targetTime - now;

            if (difference <= 0) {
                clearInterval(timerInterval);
                countdownElement.textContent = 'Time\'s up!';
                // Call refillHeartInUser() function when timer reaches zero
                refillHeartInUser();
                // Redirect to the current page after a delay
                setTimeout(() => {
                    window.location.reload();
                }, 3000); // Adjust the delay (in milliseconds) as needed
            } else {
                // Calculate remaining minutes and seconds
                const minutes = Math.floor(difference / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                // Display the countdown with minutes and seconds
                countdownElement.textContent = `${minutes}m ${seconds}s`;
            }
        }

        // Initial call to update countdown immediately
        updateCountdown();


        function refillHeartInUser() {
            $.post(
                "http://localhost/tomato-API-game/functions/refillHeartHandler.php",
                (response) => {
                    // response from PHP back-end
                    console.log(response);
                }
            );
        }
    </script>
<?php
} elseif (strpos($current_url, '/tomato-API-game/registration.php') !== false) {
?>
    <script>
        function validate() {
            let pw = document.getElementById("txtPassword").value;
            let cpw = document.getElementById("txtConfirmPassword").value;

            // Password strength checks
            if (pw.length < 8) {
                alert("Password should be at least 8 characters long.");
                return false;
            }
            if (!/[A-Z]/.test(pw)) {
                alert("Password should contain at least one uppercase letter.");
                return false;
            }
            if (!/[a-z]/.test(pw)) {
                alert("Password should contain at least one lowercase letter.");
                return false;
            }
            if (!/\d/.test(pw)) {
                alert("Password should contain at least one digit.");
                return false;
            }
            if (!/[^a-zA-Z0-9]/.test(pw)) {
                alert("Password should contain at least one special character.");
                return false;
            }

            if (pw !== cpw) {
                alert("Password and Confirm Password don't match. Please check again!");
                return false;
            }

            return true;
        }
    </script>
<?php
}
?>

</body>

</html>