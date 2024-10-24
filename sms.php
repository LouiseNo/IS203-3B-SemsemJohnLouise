<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Sender</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .sms-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .sms-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sms-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .sms-form input, 
        .sms-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .sms-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .sms-form button:hover {
            background-color: #218838;
        }
        .notification {
            display: none;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        @media (max-width: 600px) {
            .sms-form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="sms-form">
        <h2>Send SMS</h2>
        <form id="smsForm">
            <label for="to">To:</label>
            <input type="text" id="to" name="to" placeholder="Enter phone number" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
            
            <button type="submit">Send</button>
        </form>

        <div class="notification success" id="successMessage">
            SMS sent successfully!
        </div>
        <div class="notification error" id="errorMessage">
            Error sending SMS!
        </div>
    </div>

    <script>
        document.getElementById('smsForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let to = document.getElementById('to').value;
            let message = document.getElementById('message').value;

            let formData = new FormData();
            formData.append('to', to);
            formData.append('message', message);

            fetch('sms2.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('successMessage').style.display = 'block';
                    document.getElementById('errorMessage').style.display = 'none';
                } else {
                    document.getElementById('errorMessage').innerText = data.message;
                    document.getElementById('errorMessage').style.display = 'block';
                    document.getElementById('successMessage').style.display = 'none';
                }
            })
            .catch(error => {
                document.getElementById('errorMessage').innerText = "Error sending SMS!";
                document.getElementById('errorMessage').style.display = 'block';
                document.getElementById('successMessage').style.display = 'none';
            });
        });
    </script>

</body>
</html>