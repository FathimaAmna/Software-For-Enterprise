<?php
$title = 'LeaderBoard Page';
include './includes/header.php';
?>

<section class="home show">
  <div class="form_container active">
    <a href="./index.php"><i class="fa-solid fa-xmark form_close"></i></a>

    <div class="form login_form">
      <h2>LeaderBoard</h2>

      <div class="table-container">

        <table>
          <!-- On rows -->
          <thread>
            <tr>
              <th>
                <img width="64" height="64" src="https://img.icons8.com/flat-round/64/uefa-euro-trophy.png" alt="uefa-euro-trophy" />Places
              </th>
              <th>
                <img width="100" height="100" src="https://img.icons8.com/plasticine/100/person-male.png" alt="person-male" />
                Account
              </th>
              <th>
                <img width="100" height="100" src="https://img.icons8.com/plasticine/100/hourglass.png" alt="hourglass" />
                score
              </th>
              <th>
                <img width="48" height="48" src="https://img.icons8.com/fluency/48/heart-with-pulse--v1.png" alt="heart-with-pulse--v1" />Points
              </th>
            </tr>
          </thread>
          <?php
          $con = mysqli_connect("localhost", "root", "", "tomato123", "3306");

          // Error handling 
          if (!$con) {
            die("Sorry we are facing a technical issue!!!");
          }

          // Connect with the query
          $sql = "SELECT u.username, u.heart, SUM(l.score) AS total_score, l.life
                      FROM `user` u
                      INNER JOIN leaderboard l ON u.user_id = l.user_id
                      GROUP BY u.user_id
                      ORDER BY total_score DESC";

          $result = mysqli_query($con, $sql);

          if (mysqli_num_rows($result) > 0) {
            $rowNumber = 1; // Initialize row number

            while ($row = mysqli_fetch_assoc($result)) {
              // Display the table row with data
              echo '<tr>';
              echo '<td>' . $rowNumber . '</td>'; // Display the row number
              echo '<td>' . $row["username"] . '</td>';
              echo '<td>' . $row["total_score"] . '</td>';
              echo '<td>' . $row["heart"] . '</td>';
              echo '</tr>';

              // Increment the row number for the next iteration
              $rowNumber++;
            }
          }

          // Close the connection
          mysqli_close($con);
          ?>

        </table>
      </div>
    </div>
  </div>
</section>

<?php include './includes/footer.php'; ?>