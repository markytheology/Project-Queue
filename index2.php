<?php
session_start();

function getCurrentCashier() {
    if (isset($_SESSION['windows'])) {
        return $_SESSION['windows'];
    } else {
        return " ---";
    }
}
// Echo the current cashier
echo getCurrentCashier();
?>

<script>
    $(document).ready(function() {
      setInterval(fetchPendingQueue, 5000);
    });

    function fetchQueue(){
        $.ajax({
            url: 'hometest.php',
            type: 'GET',
            success: function(response){
                $('#span-list').html(response);
            },
            error: function(xhr, status, error){
                console.log('Error: ' + error);
            }
        });
    }

    function fetchPendingQueue() {
      $.ajax({
        url: 'hometest.php',
        type: 'GET',
        success: function(response) {
          $('#pendingQueue').html(response);
        },
        error: function(xhr, status, error) {
          console.log('Error: ' + error);
        }
      });
    }
  </script>

