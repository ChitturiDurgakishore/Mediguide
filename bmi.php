<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-image: url('bg.jpeg');
    
            height: 100vh;
        }

        .container {
            margin:15px;
            background-color:burlywood ;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            border:4px solid black;
        }
        h1 {
    margin-top: 20px;
    margin-left:500px;
    margin-right:400px;
    margin-bottom:20px ;
    color: chartreuse;
    background-color: rgba(7, 6, 6,4);
    width: fit-content;
    padding: 20px;
    font-style: italic;
    border-radius: 20px;
}

        h2 {
            margin-bottom: 20px;
            color: black;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 1.1rem;
            color: black;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #333;
        }

        .result span {
            font-weight: bold;
            color: #007bff;
        }

        .status {
            margin-top: 10px;
            font-size: 1.1rem;
            color: #555;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
        .options{
    margin-bottom:5px;
    display: flex;
}
.options select{
    padding:5px;
    margin:5px;
    cursor: pointer;
}
.heading{
    display:flex;
    flex-direction: row;
    align-items: center;
    
}
    </style>
</head>
<body>
    <div class="heading">
     <center><h1>MEDI-GUIDE</h1></center>
     <div class="options">
        <select id="pageSelect" onchange="redirectToPage()">
                    
                    <option>SELECT</option>
                    <option value="userhome1.php">HOME</option>
                    <option value="bmi.php">BMS</option>
                    <option value="tips.php">Health Tips</option>
        </select>
        </div>
        </div>
 <center>
    <div class="container">
        <h2>BMI Calculator</h2>
        <form id="bmiForm">
            <label for="weight">Weight (kg)</label>
            <input type="number" id="weight" name="weight" required>

            <label for="height">Height (cm)</label>
            <input type="number" id="height" name="height" required>

            <button type="button" onclick="calculateBMI()">Calculate BMI</button>
        </form>

        <div class="result" id="result"></div>
        <div class="status" id="status"></div>
    </div>
    </center>
    <script>
        function redirectToPage() {
            const selectElement = document.getElementById('pageSelect');
            const selectedValue = selectElement.value;

            if (selectedValue) {
                window.location.href = selectedValue; // Redirect to the selected URL
            }
        }
        function calculateBMI() {
            // Get input values
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value) / 100; // Convert cm to meters

            if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
                alert('Please enter valid positive numbers for weight and height.');
                return;
            }

            // Calculate BMI
            const bmi = (weight / (height * height)).toFixed(2);

            // Display the result
            document.getElementById('result').innerHTML = `Your BMI is: <span>${bmi}</span>`;

            // Determine the health status
            let status = '';
            if (bmi < 18.5) {
                status = 'You are underweight.';
            } else if (bmi >= 18.5 && bmi < 24.9) {
                status = 'You have a normal weight.';
            } else if (bmi >= 25 && bmi < 29.9) {
                status = 'You are overweight.';
            } else {
                status = 'You are obese.';
            }

            document.getElementById('status').innerText = status;
        }
    </script>

</body>
</html>
