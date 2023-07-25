
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW STUDENT</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    <script>src ="../css/get.queue.css"</script>
    
    <style>
        html, body{
            height:100%;
        }
        .form-container{
            display: none;
            margin-top: 20px;
        }
    </style>
    <script>
        function showStudentForm()
        {
            var studentForm = document.getElementById("studentForm");
            studentForm.style.display = "block";

            var othersForm = document.getElementById("othersForm");
            othersForm.style.display = "none";
        }

        function showOthersForm()
        {
            var studentForm = document.getElementById("studentForm");
            studentForm.style.display = "none";

            var othersForm = document.getElementById("othersForm");
            othersForm.style.display = "block";
        }
        </script>
</head>
<body class="bg-dark bg-gradient">
   <div class="h-100 d-flex jsutify-content-center align-items-center">
       <div class='w-100'>
        <h3 class="py-5 text-center text-light">Queuing System</h3>
        <div class="card my-3 col-md-4 offset-md-4">
            <div class="card-body">
                
            <button class="btn btn-sm btn-primary rounded-0 my-1" onclick = "showStudentForm()"><h5>Student</h5></button>
            <button class="btn btn-sm btn-primary rounded-0 my-1" onclick = "showOthersForm()"><h5>Others</h5></button>

            <div id = "studentForm" class = "form-container">
                <h2>Student Form</h2>
                <form method="POST" action="get-student.php">
                    
                    <label for = "id_num">ID # </label>
                    <input type = "text" id = "id_num" name = "id_num" class="form-control form-control-sm rounded-0" required>
                    <label for = "oldName">Name </label>
                    <input type = "text" id = "oldName" name = "oldName" class="form-control form-control-sm rounded-0" required>
                    <label for = "oldMobile">Mobile </label>
                    <input type = "text" id = "oldMobile" name = "oldMobile" class="form-control form-control-sm rounded-0" required>
                    <label for = "oldEmail">Email </label>
                    <input type = "text" id = "oldEmail" name = "oldEmail" class="form-control form-control-sm rounded-0" required>
                    
                    <label for = "department_old">Department Window </label>
                    <select id="first-dropdown" name="firstDropDown" onchange="loadSecondDropdown()" class="form-control form-control-sm rounded-0" required>
                    <option value="">Select an option</option>

                    <?php
                    include '../DBConnection.php';
                    $connection = OpenCon();
    
                    $query = "SELECT * FROM transaction_types";
                    $result = mysqli_query($connection, $query);
    
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['department'] . '</option>';
                    }
                    ?>
                    </select>
                    
                    <label for = "department_old">Transaction</label>
                    <select id="second-dropdown" name="secondDropdown" class="form-control form-control-sm rounded-0" required>
                    <option value="">Select an option</option>
                    </select><br>

                    <form action="get-student.php" method="POST">  
                        <input class="btn btn-sm btn-primary rounded-0 my-1" name = "submitBtn" id = "submitBtn" type="submit"/>  
                    </form>

                </form>
    </div>

                <div id = "othersForm" class = "form-container">
                <h2>Others Form</h2>
                <form method="POST" action="get-student.php">

                    <label for = "otherName">Name </label>
                    <input type = "text" id = "otherName" name = "otherName" class="form-control form-control-sm rounded-0" required>
                    <label for = "otherMobile">Mobile </label>
                    <input type = "text" id = "otherMobile" name = "otherMobile" class="form-control form-control-sm rounded-0" required>
                    <label for = "otherEmail">Email </label>
                    <input type = "text" id = "otherEmail" name = "otherEmail" class="form-control form-control-sm rounded-0" required>
                    
                    <label for = "department_other">Department Window </label>
                    <select id="first-dropdown-other" name="firstDropdownOthers" onchange="loadSecondDropdownOther()" class="form-control form-control-sm rounded-0" required>
                    <option value="">Select an option</option>

                    <?php
                    $query = "SELECT * FROM transaction_types";
                    $result = mysqli_query($connection, $query);
    
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['department'] . '</option>';
                    }
                    ?>
                    </select>
                    <label for = "transaction_other">Transaction</label>
                    <select id="second-dropdown-other" name="secondDropdownOthers" class="form-control form-control-sm rounded-0" required>
                    <option value="">Select an option</option>
                    </select><br>

                    <form action="get-others.php" method="POST">  
                        <input class="btn btn-sm btn-primary rounded-0 my-1" name = "submitBtn" id = "submitBtn" type="submit"/>  
                    </form>
                </form>
    </div>
            </div>
        </div>
       </div>
   </div>
</body>

<script>
    function loadSecondDropdown() {
        var firstDropdown = document.getElementById("first-dropdown");
        var selectedValue = firstDropdown.value;
        var secondDropdown = document.getElementById("second-dropdown");
        
        secondDropdown.innerHTML = '<option value="">Select an option</option>';
        
        if (selectedValue !== "") {

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "getcategory.php?selectedValue=" + selectedValue, true);
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var options = JSON.parse(xhr.responseText);
                    
                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement("option");
                        option.value = options[i].value;
                        option.textContent = options[i].label;
                        secondDropdown.appendChild(option);
                    }
                }
            };
            
            xhr.send();
        }
    }


    function loadSecondDropdownOther() {
        var firstDropdown = document.getElementById("first-dropdown-other");
        var selectedValue = firstDropdown.value;
        var secondDropdown = document.getElementById("second-dropdown-other");
        
        secondDropdown.innerHTML = '<option value="">Select an option</option>';
        
        if (selectedValue !== "") {

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "getcategory.php?selectedValue=" + selectedValue, true);
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var options = JSON.parse(xhr.responseText);
                    
                    for (var i = 0; i < options.length; i++) {
                        var option = document.createElement("option");
                        option.value = options[i].value;
                        option.textContent = options[i].label;
                        secondDropdown.appendChild(option);
                    }
                }
            };
            
            xhr.send();
        }
    }




    // function saveData() {
    //     var firstDropdown = document.getElementById("first-dropdown");
    //     var secondDropdown = document.getElementById("second-dropdown");
        
    //     var selectedValue1 = firstDropdown.value;
    //     var selectedValue2 = secondDropdown.value;
        
    //     var xhr = new XMLHttpRequest();
    //     xhr.open("POST", "queue_student.php", true);
    //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState === 4 && xhr.status === 200) {
    //             alert("Data saved successfully!");
    //         }
    //     };
        
    //     xhr.send("selectedValue1=" + selectedValue1 + "&selectedValue2=" + selectedValue2);
    // }

</script>
